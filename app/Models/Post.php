<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $appends = ['preview_body'];

    protected $fillable = [
        'title',
        'slug',
        'body',
        'status',
    ];

    public function scopeOption()
    {
        return [
            'published' => ['published'],
            'draft' => ['draft'],
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPreviewBodyAttribute()
    {
        return Str::words($this->body, 5, ' >>>');
    }
}
