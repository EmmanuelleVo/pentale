<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Chapter extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['book'];
    protected array $dates = ['published_at', 'updated_at'];

    protected $dispatchesEvents = [
        'retrieved' => LogUserReading::class,
    ];

    public function incrementViewsCount() {
        $this->views++;
        return $this->save();
    }

    public function latestChapters()
    {
        return $this->hasOne(Chapter::class)->latest()->limit(2);
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

}

class LogUserReading
{
    public function handle(Chapter $chapter)
    {
        ReadingLog::create(auth()->user(), $chapter->id, $chapter->book->id);
    }
}
