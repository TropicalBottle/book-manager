<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class DeleteButton extends Component
{
    public $book;

    public function mount(Book $book) {
        $this->book = $book;
    }

    public function deleteBook() {
        $this->book->delete();
        return $this->redirect(route('my-books'));
    }

    public function render()
    {
        return view('livewire.delete-button');
    }
}
