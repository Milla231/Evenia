<?php

namespace Database\Seeders;

use App\Models\Evenement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EvenementsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Evenement::insert([
            [
                'titre' => 'Laravel Conférence',
                'description' => 'Un événement pour les développeurs Laravel.',
                'date_debut' => '2025-06-10',
                'date_fin' => '2025-06-12',
                'max_participants' => 100,
                'type' => 'Conférence',
                'status' => 'actif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'React Workshop',
                'description' => 'Formation avancée sur React.js.',
                'date_debut' => '2025-07-15',
                'date_fin' => '2025-07-16',
                'max_participants' => 50,
                'type' => 'Atelier',
                'status' => 'actif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'titre' => 'Hackathon 2025',
                'description' => 'Compétition de programmation de 48h.',
                'date_debut' => '2025-08-01',
                'date_fin' => '2025-08-03',
                'max_participants' => 200,
                'type' => 'Compétition',
                'status' => 'actif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
