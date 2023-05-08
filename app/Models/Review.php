<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Maize\Markable\Markable;
use Maize\Markable\Models\Like;

class Review extends Model
{
    use HasFactory, Markable;

    protected $guarded = [];
    protected $with = ['user'];
    protected array $dates = ['published_at'];

    protected static $marks = [
        Like::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}
