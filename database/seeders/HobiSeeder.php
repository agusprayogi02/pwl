<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobis')->insert([
            [
                'nama' => 'Coding',
                'deskripsi' => 'Membuat aplikasi',
            ],
            [
                'nama' => 'Membaca',
                'deskripsi' => 'Membaca Chat',
            ],
            [
                'nama' => 'Memandang',
                'deskripsi' => 'Memandang pemandangan yang indah, maybe :>',
            ],
            [
                'nama' => 'Merosting',
                'deskripsi' => 'Mengolok-olok teman-teman, tapi cuman candaan aja :)',
            ],
            [
                'nama' => 'Jogging',
                'deskripsi' => 'Jogging di pagi hari',
            ]
        ]);
    }
}
