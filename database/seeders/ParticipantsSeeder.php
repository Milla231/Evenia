<?php

namespace Database\Seeders;

use App\Models\Participant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        

        Participant::insert([
            [
                'nom' => 'Prudencia ',
                'prenom' => 'MIAN',
                'email' => 'prudenciamin08@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Rolla',
                'prenom' => 'MAWULE',
                'email' => 'rolla@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nom' => 'Toure',
                'prenom' => 'Ali',
                'email' => 'ali.toure@gmail.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);


    }
}
