<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prodis')->insert([
            [
                'nama' => 'Teknik Informatika',
                'created_at' => now(),
            ],
            [
                'nama' => 'Sistem Informasi',
                'created_at' => now(),
            ],
            [
                'nama' => 'Teknik Komputer',
                'created_at' => now(),
            ]
        ]);
    }
}
