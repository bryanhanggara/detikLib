<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CategorieController extends Controller
{
    public function index()
    {
    
        $userId = Auth::id();
        $categories = Categorie::where('user_id', $userId)->get();

        return view('pages.user.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.user.categories.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name_categorie' => 'required|unique:categories',
        ]);

        $user = Auth::user();

        $category = new Categorie();
        $category->user_id = $user->id;
        $category->name_categorie = $request->name_categorie;
        $category->save();

        Alert::success('Success', 'Category added successfully');
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Categorie::findorFail($id);
        return view('pages.user.categories.edit', compact('category'));
    }

    public function update(Request $request, $id) 
    {
        $request->validate([
            'name_categorie' => 'required|unique:categories',
        ]);

        $user = Auth::user();

        $category = Categorie::findOrFail($id);
        $category->user_id = $user->id;
        $category->name_categorie = $request->name_categorie;
        $category->save();

        Alert::success('Success', 'Category updated successfully');
        return redirect()->route('categories.index');
    }

    public function destroy($id)
    {   
        $category = Categorie::findorfail($id);
        $category->delete();

        Alert::success('Success', 'Category deleted');
        return redirect()->route('categories.index');
    }
    
}
