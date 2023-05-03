<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            HobiSeeder::class,
            ArtikelSeeder::class,
            FamilySeeder::class,
            MatkulSeeder::class,
            ProdiSeeder::class,
            KelasSeeder::class,
        ]);

        \App\Models\User::factory(1)->create();
    }
}
