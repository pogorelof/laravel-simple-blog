<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    private const ARTICLE_VALIDATOR = [
        'title' => 'required|max:70',
        'text' => 'required|min:10'
    ];
    private const ARTICLE_ERROR_MESSAGE = [
        'title.required' => 'Введите заголовок!',
        'text.required' => 'Нужен контент!',
        'title.max' => 'Заголовок не должен превышать :max символов!',
        'text.min' => 'Текст должен иметь больше :min символов!'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $context = ['articles' =>  Article::latest()->get()];
        return view('index', $context);
    }

    public function submit(Request $request)
    {
        $validated = $request->validate(self::ARTICLE_VALIDATOR, self::ARTICLE_ERROR_MESSAGE);

        Auth::user()->articles()->create([
            'title' => $validated['title'],
            'text' => $validated['text']
        ]);

        return redirect()->route('home');
    }

    public function update(Request $request, Article $id)
    {
        $validated = $request->validate(self::ARTICLE_VALIDATOR, self::ARTICLE_ERROR_MESSAGE);

        $id->fill([
           'title' => $validated['title'],
           'text' => $validated['text']
        ]);
        $id->save();
        return redirect()->route('home');
    }

    public function delete(Article $id)
    {
        $id->delete();
        return redirect()->route('home');
    }
}
