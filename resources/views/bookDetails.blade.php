<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Détail d'un livre</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
    <div>
        <p class="lienPageCategory"><a href="{{route('bookList')}}">Liste des livres</a></p>
        <p class="lienPageNewBook"><a href="{{route('formulaireNewBook')}}">Nouveau livre</a></p>
        <h1 class="bookTitle">Détail livre</h1>
    </div>

    <hr class="separation">

    <div class="cadreListeLivre">
        <h2>{{$book->title }}</h2>
        <hr class="separationDetailLivre">
        <h3>Année de parution : {{$book->year}}</h3>
        <h3>Auteur : {{$book->author}}</h3>
        <h3>Genre du livre :
            <a href="{{route('categorydetail', ['category'=>$category->id])}}">
                <p class="lienCategory">{{$category->label}}</p>
            </a>
        </h3>
    </div>
</body>
</html>
