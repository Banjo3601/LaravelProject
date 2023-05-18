<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ValidBookRequest;

class BookController extends Controller
{
    public function index(){
        $books = Book::all();
        $categories = Category::all();
        return view('bookList', compact('books', 'categories'));
    }
    public function showBookDetails($bookId){
        $book = Book::findOrFail($bookId);
        $category = Category::findOrFail($book->category_id);

        return view('bookDetails', compact('book', 'category'));
    }

    public function destroy(Book $book): RedirectResponse{
        $book->delete();
        return redirect()->Route('bookList')->with('success', 'Le livre a été supprimé avec succès !');
    }

    public function formulaireModifBook($bookId){
        $book = Book::findOrFail($bookId);
        $categories = Category::all();

        return view('modifBook', compact('book', 'categories'));
    }

    public function validModifBook(ValidBookRequest $request, $id): RedirectResponse{

        $book = Book::findOrFail($id);

        $book->title = $request->title;
        $book->year = $request->year;
        $book->author = $request->author;
        $book->category_id = $request->category_id;

        $book->save();

        return redirect()->route('bookList')->with('success', 'Le livre a été modifié avec succès !');
    }

    public function formulaireNewBook(){
        $categories = Category::all();

        return view('newBook', compact('categories'));
    }

    public function enregistrerBook(ValidBookRequest $request): RedirectResponse{

        $book = new Book();
        $book->title = $request->input('title');
        $book->year = $request->input('year');
        $book->author = $request->input('author');
        $book->category_id = $request->input('category_id');

        $book->save();

        return redirect()->route('bookList')->with('success', 'Le livre a été ajouté avec succès !');
    }

    public function searchLivre(Request $request){

        $title = $request->input('title');
        $author = $request->input('author');
        $category_id = $request->input('category_id');
        $year = $request->input('year');

        $query = Book::query();

        if ($title) {
            $query->where('title', 'like', '%' . $title . '%');
        }

        if ($author) {
            $query->where('author', 'like', '%' . $author . '%');
        }

        if ($category_id) {
            $query->where('category_id', $category_id);
        }

        if($year){
            $query->where('year', $year);
        }

        $books = $query->get();

        return view('resultatRecherche', compact('books'));
    }
}
