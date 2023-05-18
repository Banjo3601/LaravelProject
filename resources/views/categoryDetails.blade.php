<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Détail de la catégorie</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="antialiased">

    <div>
        <p class="lienPageBook"><a href="{{route('bookList')}}">Liste des livres</a></p>
        <p class="lienPageNewCategory"><a href="{{route('formulaireNewCategory')}}">Nouvelle catégorie</a></p>
        <h1 class="categoryTitle">Détail de la catégorie "{{$category->label}}"</h1>
    </div>

    <hr class="separation">

    <h2>Liste des livres associés</h2>
    <ul>
        @foreach($books as $book)
            <div class="cadreListeCategory">
                <li>
                    <h2 class="titreLivreListe">{{$book->title }}</h2>
                    <ul class="container">
                        <li class="optionCategory"><a href="{{route('bookdetail', ['book'=>$book->id])}}">détail</a></li>
                        <li class="optionCategory"><a href="{{route('bookModif', ['bookId'=>$book->id])}}">modifier</a></li>
                        <li class="optionCategory">
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
