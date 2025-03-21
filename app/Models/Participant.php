<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = ['nom', 'prenom', 'email'];

    // Relation avec les événements via la table pivot
    public function evenements()
    {
        return $this->belongsToMany(Evenement::class, 'participant_id')
                    ->withTimestamps(); // Inclut les timestamps
    }

    // Relation avec les tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
