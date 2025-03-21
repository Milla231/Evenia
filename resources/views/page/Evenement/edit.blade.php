@extends('dashboard.main')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title"> Modification d'un evenement</h3>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Evenement</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ajout du evenement</li>
          </ol>
        </nav>
      </div>
      <div class="row">
        <div class="col-md-6 grid-margin stretch-card  mx-auto  col-lg-8 mx-auto col-lg-8">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Evernement</h4>
            
              <form class="forms-sample" method="post" action="{{route('evenement.update', $evenement)}}" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nom d'evernement</label>
                  <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" id="exampleInputUsername2" placeholder="Mettez le nom d'evernement"  value="{{$evenement->name}}">
                    {{-- POUR CORRIGER LES ERREUR --}}
                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                 <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Description d'evenement</label>
                    <div class="col-sm-9">
                      <input type="text" name="description" class="form-control" id="exampleInputUsername2" placeholder="Description"  value="{{$evenement->description}}">
                      {{-- POUR CORRIGER LES ERREUR --}}
                      @error('description')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Image d'evenement</label>
                    <div class="col-sm-9">
                      <input type="file" name="image" class="form-control" id="exampleInputUsername2" value="{{old('image')}}" placeholder="" accept=".jpg, .jpeg, .png, .svg" >
                      {{-- POUR CORRIGER LES ERREUR --}}
                      @error('image')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                 </div>
                 <div class="form-group row">
                <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Date de l'evernement</label>
                  <div class="col-sm-9">
                    <input type="date" name="date" class="form-control" id="exampleInputUsername2" placeholder="Mettez le nom d'evernement"  value="{{$evenement->date}}">
                    {{-- POUR CORRIGER LES ERREUR --}}
                    @error('date')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group row">
                  <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Heure de l'evenement</label>
                  <div class="col-sm-9">
                    <input type="time" name="heure" class="form-control" id="exampleInputUsername2" placeholder="Mettez le nom d'evernement"  value="{{$evenement->heure}}">
                    {{-- POUR CORRIGER LES ERREUR --}}
                    @error('heure')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                </div>
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Arrondissement</label>
                    <div class="col-sm-9">
                      <select name="arrondissement_id" id="" class="form-control">
                        <option value="">Sélectionnez un arrondissement</option>
                        @foreach ($arrondissements as $arrondissement)
                          <option value="{{$arrondissement->id}}">{{$arrondissement->name}}</option>
                        @endforeach
                      </select>
                      {{-- POUR CORRIGER LES ERREUR --}}
                      @error('arrondissement_id')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Categorie</label>
                    <div class="col-sm-9">
                      <select name="categorie_id" id="" class="form-control">
                        <option value="">Sélectionnez une categorie</option>
                        @foreach ($categories as $categorie)
                          <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                      </select>
                      {{-- POUR CORRIGER LES ERREUR --}}
                      @error('categorie_id')
                          <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                  </div>
                <button type="submit" class="btn btn-primary mr-2">Modifier</button>
                <button class="btn btn-dark" type="reset">Annuler</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:../../partials/_footer.html -->
    <footer class="footer">
      <div class="d-sm-flex justify-content-center justify-content-sm-between">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
      </div>
    </footer>
    <!-- partial -->
  </div>
@endsection
