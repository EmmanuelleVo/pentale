<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithSorting;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Book extends Component
{
    use WithPagination, WithSorting;

    public $filters = [
        'genres' => [],
    ];
    public $genreFilters = [];

    protected $queryString = [
        //'filters' => ['except' => '', 'as' => 'filters'],
        'filters' => ['except' => [
            'genres' => '',
        ]],
        //'filters.genres' => ['except' => '', 'compact' => ','],
        'sortField' => ['except' => 1, 'as' => 'sort'],
    ];


    public function mount()
    {
        $this->sortOrder = 'ASC';
        $this->sortField = request()->query('sort');

        $this->emit('urlChange', '/latest-releases?test');


    }

    public function updating($name, $value)
    {
        $this->emit('urlChanged', http_build_query([$name => $value]));
    }

    public function getResultsProperty()
    {
        // this is where we remove the categories with a false value
        $this->filters['genres'] = array_filter($this->filters['genres']);

        if (empty($this->filters['genres'])) {
            if ($this->sortField === 'popular') { // $book->chapters()->sum('views')
                $books = $this->sortNovelsByPopularity($this->filters['genres']);
            } elseif ($this->sortField === 'latest-releases') {
                $books = $this->sortNovelsByLatestReleases($this->filters['genres']);
            } elseif ($this->sortField === 'newest-novels') {
                $books = $this->sortNovelsByNewestNovels();
            } elseif ($this->sortField === 'rating') {
                $books = $this->sortNovelsByRating();
            }

            return $books;
        }

        if ($this->sortField === 'popular') { // $book->chapters()->sum('views')
            $books = $this->sortNovelsByPopularity($this->filters['genres']);
            /*$books = \App\Models\Book::query()
                ->select('books.title', 'chapters.views')
                ->join('chapters', "books.id", "=", "chapters.book_id")
                //->groupBy("books.id")
                ->orderByRaw('SUM(chapters.views) DESC')
                ->paginate(20);*/
            /* $books = \App\Models\Book::query() //::filter($filters)
             ->join("chapters", function ($join) {
                 $join->on("chapters.book_id", "=", "books.id");
             })
             ->orderBy('chapters.views', 'DESC')
             ->paginate(20);*/
        } elseif ($this->sortField === 'latest-releases') {
            $books = $this->sortNovelsByLatestReleases($this->filters['genres']);
        } elseif ($this->sortField === 'newest-novels') {
            $books = $this->sortNovelsByNewestNovels();
        } elseif ($this->sortField === 'rating') {
            $books = $this->sortNovelsByRating();
        }

        return $books;
    }


    public function render()
    {
        //dd($this->sortField, $this->sortOrder);
        /*
         Course::when(count(array_filter($this->courseLevels)), function ($query) {
            return $query->whereIn('level', $this->courseLevels);
        })
        ->paginate(10)
         */

        $books = $this->getResultsProperty();


        $genres = Genre::all();
        $status = ['all', 'ongoing', 'completed', 'hiatus'];


        return view('livewire.book', compact('books', 'genres', 'status'));
    }
}
