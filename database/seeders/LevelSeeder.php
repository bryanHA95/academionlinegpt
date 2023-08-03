<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create([
            'name' => 'Nivel Básico'
        ]);

        Level::create([
            'name' => 'Nivel Intermedio'
        ]);

        Level::create([
            'name' => 'Nivel Avanzado'
        ]);
    }
}
