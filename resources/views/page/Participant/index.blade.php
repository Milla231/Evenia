@extends('dashboard.main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Liste des participants</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Participants</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liste des participants</li>
                </ol>
            </nav>
        </div>

        <!-- Bouton pour ajouter un participant -->
        <div class="row text-white">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('participant.create') }}" class="btn btn-success mb-3">Ajouter un participant</a>
                        @if (session('retour') == null)
                        @else
                        <span class="alert alert-success">{{ session('retour') }}</span>
                        @endif
                        <div class="table-responsive text-white">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-white">Id</th>
                                        <th class="text-white">Nom</th>
                                        <th class="text-white">Prénom</th>
                                        <th class="text-white">Email</th>
                                        <th class="text-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participants as $index => $participant)
                                    <tr>
                                        <td class="py-1">{{ $index + 1 }}</td>
                                        <td class="text-white">{{ $participant->nom }}</td>
                                        <td class="text-white">{{ $participant->prenom }}</td>
                                        <td class="text-white">{{ $participant->email }}</td>
                                        <td class="text-white">
                                            <!-- Boutons pour afficher les détails et supprimer -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailsModal" onclick="showDetails('{{ $participant->nom }}', '{{ $participant->prenom }}', '{{ $participant->email }}')">Détails</button>
                                            
                                            
                                            
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
    function showDetails(nom, prenom, email) {
        document.getElementById('modalNom').innerText = nom;
        document.getElementById('modalPrenom').innerText = prenom;
        document.getElementById('modalEmail').innerText = email;
    }
</script>
@endsection
