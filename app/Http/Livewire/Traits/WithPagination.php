<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Pagination\Paginator;

trait WithPagination
{
    protected $currentPage = 1;

    public function pageName()
    {
        return property_exists($this, 'pageName') ? $this->pageName : 'page';
    }

    public function getPageProperty()
    {
        return $this->currentPage;
    }

    /*public function getUpdatesQueryString()
    {
        return array_merge([$this->pageName() => ['except' => 1]], $this->updatesQueryString);
    }*/

    public function initializeWithPagination()
    {
        $this->currentPage = $this->resolvePage();

        Paginator::currentPageResolver(function () {
            return $this->currentPage;
        });

        Paginator::defaultView($this->paginationView());
    }

    public function paginationView()
    {
        return 'livewire::pagination-links';
    }

    public function previousPage()
    {
        $this->currentPage = $this->currentPage - 1;
    }

    public function nextPage()
    {
        $this->currentPage = $this->currentPage + 1;
    }

    public function gotoPage($page)
    {
        $this->currentPage = $page;
    }

    public function resetPage()
    {
        $this->currentPage = 1;
    }

    public function resolvePage()
    {
        return request()->query($this->pageName(), $this->currentPage);
    }

    /*public function getPublicPropertiesDefinedBySubClass()
    {
        return tap(parent::getPublicPropertiesDefinedBySubClass(), function (&$props) {
            $props[$this->pageName()] = $this->currentPage;
        });
    }*/
}
