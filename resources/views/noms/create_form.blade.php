<!-- resources/views/noms/create_form.blade.php -->
@extends("noms.trame")

@section('title', 'Ajouter une personne')

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
    <form action="" method="post">
        Nom: <input type="text" name="nom" value="{{old('nom')}}">
        Prénom: <input type="text" name="prenom" value="{{old('prenom')}}">
        Age: <input type="text" name="age" value="{{old('age')}}">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection