{{-- ressources/views/noms_liste.blade.php --}}
@extends('main')
@section('title', 'Liste des noms')
@section('contenu')
<p>La liste des noms</p>
@unless(empty($personnes))
<table border='4'>
<th>Nom</th>
<th>Prénom</th>
<th>Age</th>
<th>Actions</th>
@foreach($personnes as $personne)
<tr><td>{{$personne->nom}}</td>
<td>{{$personne->prenom}}</td>
<td>{{$personne->age}}</td>

<td>
      <div class="dropdown">
        <button>
          <a class="dropdown-item" href="{{ route('edit', ['id' => $personne->id]) }}">Modifier</a>
        </button>
        <form action="{{ route('delete', ['id' => $personne->id]) }}" method="post">
          @csrf
          @method('DELETE')
        <button type="submit">Supprimer</button>
        </form>
      </div>
</td>
</tr>
@endforeach
</table>
<a href="{{ route('noms.create') }}">Ajouter une personne</a>
@else
@endunless
@endsection