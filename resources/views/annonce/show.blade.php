@extends('template')
@section('main')
@isset($annonce)
    <h2 class="mb-4">Détails de l'annonce numéro {{$annonce->id}}</h2>
    <p>
        Titre: <strong>{{$annonce->titre}}</strong> <br>
        Description: <strong>{{$annonce->description}}</strong><br>
        Superficie: <strong>{{$annonce->superficie}}</strong><br>
        Prix: <strong>{{$annonce->prix}}</strong><br>
Date de création: <strong>{{$annonce->created_at}}</strong><br>
Date de dernière mofdification: <strong>{{$annonce->updated_at}}</strong>
    </p>
@endisset
    
@endsection