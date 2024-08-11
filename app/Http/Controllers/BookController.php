<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BookController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $books = Book::with('category')
                ->where('user_id', $userId)
                ->get();

        return view('pages.user.books.index', compact('books'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('pages.user.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'book_title' => 'required',
            'description' => 'required',
            'stok' => 'required',
            'file_book' => 'required|mimes:pdf|max:10000',
            'book_cover' => 'required|mimes:jpg,jpeg,png|max:3000'
        ]);

        $user = Auth::user();

        $book = new Book();
        $book->user_id = $user->id;
        $book->category_id = $request->category_id;
        $book->book_title = $request->book_title;
        $book->description = $request->description;
        $book->stok = $request->stok;
        $book['file_book'] = $request->file('file_book')
                            ->store('file_book','public');
        $book['book_cover'] = $request->file('book_cover')
                            ->store('book_cover','public');
        $book->save();

        Alert::success('Success', 'Book added successfully');
        return redirect()->route('books.index');
    }

    public function show($id)
    {
        $book = Book::with('category','user')->findorfail($id);
        return view('pages.user.books.show', compact('book'));
    }

    public function edit($id)
    {
        $book = Book::with('category')->findOrFail($id);
        $categories = Categorie::all();
        return view('pages.user.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'book_title' => 'required',
            'description' => 'required',
            'stok' => 'required',
            'file_book' => 'mimes:pdf|max:10000',
            'book_cover' => 'mimes:jpg,jpeg,png|max:3000'
        ]);

        $user = Auth::user();

        $book = Book::findorFail($id);
        $book->user_id = $user->id;
        $book->category_id = $request->category_id;
        $book->book_title = $request->book_title;
        $book->description = $request->description;
        $book->stok = $request->stok;
        if ($request->hasFile('file_book')) {
            // Jika ada, simpan gambar baru
            $data['file_book'] = $request->file('file_book')->store('file_book', 'public');
        }

        if ($request->hasFile('book_cover')) {
            // Jika ada, simpan gambar baru
            $data['book_cover'] = $request->file('book_cover')->store('book_cover', 'public');
        }

        $book->save();

        Alert::success('Success', 'Book updated successfully');
        return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        $book = Book::findorfail($id);
        $book->delete();
        
        Alert::success('Success', 'Book deleted');
        return redirect()->route('books.index');
    }
}
