<?php

namespace App\Http\Controllers;

use App\Mail\TicketNotification;
use App\Models\Evenement;
use App\Models\Participant;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{// Affiche la liste des tickets
    public function index()
    {
        $tickets = Ticket::with(['participant', 'evenement'])->get(); // Charger les relations
        return view('pages.tickets.index', compact('tickets'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $participants = Participant::all();
        $evenements = Evenement::all();
        return view('pages.tickets.create', compact('participants', 'evenements'));
    }

    // Enregistre un nouveau ticket
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nom' => 'required|string|max:255',
    //         'prenom' => 'required|string|max:255',
    //         'email' => 'required|email',
    //         'evenement_id' => 'required|exists:evenements,id',
    //     ]);
    
    //     $evenement = Evenement::find($request->evenement_id);
    
    //     // Vérifie si l'événement a atteint le nombre maximum de participants
    //     if ($evenement->tickets->count() >= $evenement->max_participants) {
    //         return redirect()->back()->with('error', 'Le nombre maximum de participants a été atteint.');
    //     }
    
    //     // Vérifie si un participant avec cet email existe déjà
    //     $participant = Participant::where('email', $request->email)->first();
    //     if (!$participant) {
    //         $participant = Participant::create([
    //             'nom' => $request->nom,
    //             'prenom' => $request->prenom,
    //             'email' => $request->email,
    //         ]);
    //     }
    
    //     // Vérifie si un ticket existe déjà pour ce participant et cet événement
    //     $existingTicket = Ticket::where('participant_id', $participant->id)
    //                             ->where('evenement_id', $evenement->id)
    //                             ->first();
    
    //     if ($existingTicket) {
    //         return redirect()->back()->with('error', 'Vous êtes déjà inscrit à cet événement.');
    //     }
    
    //     // Crée un ticket pour le participant
    //     Ticket::create([
    //         'ticket_code' => strtoupper(uniqid('TICKET_')), // Génère un code unique
    //         'participant_id' => $participant->id,
    //         'evenement_id' => $evenement->id,
    //     ]);
    
    //     return redirect()->back()->with('success', 'Votre participation a été enregistrée avec succès!');
    // }


    public function store(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email',
        'evenement_id' => 'required|exists:evenements,id',
    ]);

    $evenement = Evenement::find($request->evenement_id);

    // Vérifie si l'événement a atteint le nombre maximum de participants
    if ($evenement->tickets->count() >= $evenement->max_participants) {
        $messageContent = "Malheureusement, l'événement est complet. Vous ne pouvez pas vous inscrire à l'événement.";
        Mail::to($request->email)->send(new TicketNotification($evenement, $messageContent));
        return redirect()->back()->with('error', 'Le nombre maximum de participants a été atteint.');
    }

    // Vérifie si un participant avec cet email existe déjà
    $participant = Participant::where('email', $request->email)->first();
    if (!$participant) {
        $participant = Participant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
        ]);
    }

    // Vérifie si un ticket existe déjà pour ce participant et cet événement
    $existingTicket = Ticket::where('participant_id', $participant->id)
                            ->where('evenement_id', $evenement->id)
                            ->first();

    if ($existingTicket) {
        $messageContent = "Vous êtes déjà inscrit à l'événement : {$evenement->titre}. Merci de vérifier vos emails pour plus d'informations.";
        Mail::to($participant->email)->send(new TicketNotification($evenement, $messageContent));
        return redirect()->back()->with('error', 'Vous êtes déjà inscrit à cet événement.');
    }

    // Crée un ticket pour le participant
    Ticket::create([
        'ticket_code' => strtoupper(uniqid('TICKET_')), // Génère un code unique
        'participant_id' => $participant->id,
        'evenement_id' => $evenement->id,
    ]);

    $messageContent = "Votre participation à l'événement {$evenement->titre} a été enregistrée avec succès. Merci et à bientôt !";
    Mail::to($participant->email)->send(new TicketNotification($evenement, $messageContent));

    return redirect()->back()->with('success', 'Votre participation a été enregistrée avec succès!');
}
    
    // Supprime un ticket
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket supprimé avec succès');
    }
}
