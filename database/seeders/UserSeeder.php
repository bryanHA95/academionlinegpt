<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
                    'name' => 'Bryan Darien Huaricapcha Arias',
                    'email' => 'bryan.huaricapcha.arias@gmail.com',
                    'password' => bcrypt('Bryan1995.')
                ]);
            
        $user->assignRole('Administrador');

        User::factory(99)->create();
    }
}
