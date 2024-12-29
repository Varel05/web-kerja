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
        Schema::create('workers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Nama pekerja
            $table->string('position'); // Jabatan
            $table->string('departement');//Departement
            $table->decimal('salary', 10, 2); // Gaji
            $table->date('hire_date'); // Tanggal masuk
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workers');
    }
};