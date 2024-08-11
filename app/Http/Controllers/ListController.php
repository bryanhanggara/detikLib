<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $books = Book::with('category')->get();
        return view('pages.user.list', compact('books', 'categories'));
    }
}
