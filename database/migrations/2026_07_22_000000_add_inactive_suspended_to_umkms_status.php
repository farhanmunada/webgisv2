<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Tambah nilai 'inactive' dan 'suspended' ke enum status
        DB::statement("ALTER TABLE umkms MODIFY COLUMN status ENUM('pending', 'approved', 'inactive', 'suspended', 'rejected') NOT NULL DEFAULT 'pending'");
    }

    public function down(): void
    {
        // Kembalikan ke enum awal (hati-hati jika ada data dengan status baru)
        DB::statement("ALTER TABLE umkms MODIFY COLUMN status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending'");
    }
};
