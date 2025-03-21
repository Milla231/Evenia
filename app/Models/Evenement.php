<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evenement extends Model
{
    protected $fillable = ['titre', 'description', 'date_debut', 'date_fin', 'image', 'max_participants', 'type', 'status'];

    // Relation avec les participants via la table pivot
    public function participants()
    {
        return $this->belongsToMany(Participant::class, 'participant_id')
                    ->withTimestamps(); // Inclut les timestamps
    }

    // Relation avec les tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

}
