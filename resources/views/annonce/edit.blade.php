@extends('template')
@section('main')
    <h2 class="mb-4">Mise à jour d'une annonce</h2>
    @isset($annonce)
    <form action="{{route('annonce.update', $annonce->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <!-- Titre -->
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control @error("titre") is-invalid @enderror" id="titre" name="titre"
            value="{{old('titre',$annonce->titre)}}"
            >
            @error("titre")
            <p class="alert alert-danger">
                {{ $message }}
            </p>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4">{{old('description',$annonce->description)}}</textarea>
        </div>
   @error("description")
            <p class="alert alert-danger">
                {{ $message }}
            </p>
            @enderror
        <!-- Type -->
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            @php
                $type=old('type', $annonce->type);
            @endphp
            <select class="form-select" id="type" name="type">
                <option value="Appartement"  {{$type=="Appartement"?"selected":""}}>Appartement</option>
                <option value="Maison" {{$type=="Maison"?"selected":""}}>Maison</option>
                <option value="Magasin" {{$type=="Magasin"?"selected":""}}>Magasin</option>
                <option value="Villa" {{$type=="Villa"?"selected":""}}>Villa</option>
                <option value="Terrain" {{$type=="Terrain"?"selected":""}}>Terrain</option>
            </select>
        </div>
 @error("type")
            <p class="alert alert-danger">
                {{ $message }}
            </p>
            @enderror
        <!-- Ville -->
        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" value="{{old('ville',$annonce->ville)}}">
        </div>
 @error("ville")
            <p class="alert alert-danger">
                {{ $message }}
            </p>
            @enderror
        <!-- Superficie -->
        <div class="mb-3">
            <label for="superficie" class="form-label">Superficie</label>
            <div class="input-group">
                <input type="number" class="form-control" id="superficie" name="superficie" value="{{old('superficie',$annonce->superficie)}}">
                <span class="input-group-text">m²</span>
            </div>
        </div>
         @error("superficie")
            <p class="alert alert-danger">
                {{ $message }}
            </p>
            @enderror

        <!-- Etat -->
        <div class="mb-3">
            @php
                $neuf=old('neuf', $annonce->neuf);
            @endphp
            <label class="form-label d-block">Etat</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="neuf" id="neuf" value="1" {{$neuf? "checked":""}}>
                <label class="form-check-label" for="neuf">Neuf</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="neuf" id="ancien" value="0" {{!$neuf? "checked":""}}>
                <label class="form-check-label" for="ancien">Ancien</label>
            </div>
        </div>
 @error("neuf")
            <p class="alert alert-danger">
                {{ $message }}
            </p>
            @enderror
        <!-- Prix -->
        <div class="mb-3">
            <label for="prix" class="form-label">Prix</label>
            <div class="input-group">
                <input type="number" class="form-control" id="prix" name="prix" value="{{old('prix',$annonce->prix)}}">
                <span class="input-group-text">dhs</span>
            </div>
        </div>
 @error("prix")
            <p class="alert alert-danger">
                {{ $message }}
            </p>
            @enderror

            @if(isset($annonce->photo))
                                <img src="{{ asset($annonce->photo) }}" alt="{{$annonce->titre}}" width="75px">
                            @else
                             <img src="{{ asset('annonces/default2.jpg') }}" alt="no-image" width="75px">

                            @endif
                             <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <div class="input-group">
                <input type="file" class="form-control" id="photo" name="photo" >
             
            </div>
        </div>
        <!-- Bouton -->
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
    @endisset
@endsection