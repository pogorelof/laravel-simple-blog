<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    protected $fillable = ['title', 'text', 'photo_path'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
