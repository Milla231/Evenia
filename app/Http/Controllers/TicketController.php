<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Participant;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{// Affiche la liste des tickets
    public function index()
    {
        $tickets = Ticket::with(['participant', 'evenement'])->get(); // Charger les relations
        return view('page.tickets.index', compact('tickets'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $participants = Participant::all();
        $evenements = Evenement::all();
        return view('page.tickets.create', compact('participants', 'evenements'));
    }

    // Enregistre un nouveau ticket
    public function store(Request $request)
    {
        $request->validate([
            'ticket_code' => 'required|unique:tickets',
            'image' => 'nullable|image',
            'participant_id' => 'required|exists:participants,id',
            'evenement_id' => 'required|exists:evenements,id',
        ]);

        // Upload de l'image si présente
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('tickets', 'public');
        }

        Ticket::create([
            'ticket_code' => $request->ticket_code,
            'image' => $imagePath,
            'participant_id' => $request->participant_id,
            'evenement_id' => $request->evenement_id,
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket ajouté avec succès');
    }

    // Supprime un ticket
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket supprimé avec succès');
    }
}
