<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Apropos;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Apropos::factory(1)->create();
        Apropos::factory(1)->create([
            'nom' => 'Balde',
            'prenom'=> 'Ibrahima khalil',
            'email'=> 'khalil@gmail.com',
            'telephone'=> '65443323456',
            'adresse'=> 'Liberte 6',
            'imag'=> 'image.png',
            'apropos'=> 'En tant que développeur web passionné, j’ai acquis des compétences variées dans divers domaines et technologies.Mon objectif est de mettre mes compétences au service des autres '
        ]);
        
    }
}
