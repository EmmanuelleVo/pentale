<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\WithSorting;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use function PHPUnit\Framework\isEmpty;

class Book extends Component
{
    use WithPagination, WithSorting;

    public $filters = [
        'genres' => [],
    ];
    public $genreFilters = [];

    protected $queryString = [
        'filters' => ['except' => [
            'genres' => [], // Set the default value for the genres filter as an empty array
        ], 'as' => 'genres'], // Set the query parameter name as 'genres'
        'sortField' => ['except' => 1, 'as' => 'sort'],
    ];


    public function mount()
    {
        $this->sortOrder = 'ASC';
        $this->sortField = request()->query('sort');

        if (empty(request()->query()) === true) {
            return redirect()->to('/novels?sort=popular');
        }

        // $this->emit('urlChange', '/latest-releases?test');


    }

    public function updating($name, $value)
    {
        $this->emit('urlChanged', http_build_query([$name => $value]));
    }

    public function getResultsProperty()
    {
        // this is where we remove the categories with a false value
        $this->filters['genres'] = array_filter($this->filters['genres']);

        if ($this->sortField === 'popular') { // $book->chapters()->sum('views')
            $books = $this->sortNovelsByPopularity($this->filters['genres']);
        } elseif ($this->sortField === 'latest-releases') {
            $books = $this->sortNovelsByLatestReleases($this->filters['genres']);
        } elseif ($this->sortField === 'newest-novels') {
            $books = $this->sortNovelsByNewestNovels($this->filters['genres']);
        } elseif ($this->sortField === 'rating') {
            $books = $this->sortNovelsByRating($this->filters['genres']);
        }

        $books->loadSum('chapters', 'views')
            ->loadCount('chapters')
            ->loadAvg('reviews', 'overall');

        return $books;
    }


    public function render()
    {
        $books = $this->getResultsProperty();

        $genres = Genre::all();
        $status = ['all', 'ongoing', 'completed', 'hiatus'];


        return view('livewire.book', compact('books', 'genres', 'status'));
    }
}
