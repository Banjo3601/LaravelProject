<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Liste des catégories</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>
<body class="antialiased">
    <div>
        <p class="lienPageBook"><a href="{{route('bookList')}}">Liste des livres</a></p>
        <p class="lienPageNewCategory"><a href="{{route('formulaireNewCategory')}}">Nouvelle catégorie</a></p>
        <h1 class="categoryTitle">Liste des catégories</h1>
    </div>

    <hr class="separation">

    @if(session()->has('success_category'))
        <br>
        <div class="alert-success">
            {{ session()->get('success_category') }}
        </div>
        <br>
    @endif
    <ul>
        @foreach($categories as $category)
            <div class="cadreListeCategory">
                <li>
                    <h2 class="titreCategoryListe">{{$category->label }}</h2>
                    <ul class="container">
                        <li class="optionCategory"><a href="{{route('categorydetail', ['category'=>$category->id])}}">détail</a></li>
                        <li class="optionCategory"><a href="{{route('categoryModif', ['categoryId'=>$category->id])}}">modifier</a></li>
                        <li class="optionCategory">
                            <a href="{{ route('categorydestroy', ['category' => $category->id]) }}"
                               onclick="event.preventDefault(); document.getElementById('delete-form-{{ $category->id }}').submit();">
                                supprimer
                            </a>
                        </li>

                        <form id="delete-form-{{ $category->id }}" action="{{ route('categorydestroy', ['category' => $category->id]) }}" method="POST" style="display: none;">
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
