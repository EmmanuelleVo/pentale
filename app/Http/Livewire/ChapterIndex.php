<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class ChapterIndex extends Component
{
    //use WithPagination;
    protected $chapters;

    public function mount($chapters)
    {
        $this->chapters = $chapters;
    }

    public function render()
    {
        return view('livewire.chapter-index');
    }
}
