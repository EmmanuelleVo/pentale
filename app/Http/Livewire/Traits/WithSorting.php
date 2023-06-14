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

        $books = Book::query()
            ->select('books.*', DB::raw('count(chapters.book_id)'), DB::raw('sum(chapters.views)'))
            ->has('chapters')
            ->join('chapters', 'books.id', '=', 'chapters.book_id')
            ->groupBy('books.id')
            ->orderByRaw("sum(chapters.views) DESC")
            ->when($genres ?? false, fn($query, $genres) => $query->whereHas('genres', fn($query) =>
                $query->where('genres.slug', array_keys($genres)),
            ))
            ->paginate(20)->withQueryString();

/*
 ->when($genres ?? false, function($query) use ($genres) {
                    $query->whereHas('genres', fn($query) =>
                 $query->whereIn('genres.slug', array_keys($genres)));
//->join('book_genre', 'book_genre.book_id', '=', 'books.id')
            //->join('genres', 'genres.id', '=', 'book_genre.genre_id')
            //->whereIn('genre_id', array_keys($genres))
 */

        return $books;
    }

    public function sortNovelsByRating() {
        $books = \App\Models\Book::query()
            ->select('books.*', DB::raw('avg(reviews.overall)'))
            ->has('chapters')
            ->join('reviews', 'books.id', '=', 'reviews.book_id')
            ->groupBy('books.id')
            ->orderByRaw("avg(reviews.overall) DESC")
            //->orderBy('chapters.published_at', $this->sortOrder)
            ->paginate(20)->withQueryString();

        return $books;
    }

    public function sortNovelsByLatestReleases($genres) {
        $books = \App\Models\Book::query() //::filter($filters)
        ->select('books.*')
            ->has('chapters')
            ->join('chapters', 'books.id', '=', 'chapters.book_id')
            ->join('book_genre', 'book_genre.book_id', '=', 'books.id')
            ->join('genres', 'genres.id', '=', 'book_genre.genre_id')
            //->whereIn('genre_id', array_keys($genres))
            ->latest('chapters.published_at')
            //->orderBy('chapters.published_at', $this->sortOrder)
            ->paginate(20)->withQueryString();

        return $books;
    }

    public function sortNovelsByNewestNovels() {
        $books = \App\Models\Book::query()
            ->has('chapters')
            ->select('books.*')
            //->join('chapters', 'books.id', '=', 'chapters.book_id')
            ->latest('books.published_at')
            //->orderBy('chapters.published_at', $this->sortOrder)
            ->paginate(20)->withQueryString();

        return $books;
    }
}
