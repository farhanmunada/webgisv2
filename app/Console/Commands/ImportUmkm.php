<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Umkm;
use App\Models\Category;
use App\Models\User;

class ImportUmkm extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:umkm {file : Path to the CSV file} {--user-id= : Default User ID to own the imported UMKMs} {--delimiter=, : CSV delimiter}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import UMKM data from a CSV file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $filePath = $this->argument('file');
        $delimiter = $this->option('delimiter');

        if (!file_exists($filePath)) {
            $this->error("File not found at: {$filePath}");
            return Command::FAILURE;
        }

        // Determine default user_id (default to first admin)
        $userId = $this->option('user-id');
        if (!$userId) {
            $admin = User::where('role', 'admin')->first();
            if (!$admin) {
                $this->error("No admin user found. Please create an admin or specify a --user-id option.");
                return Command::FAILURE;
            }
            $userId = $admin->id;
        } else {
            if (!User::where('id', $userId)->exists()) {
                $this->error("User with ID {$userId} does not exist.");
                return Command::FAILURE;
            }
        }

        $file = fopen($filePath, 'r');
        
        // Read headers
        $headers = fgetcsv($file, 0, $delimiter);
        if (!$headers) {
            $this->error("CSV file is empty.");
            fclose($file);
            return Command::FAILURE;
        }

        // Clean headers (remove BOM, lowercase, trim)
        $headers = array_map(function ($h) {
            $h = preg_replace('/[\x{FEFF}\x{FFFE}]/u', '', $h); // remove UTF-8 BOM
            return strtolower(trim($h));
        }, $headers);

        // Required headers mapping
        $headerMap = [
            'nama_umkm' => ['nama_umkm', 'nama', 'name', 'umkm_name', 'nama umkm'],
            'kategori' => ['kategori', 'category', 'kategori_id', 'kategori umkm'],
            'kecamatan' => ['kecamatan', 'subdistrict', 'kec'],
            'latitude' => ['latitude', 'lat', 'y', 'latitude umkm'],
            'longitude' => ['longitude', 'lng', 'long', 'x', 'longitude umkm'],
            'alamat' => ['alamat', 'address', 'alamat umkm'],
            'deskripsi' => ['deskripsi', 'description', 'desc', 'deskripsi umkm'],
        ];

        $indices = [];
        foreach ($headerMap as $key => $synonyms) {
            $found = false;
            foreach ($synonyms as $synonym) {
                $index = array_search($synonym, $headers);
                if ($index !== false) {
                    $indices[$key] = $index;
                    $found = true;
                    break;
                }
            }
            if (!$found && in_array($key, ['nama_umkm', 'latitude', 'longitude', 'alamat'])) {
                $this->error("Required column '{$key}' (or its synonyms like 'name', 'lat', 'lng', 'address') not found in CSV headers.");
                fclose($file);
                return Command::FAILURE;
            }
        }

        $this->info("Column mapping successful:");
        foreach ($indices as $key => $index) {
            $this->line(" - {$key} -> CSV Column: '" . $headers[$index] . "'");
        }

        $count = 0;
        $errors = 0;

        while (($row = fgetcsv($file, 0, $delimiter)) !== false) {
            // Check if row is empty
            if (empty(array_filter($row))) {
                continue;
            }

            $rowData = [];
            foreach ($indices as $key => $index) {
                $rowData[$key] = isset($row[$index]) ? trim($row[$index]) : null;
            }

            // Map/Create Category
            $categoryId = null;
            if (!empty($rowData['kategori'])) {
                $categoryVal = $rowData['kategori'];
                if (is_numeric($categoryVal)) {
                    // Check if category with this ID exists
                    if (Category::where('id', $categoryVal)->exists()) {
                        $categoryId = (int)$categoryVal;
                    } else {
                        $categoryId = null;
                    }
                } else {
                    // Case-insensitive search by name
                    $category = Category::where('nama_kategori', 'like', $categoryVal)->first();
                    if (!$category) {
                        $category = Category::create(['nama_kategori' => $categoryVal]);
                    }
                    $categoryId = $category->id;
                }
            }

            // Validate coordinates
            $lat = filter_var($rowData['latitude'], FILTER_VALIDATE_FLOAT);
            $lng = filter_var($rowData['longitude'], FILTER_VALIDATE_FLOAT);

            if ($lat === false || $lng === false) {
                $rowNum = $count + $errors + 2;
                $this->warn("Row {$rowNum} skipped: Invalid latitude ('{$rowData['latitude']}') or longitude ('{$rowData['longitude']}').");
                $errors++;
                continue;
            }

            // Update or Create UMKM
            Umkm::updateOrCreate(
                [
                    'nama_umkm' => $rowData['nama_umkm'],
                    'user_id' => $userId
                ],
                [
                    'kategori_id' => $categoryId,
                    'kecamatan' => $rowData['kecamatan'] ?? 'Temanggung',
                    'latitude' => $lat,
                    'longitude' => $lng,
                    'alamat' => $rowData['alamat'],
                    'deskripsi' => $rowData['deskripsi'] ?? null,
                    'status' => 'approved', // Auto-approve imported records
                ]
            );

            $count++;
        }

        fclose($file);

        $this->info("Import finished! Successfully imported/updated {$count} UMKMs. (Skipped: {$errors})");
        return Command::SUCCESS;
    }
}
