@extends('dashboard.main')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">Liste des tickets</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Tickets</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Liste des tickets</li>
                </ol>
            </nav>
        </div>

        <!-- Bouton pour ajouter un ticket -->
        <div class="row text-white">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        @if (session('success'))
                            <span class="alert alert-success">{{ session('success') }}</span><br>
                        @endif
                        <div class="table-responsive text-white">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-white">Id</th>
                                        <th class="text-white">Code du ticket</th>
                                        <th class="text-white">Image</th>
                                        <th class="text-white">Participant</th>
                                        <th class="text-white">Événement</th>
                                        <th class="text-white">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $index => $ticket)
                                    <tr>
                                        <td class="py-1">{{ $index + 1 }}</td>
                                        <td class="text-white">{{ $ticket->ticket_code }}</td>
                                        <td class="text-white">
                                            @if ($ticket->image)
                                                <a href="{{ asset('storage/' . $ticket->image) }}">
                                                    <img src="{{ asset('storage/' . $ticket->image) }}" width="50" height="50" alt="Ticket Image">
                                                </a>
                                            @else
                                                Aucun
                                            @endif
                                        </td>
                                        <td class="text-white">{{ $ticket->participant->nom }} {{ $ticket->participant->prenom }}</td>
                                        <td class="text-white">{{ $ticket->evenement->titre }}</td>
                                        <td class="text-white">
                                            <!-- Formulaire pour supprimer le ticket -->
                                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Voulez-vous vraiment supprimer ce ticket ?')">
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

    <!-- Footer -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">waouhmonde</span>
        </div>
    </footer>
</div>

@endsection
