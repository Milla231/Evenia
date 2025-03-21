@extends('pages.site.app-site')

@section('content')

<!-- Messages SweetAlert -->
@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Succès',
            text: '{{ session('success') }}',
        });
    </script>
@endif

@if (session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Erreur',
            text: '{{ session('error') }}',
        });
    </script>
@endif

<!-- slider_area_start -->
<div class="slider_area">
    <div class="single_slider d-flex align-items-center slider_bg_1 overlay">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-xl-12">
                    <div class="slider_text text-center">
                        <div class="shape_1 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".2s">
                            <img src="{{ asset('assets_site/img/shape/shape_1.svg') }}" alt="">
                        </div>
                        <div class="section_title">
                            <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">Événements</h3>
                        </div>
                        <div class="shape_2 wow fadeInDown" data-wow-duration="1s" data-wow-delay=".2s">
                            <img src="{{ asset('assets_site/img/shape/shape_2.svg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider_area_end -->

<!-- performar_area_start -->
<div class="performar_area black_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section_title mb-80">
                    <h3 class="wow fadeInRight" data-wow-duration="1s" data-wow-delay=".3s">Événements Disponibles</h3>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach ($evenements as $evenement)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="p-3 border border-light rounded wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                    <div data-tilt class="thumb mb-3">
                        <img src="{{ asset('assets_site/img/performer/1.png') }}" alt="" class="img-fluid">
                    </div>
                    <div class="performer_heading text-center">
                        <h4>{{ $evenement->titre }}</h4>
                        <p>{{ \Illuminate\Support\Str::limit($evenement->description, 100) }}</p>
                        <p><strong>Participants :</strong> {{ $evenement->tickets->count() }} / {{ $evenement->max_participants }}</p>
                        @if ($evenement->tickets->count() >= $evenement->max_participants)
                            <button class="btn btn-secondary mt-2" disabled>Complet</button>
                        @else
                            <button class="btn btn-outline-primary mt-2" data-bs-toggle="modal" data-bs-target="#participateModal{{ $evenement->id }}">Participer</button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Modal Participation -->
            <div class="modal fade" id="participateModal{{ $evenement->id }}" tabindex="-1" aria-labelledby="participateModalLabel{{ $evenement->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="participateModalLabel{{ $evenement->id }}">Participer à {{ $evenement->titre }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('tickets.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="evenement_id" value="{{ $evenement->id }}">
                                <div class="form-group mb-3">
                                    <label for="nom">Nom</label>
                                    <input type="text" name="nom" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="prenom">Prénom</label>
                                    <input type="text" name="prenom" class="form-control" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-success">Soumettre</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- performar_area_end -->
@endsection
