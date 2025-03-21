<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;

class EvenementController extends Controller
{
    /**
     * Afficher la liste des événements (actifs et supprimés marqués).
     */
    public function index()
    {
        // Récupérer uniquement les événements qui ne sont pas supprimés
        $evenements = Evenement::where('status', '!=', 'supprimé')->get();

        // Retourner la vue avec les événements
        return view('page.Evenement.index', compact('evenements'));
    }

    /**
     * Afficher le formulaire pour créer un nouvel événement.
     */
    public function create()
    {
        // Retourner la vue pour créer un événement
        return view('page.Evenement.create');
    }

    /**
     * Créer un nouvel événement.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'max_participants' => 'required|integer',
            'type' => 'nullable|string',
        ]);

        $evenement = Evenement::create($request->all());

        // Si une image est téléchargée, l'uploader
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/evenements', 'public');
            $evenement->update(['image' => $imagePath]);
        }

        return redirect()->route('evenement.index')->with('success', 'Événement créé avec succès!');
    }

    /**
     * Afficher un événement spécifique.
     */
    public function show(Evenement $evenement)
    {
        // Vérifiez si l'événement est supprimé avant l'affichage
        if ($evenement->status === 'supprimé') {
            abort(404, "Cet événement a été supprimé.");
        }

        // Retourner les détails de l'événement
        $participants = $evenement->participants;
        return view('page.Evenement.show', compact('evenement', 'participants'));
    }

    /**
     * Mettre à jour un événement existant.
     */
    public function update(Request $request, Evenement $evenement)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'max_participants' => 'required|integer',
            'type' => 'nullable|string',
        ]);

        $evenement->update($request->all());

        // Si une nouvelle image est téléchargée, l'uploader
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/evenements', 'public');
            $evenement->update(['image' => $imagePath]);
        }

        return redirect()->route('evenement.index')->with('success', 'Événement mis à jour avec succès!');
    }

    /**
     * Marquer un événement comme supprimé.
     */
    public function destroy(Evenement $evenement)
    {
        // Mettre à jour le statut de l'événement à "supprimé"
        $evenement->update(['status' => 'supprimé']);

        return redirect()->route('evenement.index')->with('success', 'Événement marqué comme supprimé avec succès!');
    }
}
