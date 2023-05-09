<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Characters extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $with = ['book'];

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class);
    }
}
