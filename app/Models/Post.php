<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{HasMany, BelongsTo};


class Post extends Model
{
    use HasFactory;


    public function author(): BelongsTo
    {
        return $this->belongsTo(Writer::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }


    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }




}
