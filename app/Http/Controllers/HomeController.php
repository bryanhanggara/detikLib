<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalUserBooks = Book::where('user_id', $userId)->count();
        $totalUserCategories = Categorie::where('user_id', $userId)->count();

        $allBooks = Book::count();
        $allCategories = Categorie::count();
        return view('pages.dashboard', compact('allBooks', 'allCategories', 'totalUserBooks', 'totalUserCategories'));
    }
}
