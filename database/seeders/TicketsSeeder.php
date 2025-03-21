<?php

namespace Database\Seeders;

use App\Models\Evenement;
use App\Models\Participant;
use App\Models\ParticipantEvenement;
use App\Models\Ticket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TicketsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $participants = Participant::all();
        $evenements = Evenement::all();

        foreach ($participants as $participant) {
            // Associer un événement aléatoire à chaque participant
            $evenement = $evenements->random();

            Ticket::create([
                'ticket_code' => strtoupper(Str::random(10)),
                'image' => null,
                'participant_id' => $participant->id,
                'evenement_id' => $evenement->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    
    }
}
