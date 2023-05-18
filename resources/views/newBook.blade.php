<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Nouveau livre</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="antialiased">

    <div style="text-align: center;" class="header">
        <p class="lienPageRetour"><a href="{{route('bookList')}}">Liste des livres</a></p>
        <h1 class="bookTitle">Nouveau livre</h1>
    </div>

    <hr class="separation">

    <div class="grid">
        <form action="{{route('newBook')}}" method="POST">
            @csrf

            <div class="grid-column">
                <label for="label" class="inline-elements">Titre du livre</label>
                <input type="text" name="title" placeholder="Titre du livre" class="inputRecherche" required>
            </div>

            <div class="grid-column">
                <label for="label" class="inline-elements">L'auteur</label>
                <input type="text" name="author" placeholder="Auteur" class="inputRecherche" required>
            </div>

            <div class="grid-column">
                <label for="label" class="inline-elements">Année de parution</label>
                <input type="text" name="year" placeholder="Année du livre" class="inputRecherche"
                       required pattern="[0-9]+" title="Veuillez entrer un nombre entier">
            </div>

            <div class="grid-column">
            <label for="label" class="inline-elements">Genre du livre</label>
            <select name="category_id" class="inputRecherche">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->label }}</option>
                @endforeach
            </select>
            </div>

            <br>
            <button type="submit" class="boutonRecherche">Valider la nouveau livre</button>
        </form>
    </div>

    <hr class="separation">

</body>
</html>
