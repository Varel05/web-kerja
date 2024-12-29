<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Worker;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    Worker::create([
        'name' => 'Wise',
        'position' => 'CEO',
        'departement' => 'Random Plays',
        'salary' => 10000000.00,
        'hire_date' => '2022-05-13',
    ]);

    Worker::create([
        'name' => 'Belle',
        'position' => 'Creative Director',
        'departement' => 'Random Plays',
        'salary' => 10000000.00,
        'hire_date' => '2022-05-13',
    ]);

    Worker::create([
        'name' => 'Fairy',
        'position' => 'Chief Technology Officer',
        'departement' => 'Random Plays',
        'salary' => 10000000.00,
        'hire_date' => '2022-05-13',
    ]);

    Worker::create([
        'name' => 'Koleda Belobog',
        'position' => 'Presiden perusahaan',
        'departement' => 'Belobog Heavy Industries',
        'salary' => 5000000.00,
        'hire_date' => '2023-12-01',
    ]);

    Worker::create([
        'name' => 'Anton Ivanov',
        'position' => 'Manajer Proyek',
        'departement' => 'Belobog Heavy Industries',
        'salary' => 3000000.00,
        'hire_date' => '2023-12-01',
    ]);

    Worker::create([
        'name' => 'Ben Bigger',
        'position' => 'Akuntan',
        'departement' => 'Belobog Heavy Industries',
        'salary' => 3000000.00,
        'hire_date' => '2023-12-01',
    ]);

    Worker::create([
        'name' => 'Grace Howard',
        'position' => 'Mekanik',
        'departement' => 'Belobog Heavy Industries',
        'salary' => 3000000.00,
        'hire_date' => '2023-12-01',
    ]);

    Worker::create([
        'name' => 'Nicole Demara',
        'position' => 'Pendiri dan Manajer Umum',
        'departement' => 'Cunning Hares',
        'salary' => 5000000.00,
        'hire_date' => '2023-12-01',
    ]);

    Worker::create([
        'name' => 'Anby Demara',
        'position' => 'Spesialis Operasi Lapangan',
        'departement' => 'Cunning Hares',
        'salary' => 3000000.00,
        'hire_date' => '2023-12-01',
    ]);

    Worker::create([
        'name' => 'Billy Kid',
        'position' => 'Ahli Senjata',
        'departement' => 'Cunning Hares',
        'salary' => 3000000.00,
        'hire_date' => '2023-12-01',
    ]);

    Worker::create([
        'name' => 'Nekomiya Mana',
        'position' => 'Agen Lapangan',
        'departement' => 'Cunning Hares',
        'salary' => 3000000.00,
        'hire_date' => '2023-12-01',
    ]);

    Worker::create([
        'name' => 'Alexandrina Sebastiane',
        'position' => 'Kepala Pelayan',
        'departement' => 'Victoria Housekeeping',
        'salary' => 3000000.00,
        'hire_date' => '2024-07-01',
    ]);

    Worker::create([
        'name' => 'Corin Wickes',
        'position' => 'Petugas Kebersihan',
        'departement' => 'Victoria Housekeeping',
        'salary' => 3000000.00,
        'hire_date' => '2024-07-01',
    ]);

    Worker::create([
        'name' => 'Ellen Joe',
        'position' => 'Tukang Kebun',
        'departement' => 'Victoria Housekeeping',
        'salary' => 3000000.00,
        'hire_date' => '2024-07-01',
    ]);

    Worker::create([
        'name' => 'Von Lycaon',
        'position' => 'Kepala Butler',
        'departement' => 'Victoria Housekeeping',
        'salary' => 3000000.00,
        'hire_date' => '2024-07-01',
    ]);

    Worker::create([
        'name' => 'Hoshimi Miyabi',
        'position' => 'Kepala Unit',
        'departement' => 'Hollow Special Operations Section 6 ',
        'salary' => 5000000.00,
        'hire_date' => '2024-09-01',
    ]);

    Worker::create([
        'name' => 'Tsukishiro Yanagi',
        'position' => 'Wakil Kepala Unit',
        'departement' => 'Hollow Special Operations Section 6 ',
        'salary' => 4000000.00,
        'hire_date' => '2024-09-01',
    ]);

    Worker::create([
        'name' => 'Asaba Harumasa',
        'position' => 'Spesialis Senjata',
        'departement' => 'Hollow Special Operations Section 6 ',
        'salary' => 3000000.00,
        'hire_date' => '2024-09-01',
    ]);

    Worker::create([
        'name' => 'Soukaku',
        'position' => 'Ahli Logistik',
        'departement' => 'Hollow Special Operations Section 6 ',
        'salary' => 3000000.00,
        'hire_date' => '2024-09-01',
    ]);

    Worker::create([
        'name' => 'Caesar King',
        'position' => 'Pemimpin Geng',
        'departement' => 'Sons of Calydon',
        'salary' => 3000000.00,
        'hire_date' => '2024-09-01',
    ]);

    Worker::create([
        'name' => 'Burnice White',
        'position' => 'Barista',
        'departement' => 'Sons of Calydon',
        'salary' => 3000000.00,
        'hire_date' => '2024-09-01',
    ]);

    Worker::create([
        'name' => 'Lighter',
        'position' => 'Juara',
        'departement' => 'Sons of Calydon',
        'salary' => 3000000.00,
        'hire_date' => '2024-09-01',
    ]);

    Worker::create([
        'name' => 'Luciana de Montefio',
        'position' => 'Anggota Senior',
        'departement' => 'Sons of Calydon',
        'salary' => 3000000.00,
        'hire_date' => '2024-09-01',
    ]);

    Worker::create([
        'name' => 'Piper Wheel',
        'position' => 'Mekanik',
        'departement' => 'Sons of Calydon',
        'salary' => 3000000.00,
        'hire_date' => '2024-09-01',
    ]);

    Worker::create([
        'name' => 'Soldier 11',
        'position' => 'Pemimpin Team',
        'departement' => 'Obol Squad',
        'salary' => 3000000.00,
        'hire_date' => '2024-08-01',
    ]);

    Worker::create([
        'name' => 'Zhu Yuan',
        'position' => 'Pemimpin Team',
        'departement' => 'Criminal Investigation Special Response Team',
        'salary' => 3000000.00,
        'hire_date' => '2024-07-01',
    ]);

    Worker::create([
        'name' => 'Jane Doe',
        'position' => 'Spesialis Kriminologi',
        'departement' => 'Criminal Investigation Special Response Team',
        'salary' => 3000000.00,
        'hire_date' => '2024-07-01',
    ]);

    Worker::create([
        'name' => ' Qingyi',
        'position' => 'Wakil Pemimpin Team',
        'departement' => 'Criminal Investigation Special Response Team',
        'salary' => 3000000.00,
        'hire_date' => '2024-07-01',
    ]);

    Worker::create([
        'name' => 'Seth Lowell',
        'position' => 'Staff Lapangan',
        'departement' => 'Criminal Investigation Special Response Team',
        'salary' => 3000000.00,
        'hire_date' => '2024-07-01',
    ]);

    Worker::create([
        'name' => 'Astra Yao',
        'position' => 'Idol',
        'departement' => 'Stars of Lyra',
        'salary' => 3000000.00,
        'hire_date' => '2024-12-01',
    ]);

    Worker::create([
        'name' => 'Evelyn Chevalier',
        'position' => 'Manager Idol',
        'departement' => 'Stars of Lyra',
        'salary' => 3000000.00,
        'hire_date' => '2024-12-01',
    ]);
}
}
