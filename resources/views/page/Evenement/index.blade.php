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
                                        <th class="text-white">Description</th>
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
                                        <td class="text-white" >{{ $evenement->titre }}</td>
                                        <td class="text-white" >{{ $evenement->description }}</td>
                                        <td class="text-white" ><a href="{{ asset($evenement->image) }}"><img src="{{ asset($evenement->image) }}" width="50" height="50" alt=""></a></td>
                                        <td class="text-white" >{{ $evenement->date_debut }}</td>
                                        <td class="text-white" >{{ $evenement->date_fin }}</td>
                                        <td class="text-white" >{{ $evenement->type }}</td>
                                        <td class="text-white" >{{ $evenement->status }}</td>
                                        <td class="text-white" >
                                            <!-- Boutons pour afficher les détails et supprimer -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailsModal" onclick="showDetails('{{ $evenement->titre }}', '{{ $evenement->date_debut }}', '{{ $evenement->date_fin }}', '{{ $evenement->type }}', '{{ $evenement->status }}')">Détails</button>
                                            
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#descriptionModal" onclick="showDescription('{{ $evenement->description }}')">Description</button>

                                            <!-- Formulaire pour supprimer l'événement -->
                                            <form action="{{ route('evenement.destroy', $evenement->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer cet événement ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour afficher les détails -->
    <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailsModalLabel">Détails de l'événement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-white">
                    <p class="text-black"><strong>Nom de l'événement: </strong><span id="modalTitre"></span></p>
                    <p class="text-black"><strong>Date de début: </strong><span id="modalDateDebut"></span></p>
                    <p class="text-black"><strong>Date de fin: </strong><span id="modalDateFin"></span></p>
                    <p class="text-black"><strong>Type: </strong><span id="modalType"></span></p>
                    <p class="text-black"><strong>Status: </strong><span id="modalStatus"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal pour afficher la description -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="descriptionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descriptionModalLabel">Description de l'événement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalDescription"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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

@section('scripts')
<script>
    function showDescription(description) {
        document.getElementById('modalDescription').innerText = description;
    }

    function showDetails(titre, dateDebut, dateFin, type, status) {
        document.getElementById('modalTitre').innerText = titre;
        document.getElementById('modalDateDebut').innerText = dateDebut;
        document.getElementById('modalDateFin').innerText = dateFin;
        document.getElementById('modalType').innerText = type;
        document.getElementById('modalStatus').innerText = status;
    }
</script>
@endsection
