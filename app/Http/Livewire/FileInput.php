<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileInput extends Component
{
    use WithFileUploads;

    public $photo;



    public function render()
    {
        return view('livewire.file-input');
    }
}
