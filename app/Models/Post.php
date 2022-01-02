<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['user', 'categories'];

    public function getUpdatedAtAttribute($value)
    {
        $updateAt = Carbon::create($value);
        return $updateAt->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, array $filter)
    {
        if(isset($filter['search'])) {
            $query->where('title', 'like', "%{$filter['search']}%");
        }

        if(isset($filter['category'])) {
            $query->whereHas('categories', function($query) use ($filter) {
                $query->where('slug_category', $filter['category']);
            });
        }
    }
}
