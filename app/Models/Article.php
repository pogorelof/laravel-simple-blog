<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    protected $fillable = ['title', 'text'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
