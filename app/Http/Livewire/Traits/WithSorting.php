<?php

namespace App\Http\Livewire\Traits;

use App\Models\Book;
use Illuminate\Support\Facades\DB;

trait WithSorting
{
    public $sortField;
    public $sortOrder;

    public function sortBy($sortField, $sortOrder = 'DESC') {
        $this->sortField = $sortField;
        $this->sortOrder = $sortOrder;
    }

    public function sortByField($sortField) {
        $this->sortField = $sortField;
    }

    public function sortNovelsByPopularity($genres) {

        /*$books = Book::query()
            ->select('books.*', DB::raw('count(chapters.book_id)'), DB::raw('sum(chapters.views)'))
            ->has('chapters')
            ->join('chapters', 'books.id', '=', 'chapters.book_id')
            ->groupBy('books.id')
            ->orderByRaw("sum(chapters.views) DESC")
            ->when(count($genres), function ($query) use ($genres) {
                $query->where(function ($subQuery) use ($genres) {
                    foreach (array_keys($genres) as $genre) {
                        $subQuery->orWhereHas('genres', function ($subSubQuery) use ($genre) {
                            $subSubQuery->where('name', $genre);
                        });
                    }
                });
            })
            ->paginate(20)->withQueryString();*/

        $books = Book::with(['chapters', 'reviews'])
            ->select('books.*')
            ->has('chapters')
            ->join('chapters', 'books.id', '=', 'chapters.book_id')
            ->where('chapters.published_at', '<=', now())
            ->when(count($genres), function ($query) use ($genres) {
                $query->whereHas('genres', function ($subQuery) use ($genres) {
                    $subQuery->whereIn('slug', array_keys($genres));
                }, '=', count($genres));
            })
            ->groupBy('books.id')
            //->orderByRaw('MAX(chapters.published_at) DESC')
            ->orderByRaw('(SELECT SUM(views) FROM chapters WHERE chapters.book_id = books.id) DESC')
            ->paginate(20)
            ->withQueryString();

        return $books;
    }

    public function sortNovelsByRating($genres) {
        $books = Book::with(['chapters', 'reviews'])
            ->select('books.*', DB::raw('avg(reviews.overall)'))
            ->has('chapters')
            ->join('reviews', 'books.id', '=', 'reviews.book_id')
            ->when(count($genres), function ($query) use ($genres) {
                $query->whereHas('genres', function ($subQuery) use ($genres) {
                    $subQuery->whereIn('slug', array_keys($genres));
                }, '=', count($genres));
            })
            ->groupBy('books.id')
            ->orderByRaw("avg(reviews.overall) DESC")
            ->paginate(20)->withQueryString();

        return $books;
    }

    public function sortNovelsByLatestReleases($genres) {

        $books = Book::withCount('chapters')
            ->with(['chapters', 'reviews'])
            ->withAvg('reviews', 'overall')
            ->has('chapters')
            ->join(DB::raw('(SELECT MAX(published_at) AS latest_published_at, book_id, SUM(views) AS total_views FROM chapters GROUP BY book_id) AS latest_chapter'), function ($join) {
                $join->on('books.id', '=', 'latest_chapter.book_id');
            })
            ->when(count($genres), function ($query) use ($genres) {
                $query->whereHas('genres', function ($subQuery) use ($genres) {
                    $subQuery->whereIn('slug', array_keys($genres));
                }, '=', count($genres));
            })
            ->orderByDesc('latest_published_at')
            ->groupBy('books.id')
            ->paginate(20)->withQueryString();;

        return $books;
    }

    public function sortNovelsByNewestNovels($genres) {
        $books = Book::with(['chapters', 'reviews'])
            ->has('chapters')
            ->select('books.*')
            ->when(count($genres), function ($query) use ($genres) {
                $query->whereHas('genres', function ($subQuery) use ($genres) {
                    $subQuery->whereIn('slug', array_keys($genres));
                }, '=', count($genres));
            })
            ->latest('books.published_at')
            ->when($genres ?? false, fn($query, $genres) => $query->whereHas('genres', fn($query) =>
            $query->where('genres.slug', array_keys($genres)),
            ))
            ->paginate(20)->withQueryString();

        return $books;
    }
}
