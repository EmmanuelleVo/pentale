<?php

namespace App\Models;

use Maize\Markable\Mark;

class Bookmark extends Mark
{
    public static function markableRelationName(): string
    {
        return 'bookmarkers';
    }

    /**
     * The override is useless in this case, as I am returning the default
     * relation name which is the plural name of the mark class name (bookmarks, indeed)
     */
    public static function markRelationName(): string
    {
        return 'bookmarks';
    }
}
