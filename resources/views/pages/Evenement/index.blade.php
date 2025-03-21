@extends('dashboard.main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Tables des événements</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Événements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Tables des événements</li>
                </ol>
            </nav>
        </div>

        <!-- Bouton d'ajout d'événement -->
        <div class="row text-white">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('evenement.create') }}" class="btn btn-success mb-3">Ajouter un événement</a>
                        @if (session('retour') == null)
                        @else
                        <span class="alert alert-success">{{ session('retour') }}</span>
                        @endif
                        <div class="table-responsive text-white">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-white">Id</th>
                                        <th class="text-white">Nom événement</th>
                                        <th class="text-white">Nombre maximum de participant</th>
                                        <th class="text-white">Image</th>
                                        <th class="text-white">Date début</th>
                                        <th class="text-white">Date fin</th>
                                        <th class="text-white">Type</th>
                                        <th class="text-white">Status</th>
                                        <th class="text-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($evenements as $index => $evenement)
                                    <tr>
                                        <td class="py-1">{{ $index + 1 }}</td>
                                        <td class="text-white">{{ $evenement->titre }}</td>
                                        <td class="text-white">{{ $evenement->max_participants }}</td>

                                        <td class="text-white">
                                            <a href="{{ asset($evenement->image) }}" target="_blank">
                                                <img src="{{ asset($evenement->image) }}" width="50" height="50" alt="Image">
                                            </a>
                                        </td>
                                        <td class="text-white">{{ $evenement->date_debut }}</td>
                                        <td class="text-white">{{ $evenement->date_fin }}</td>
                                        <td class="text-white">{{ $evenement->type }}</td>
                                        <td class="text-white">{{ $evenement->status }}</td>
                                        <td class="text-white">
                                            <!-- Bouton pour Détails -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailsModal{{ $evenement->id }}">Détails</button>

                                            <!-- Bouton pour Modifier -->
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $evenement->id }}">Modifier</button>

                                            <!-- Formulaire pour supprimer l'événement -->
                                            <form action="{{ route('evenement.destroy', $evenement->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer cet événement ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Détails -->
                                    <div class="modal fade" id="detailsModal{{ $evenement->id }}" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="detailsModalLabel">Détails de l'événement</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-white">
                                                    <p class="text-black"><strong>Nom: </strong>{{ $evenement->titre }}</p>
                                                    <p class="text-black"><strong>Description: </strong>{{ $evenement->description }}</p>
                                                    <p class="text-black"><strong>Date début: </strong>{{ $evenement->date_debut }}</p>
                                                    <p class="text-black"><strong>Date fin: </strong>{{ $evenement->date_fin }}</p>
                                                    <p class="text-black"><strong>Type: </strong>{{ $evenement->type }}</p>
                                                    <p class="text-black"><strong>Status: </strong>{{ $evenement->status }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal Modifier -->
                                    <div class="modal fade" id="editModal{{ $evenement->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $evenement->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $evenement->id }}">Modifier l'événement</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('evenement.update', $evenement->id) }}" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        
                                                        <!-- Titre -->
                                                        <div class="form-group">
                                                            <label for="titre">Titre</label>
                                                            <input type="text" name="titre" class="form-control" value="{{ $evenement->titre }}" required>
                                                        </div>
                                    
                                                        <!-- Description -->
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <textarea name="description" class="form-control" required>{{ $evenement->description }}</textarea>
                                                        </div>
                                    
                                                        <!-- Image -->
                                                        <div class="form-group">
                                                            <label for="image">Image</label>
                                                            <input type="file" name="image" class="form-control">
                                                            <small class="text-muted">Image actuelle : {{ $evenement->image }}</small>
                                                        </div>
                                    
                                                        <!-- Dates -->
                                                        <div class="form-group">
                                                            <label for="date_debut">Date Début</label>
                                                            <input type="date" name="date_debut" class="form-control" value="{{ $evenement->date_debut }}" required>
                                                        </div>
                                    
                                                        <div class="form-group">
                                                            <label for="date_fin">Date Fin</label>
                                                            <input type="date" name="date_fin" class="form-control" value="{{ $evenement->date_fin }}" required>
                                                        </div>
                                    
                                                        <!-- Nombre de participants -->
                                                        <div class="form-group">
                                                            <label for="max_participants">Nombre maximum de participants</label>
                                                            <input type="number" name="max_participants" class="form-control" value="{{ $evenement->max_participants }}" required>
                                                        </div>
                                    
                                                        <!-- Type -->
                                                        <div class="form-group">
                                                            <label for="type">Type</label>
                                                            <input type="text" name="type" class="form-control" value="{{ $evenement->type }}">
                                                        </div>
                                    
                                                        <!-- Statut -->
                                                        <div class="form-group">
                                                            <label for="status">Statut</label>
                                                            <select name="status" class="form-control">
                                                                <option value="actif" {{ $evenement->status == 'actif' ? 'selected' : '' }}>Actif</option>
                                                                <option value="expiré" {{ $evenement->status == 'expiré' ? 'selected' : '' }}>Expiré</option>
                                                            </select>
                                                        </div>
                                    
                                                        <!-- Bouton soumettre -->
                                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
