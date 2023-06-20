<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Maize\Markable\Markable;
use Maize\Markable\Models\Bookmark;

class Book extends Model
{
    use HasFactory, Markable, SoftDeletes, Searchable;

    protected $guarded = [];
    //protected $with = ['genres', 'chapters'];
    protected $withCount = ['chapters'];
    protected array $dates = ['published_at'];

    protected static $marks = [
        Bookmark::class,
    ];

    public function lastReadChapter(): BelongsToMany
    {
        return $this->belongsToMany(Chapter::class, 'reading_logs')
            ->wherePivotNotNull('chapter_id')
            ->orderByDesc('reading_logs.created_at')
            ->limit(1);
    }

    /*public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'reading_logs')
            ->withPivot('chapter_id')
            ->withTimestamps();
    }*/

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    public function chapters(): HasMany
    {
        return $this->hasMany(Chapter::class);
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Characters::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function searchableAs(): string
    {
        return 'posts_index';
    }

    public function toSearchableArray()
    {
        /*$author = $this->user()->first()->username;
        $book = $this->has('chapters')
                ->where('id', '=', $this->id)
                ->get(['cover', 'title', 'slug'])
                ->first()
                ;//->toArray();

        $book['user'] = $author;

        return $book;*/
        return [
            'cover' => $this->cover,
            'title' => $this->title,
            'slug' => $this->slug,
            'author' => $this->user->username,
        ];
    }

    protected function makeAllSearchableUsing($query)
    {
        return $query->with('user');
    }

    /**
     * Perform a search against the model's indexed data.
     *
     * @param  string  $query
     * @param  \Closure  $callback
     * @return \Laravel\Scout\Builder
     */
    /*public static function search($query = '', $callback = null)
    {
        return static::parentSearch($query, $callback)->query(function ($builder) {
            $builder->join('users', 'books.user_id', '=', 'users.id');
        });
    }*/

    public function scopeFilter($query, array $filters)
    {
        /*$query->when($filters['search-term'] ?? false, fn($query, $search) => $query->where(fn($query)
        => $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%'))
        //->orWhere('excerpt', 'like', '%' . $search . '%')
        );*/
        //dd($filters);
        $query->when($filters['genres'] ?? false, fn($query, $category) => $query->whereHas('genres', fn($query) // posts whereHas (relation category)
        => $query->where('slug', $category))
        );
    }

    public function filterByGenres($query, array $genres)
    {

        // Query books based on selected genres
        $books = Book::whereHas('genres', function ($query) use ($genres) {
            $query->whereIn('id', $genres);
        })->get();

        // Return the filtered books to the view or API response
        return $books;
    }
}
