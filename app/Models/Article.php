<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        "title",
        "slug",
        "content",
        "user_id",
        "posted_at"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
