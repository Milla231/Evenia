@extends('dashboard.main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Modifier l'événement</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Événements</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Modifier l'événement</li>
                </ol>
            </nav>
        </div>
        
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card mx-auto">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Formulaire de modification d'événement</h4>
                        
                        <!-- Formulaire pour modifier un événement -->
                        <form class="forms-sample" method="POST" action="{{ route('evenement.update', $evenement->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Utilisation de la méthode HTTP PUT -->
                            
                            <div class="form-group">
                                <label for="titre">Titre de l'événement</label>
                                <input type="text" name="titre" class="form-control" id="titre" value="{{ $evenement->titre }}" placeholder="Entrez le titre de l'événement">
                                @error('titre')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="description" placeholder="Entrez une description">{{ $evenement->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                <small>Image actuelle : {{ $evenement->image }}</small>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="date_debut">Date de début</label>
                                <input type="date" name="date_debut" class="form-control" id="date_debut" value="{{ $evenement->date_debut }}">
                                @error('date_debut')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="date_fin">Date de fin</label>
                                <input type="date" name="date_fin" class="form-control" id="date_fin" value="{{ $evenement->date_fin }}">
                                @error('date_fin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="max_participants">Nombre maximum de participants</label>
                                <input type="number" name="max_participants" class="form-control" id="max_participants" value="{{ $evenement->max_participants }}" placeholder="Entrez le nombre maximum de participants">
                                @error('max_participants')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="type">Type d'événement</label>
                                <input type="text" name="type" class="form-control" id="type" value="{{ $evenement->type }}" placeholder="Entrez le type de l'événement (exemple : Conférence)">
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="form-group">
                                <label for="status">Statut</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="actif" {{ $evenement->status == 'actif' ? 'selected' : '' }}>Actif</option>
                                    <option value="expiré" {{ $evenement->status == 'expiré' ? 'selected' : '' }}>Expiré</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Modifier l'événement</button>
                            <a href="{{ route('evenement.index') }}" class="btn btn-secondary">Annuler</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">waouhmonde</span>
        </div>
    </footer>
</div>
@endsection
