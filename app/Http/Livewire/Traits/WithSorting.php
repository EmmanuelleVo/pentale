<?php

namespace App\Http\Livewire\Traits;

trait WithSorting
{
    public $sortField;
    public $sortOrder;

    public function sortBy($sortField, $sortOrder) {
        $this->sortField = $sortField;
        $this->sortOrder = $sortOrder;
    }

    public function sortByField($sortField) {
        $this->sortField = $sortField;
    }
}
