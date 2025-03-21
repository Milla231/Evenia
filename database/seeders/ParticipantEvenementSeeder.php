<?php

namespace Database\Seeders;

use App\Models\Evenement;
use App\Models\Participant;

use App\Models\ParticipantEvenement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantEvenementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $participants = Participant::all();
        $evenements = Evenement::all();

        foreach ($participants as $participant) {
            ParticipantEvenement::create([
                'participant_id' => $participant->id,
                'evenement_id' => $evenements->random()->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}

}