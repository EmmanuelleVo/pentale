<?php

namespace App\Http\Livewire\Book;

use Livewire\Component;

class ToggleButton extends Component
{
    public $mature = false;

    function change($value) {
        $this->mature = !$value;
    }

    public function render()
    {
        return view('livewire.book.toggle-button');
    }
}
