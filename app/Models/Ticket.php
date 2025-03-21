<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['ticket_code', 'image', 'participant_id', 'evenement_id'];

    // Relation avec le participant
    public function participant()
    {
        return $this->belongsTo(Participant::class);
    }

    // Relation avec l'événement
    public function evenement()
    {
        return $this->belongsTo(Evenement::class);
    }
}
