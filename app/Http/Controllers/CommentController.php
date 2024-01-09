<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function getByArticle(Article $article)
    {
        return Comment::latest()->where('article_id', $article->id)->get();
    }

    public function submit(Request $request, Article $article)
    {
        Comment::create([
            'text' => $request->text,
            'user_id' => Auth::user()->id,
            'article_id' => $article->id,
        ]);
        return back();
    }

    public function delete(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
