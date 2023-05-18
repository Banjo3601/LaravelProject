<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Liste des livres</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
    <div>
        <p class="lienPageCategory"><a href="{{route('categorylist')}}">Liste des catégories</a></p>
        <p class="lienPageNewBook"><a href="{{route('formulaireNewBook')}}">Nouveau livre</a></p>
        <h1 class="bookTitle">Recherche de livres</h1>
    </div>

    <div style="text-align: center;">
        <form action="{{ route('rechercheLivre') }}" method="GET" class="formRecherche" >
            @csrf
            <input type="text" name="title" placeholder="Titre du livre" class="inputRecherche">
            <input type="text" name="author" placeholder="Auteur" class="inputRecherche">
            <input type="text" name="year" placeholder="Année du livre" class="inputRecherche">
            <select name="category_id" class="inputRecherche">
                <option value="">Toutes les catégories</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->label }}</option>
                @endforeach
            </select>
            <button type="submit" class="boutonRecherche">Rechercher</button>
        </form>
    </div>

    <hr class="separation">

    <h1 class="bookTitle">Liste des livres</h1>

    @if(session()->has('success'))
        <br>
        <div class="alert-success">
            {{ session()->get('success') }}
        </div>
        <br>
    @endif

    <ul>
    @foreach($books as $book)
        <div class="cadreListeLivre">
            <li>
            <h2 class="titreLivreListe">{{$book->title }}</h2>
                <ul class="container">
                    <li class="optionBook"><a href="{{route('bookdetail', ['book'=>$book->id])}}">détail</a></li>
                    <li class="optionBook"><a href="{{route('bookModif', ['bookId'=>$book->id])}}">modifier</a></li>
                    <li class="optionBook">
                        <a href="{{ route('bookdestroy', ['book' => $book->id]) }}"
                                          onclick="event.preventDefault(); document.getElementById('delete-form-{{ $book->id }}').submit();">
                            supprimer
                        </a>
                    </li>

                    <form id="delete-form-{{ $book->id }}" action="{{ route('bookdestroy', ['book' => $book->id]) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>

                </ul>
            </li>
        </div>
    @endforeach
    </ul>

    <hr class="separation">

</body>
</html>
