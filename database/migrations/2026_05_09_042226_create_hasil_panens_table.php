<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hasil_panens', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan', 100)->unique();
            $table->unsignedInteger('hasil_robusta')->default(0);
            $table->unsignedInteger('hasil_arabika')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_panens');
    }
};
