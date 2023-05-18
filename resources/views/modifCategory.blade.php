<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Modification d'une catégorie</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="antialiased">

    <p class="lienPageBook"><a href="{{route('categorylist')}}">Liste des catégories</a></p>
    <h1  class="categoryTitle">Modification d'une catégorie</h1>

    <hr class="separation">

    <div class="grid">
        <form action="{{route('validModifCategory', ['id'=>$category->id])}}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid-column">
                <label for="label" class="inline-elements">Nom de la catégorie</label>
                <input type="text" name="label" id="label" class="inputRecherche" value="{{$category->label}}" required>
            </div>

            <br>
            <button type="submit" class="boutonValidationCategory">Valider le(s) modification(s)</button>

        </form>
    </div>

    <hr class="separation">

</body>
</html>
