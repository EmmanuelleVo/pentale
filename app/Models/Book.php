<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Maize\Markable\Markable;
use Maize\Markable\Models\Bookmark;

class Book extends Model
{
    use HasFactory, Markable;

    protected $guarded = [];
    //protected $with = ['genres', 'tags'];
    protected array $dates = ['published_at'];

    protected static $marks = [
        Bookmark::class,
    ];

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

    /*public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search-term'] ?? false, fn($query, $search) => $query->where(fn($query)
        => $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%'))
        //->orWhere('excerpt', 'like', '%' . $search . '%')
        );

        $query->when($filters['filter'] ?? false, fn($query, $category) => $query->whereHas('tags', fn($query) // posts whereHas (relation category)
        => $query->where('slug', $category))
        );
    }

    public function scopeFilter($query, string $filter)
    {
        if ($filter !== '') {
            $course = Course::where('slug', $filter)->first();
            $course_id = $course->id;
        }

        $query->when($filter ?? false, fn($query)
        => $query->whereHas('courses', fn ($query)
        => $query->where('course_teacher.course_id', $course_id)));
    }*/
}
