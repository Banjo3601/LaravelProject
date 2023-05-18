<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ValidCategoryRequest;

class CategoryController extends Controller
{
    public function listCategories(){
        $categories = Category::all();
        return view('categoryList', compact('categories'));
    }
    public function showCategoryDetails($categoryId){
        $category = Category::findOrFail($categoryId);
        $books =  $category->books;

        return view('categoryDetails', compact('category', 'books'));
    }

    public function destroy(Category $category): RedirectResponse{
        $category->delete();
        return redirect()->Route('categorylist')->with('success_category', 'La catégorie a été supprimée avec succès !');
    }

    public function formulaireNewCategory(){
        return view('newCategory');
    }

    public function enregistrerCategory(ValidCategoryRequest $request): RedirectResponse{

        $category = new Category();
        $category->label = $request->input('label');

        $category->save();

        return redirect()->route('categorylist')->with('success_category', 'La catégorie a été ajoutée avec succès !');
    }

    public function validModifCategory(ValidCategoryRequest $request, $id): RedirectResponse{

        $category = Category::findOrFail($id);
        $category->label = $request->label;

        $category->save();

        return redirect()->route('categorylist')->with('success_category', 'La catégorie a été modifiée avec succès !');
    }

    public function formulaireModifCategory($categoryId){

        $category = Category::findOrFail($categoryId);
        return view('modifCategory', compact('category'));
    }
}
