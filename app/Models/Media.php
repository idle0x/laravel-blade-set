<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Media extends Model
{
    use HasFactory;

    protected $table = "media";

    protected $fillable = [
        'collection_name'
    ];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }
}
