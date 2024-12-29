<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    // Nama tabel (opsional jika nama tabel tidak sama dengan "workers")
    protected $table = 'workers';

    // Kolom yang dapat diisi
    protected $fillable = [
        'name',
        'position',
        'departement',
        'salary',
        'hire_date',
    ];
}

