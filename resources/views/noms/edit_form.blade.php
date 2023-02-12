<!-- resources/views/noms/edit_form.blade.php -->
@extends("noms.trame")

@section('title', 'Modifier une personne')

@section('contents')

@if ($errors->any())
<div class="error">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
<form action="{{ route('update', ['id' => $personne->id]) }}" method="post">
        @method('POST')
        Nom: <input type="text" name="nom" value="{{ $personne->nom }}">
        Prénom: <input type="text" name="prenom" value="{{ $personne->prenom }}">
        Age: <input type="text" name="age" value="{{ $personne->age }}">
        <input type="submit" value="Enregistrer">
        @csrf
</form>
@endsection