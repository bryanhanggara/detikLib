<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;
use App\Models\Categorie;

class BookFilter extends Component
{
    public $search = '';
    public $category = '';

    public function render()
    {
        $categories = Categorie::all();
        $books = Book::query()
            ->when($this->category, function($query){
                $query->where('category_id', $this->category);
            })
            ->when($this->search, function($query){
                $query->where('book_title','like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.book-filter', [
            'categories' => $categories,
            'books' => $books,
        ]);
    }
}
