<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['user'];

    public function getUpdatedAtAttribute($value)
    {
        $updateAt = Carbon::create($value);
        return $updateAt->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
