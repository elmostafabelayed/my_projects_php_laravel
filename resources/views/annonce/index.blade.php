@extends("template")
@section('main')
    <h2 class="mb-4">Liste des annonces</h2>
     <div class="d-flex ">
         <a class="btn btn-primary  jestify-content-start" href="{{route('annonce.create')}}">Nouvelle annonce</a>
    <div class="jestify-content-end gap-2">
         <a class="btn btn-secondary" href="{{route('annonce.index')}}">Tout</a>
         <a class="btn btn-secondary" href="{{route('annonce.index',['filtre' => 'neuf'])}}">neuf</a>
            <a class="btn btn-secondary" href="{{route('annonce.index',['filtre' => 'ancien'])}}">ancien</a>
    </div>
    </div>
<form action="{{ route('annonce.index') }}" class="form-inline d-flex">
    <select name="ville" id="" class="form-control">
        <option value=0>Tout les villes</option>
        @foreach ($villes as $vi)
        <option value="{{ $vi->ville }}">{{ $vi->ville }}</option>
        @endforeach
    </select>
     <input type="text" name="rech" class="form-control" placeholder="Titre or description">
    <button type="submit" class="btn btn-primary">Recherch</button>
</form>
  @if(session()->has("success"))
  <p class="alert alert-success">{{session("success")}}</p>
  @endif

    @isset($annonces)
        <table class="table">
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Ville</th>
                    <th>Superficie (m<sup>2</sup>)</th>
                    <th>Etat</th>
                    <th>Prix (dhs)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($annonces as $annonce)
                    <tr>
                        <td>
                            @if(isset($annonce->photo))
                                <img src="{{ asset($annonce->photo) }}" alt="{{$annonce->titre}}" width="75px">
                            @else
                             <img src="{{ asset('annonces/default2.jpg') }}" alt="no-image" width="75px">

                            @endif
                        </td>
                        <td>{{$annonce->id}}</td>
                        <td>{{$annonce->titre}}</td>
                        <td>{{ substr($annonce->description, 0,30)}}...</td>
                        <td>{{$annonce->type}}</td>
                        <td>{{$annonce->ville}}</td>
                        <td>{{$annonce->superficie}}</td>
                        <td>{{$annonce->neuf? "Neuf": "Ancien"}}</td>
                        <td>{{$annonce->prix}}</td>
                        <td>
<form action="{{route('annonce.destroy', $annonce->id)}}" method="post"
    onsubmit="return confirm('Voulez vous supprimer l\'annonce {{$annonce->titre}}?')">
    @csrf
    @method('delete')
    <a href="{{route('annonce.show', $annonce->id)}}" class="btn btn-sm">📋</a>
    <a href="{{route('annonce.edit', $annonce->id)}}" class="btn btn-sm">🖋️</a>
    <button type="submit" class="btn btn-sm">❌</button>
</form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endisset
@endsection
