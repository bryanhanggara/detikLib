<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class ListController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $books = Book::with('category')->get();
        return view('pages.user.list', compact('books', 'categories'));
    }

    public function edit($id){
        $book = Book::with('category')->findOrFail($id);
        $categories = Categorie::all();

        if(Auth::user()->id == $book->user_id){
            return view('pages.user.books.edit', compact('book', 'categories'));
        }else {
            return redirect()->route('list.index')->with('error', 'Anda tidak memiliki izin untuk menghapus buku ini.');
        }
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);

        // Cek apakah pengguna adalah ADMIN atau pemilik buku
        if (Auth::user()->role == 'ADMIN' || Auth::user()->id == $book->user_id) {
            $book->delete();
            return redirect()->route('list.index')->with('success', 'Buku berhasil dihapus.');
        } else {
            return redirect()->route('list.index')->with('error', 'Anda tidak memiliki izin untuk menghapus buku ini.');
        }
    }

    public function exportToPdf()
    {
        $books = Book::all();
        $pdf = Pdf::loadView('pdf.list', ['books' => $books]);
        return $pdf->download('books-list.pdf');
    }
}
