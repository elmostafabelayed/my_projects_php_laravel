@extends('template')
@section('main')
    <h2 class="mb-4">Nouvelle annonce</h2>

    @if($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <form action="{{route('annonce.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Titre -->
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" value="{{ old('titre') }}">
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
        </div>

        <!-- Type -->
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select class="form-select" id="type" name="type">
                <option selected value="Appartement" {{ old('type')=="Appartement"? "selected":"" }}>Appartement</option>
                <option value="Maison" {{ old('type')=="Maison"? "selected":"" }}>Maison</option>
                <option value="Magasin" {{ old('type')=="Magasin"? "selected":"" }}>Magasin</option>
                <option value="Villa" {{ old('type')=="Villa"? "selected":"" }}>Villa</option>
                <option value="Terrain" {{ old('type')=="Terrain"? "selected":"" }}>Terrain</option>
            </select>
        </div>

        <!-- Ville -->
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" value="{{ old('ville') }}">
        </div>

        <!-- Superficie -->
        <div class="mb-3">
            <label for="superficie" class="form-label">Superficie</label>
            <div class="input-group">
                <input type="number" class="form-control" id="superficie" name="superficie" value="{{ old('superficie') }}">
                <span class="input-group-text">m²</span>
            </div>
        </div>

        <!-- Etat -->
        <div class="mb-3">
            <label class="form-label d-block">Etat</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="neuf" id="neuf" value="1" {{ old('neuf')? "checked":"" }}>
                <label class="form-check-label" for="neuf">Neuf</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="neuf" id="ancien" value="0" {{ !old('neuf')? "checked":"" }}>
                <label class="form-check-label" for="ancien">Ancien</label>
            </div>
        </div>

        <!-- Prix -->
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <div class="input-group">
                <input type="number" class="form-control" id="prix" name="prix" value="{{ old('prix') }}">
                <span class="input-group-text">dhs</span>
            </div>
        </div>
 <!-- Prix -->
        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <div class="input-group">
                <input type="file" class="form-control" id="photo" name="photo" >
             
            </div>
        </div>
        <!-- Bouton -->
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
@endsection