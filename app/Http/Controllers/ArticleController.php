<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    private const ARTICLE_VALIDATOR = [
        'title' => 'required|max:150',
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

        if($path = $request->file('photo')){
            $path = $path->store('uploads', 'public');
        }else{
            $path = 'default.jpeg';
        }

        Auth::user()->articles()->create([
            'title' => $validated['title'],
            'text' => $validated['text'],
            'photo_path' => $path
        ]);

        return redirect()->route('home');
    }

    public function update(Request $request, Article $id)
    {
        $validated = $request->validate(self::ARTICLE_VALIDATOR, self::ARTICLE_ERROR_MESSAGE);

        if($path = $request->file('photo')){
            if($id->photo_path != 'default.jpeg'){
                $full_path = public_path('storage/' . $id->photo_path);
                unlink($full_path);
            }
            $path = $path->store('uploads', 'public');
        }else{
            $path = $id->photo_path;
        }

        $id->fill([
            'title' => $validated['title'],
            'text' => $validated['text'],
            'photo_path' => $path,
        ]);
        $id->save();
        return redirect()->route('home');
    }

    public function delete(Article $id)
    {
        $photo_full_path = public_path('storage/' . $id->photo_path);
        $photo = explode('/', $photo_full_path);
        $photo = $photo[count($photo) - 1];

        if(file_exists($photo_full_path)){
            if($photo != 'default.jpeg'){
                unlink($photo_full_path);
            }
        }

        $id->delete();
        return redirect()->route('home');
    }
}
