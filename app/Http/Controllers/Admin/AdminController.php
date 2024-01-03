<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.panel');
    }

    //Control users
    public function user_list()
    {
        $context = ['users' => User::where('id', '!=', Auth::user()->id)->get()];
        return view('admin.user_list', $context);
    }
    public function search_one_user(Request $request)
    {
        $context = ['users' => User::where('name', $request->search)->get()];
        return view('admin.user_list', $context);
    }
    public function update_password(Request $request, User $id)
    {
        $id->password = $request->newpass;
        $id->save();
        return redirect()->route('admin.users');
    }
    public function delete_user(User $id)
    {
        $id->delete();
        return redirect()->route('admin.users');
    }
    public function delete_several_users(Request $request)
    {
        $users = [];
        foreach ($request->all() as $user_id => $v){
            if($user_id == '_token'){//because first on request array is _token
                continue;
            }
            $users[] = $user_id;
        }
        foreach ($users as $user_id){
            $user = User::where('id', $user_id)->get()[0];
            $this->delete_user($user);
        }
        return redirect()->route('admin.users');
    }

    //Control article
    public function article_list()
    {
        $context = ['articles' => Article::latest()->get()];
        return view('admin.article_list', $context);
    }
    public function article_delete(Article $id)
    {
        $id->delete();
        return redirect()->route('admin.articles');
    }

    public function article_text_update(Request $request, Article $id)
    {
        $id->text = $request->text;
        $id->save();
        return redirect()->route('admin.articles');
    }
    public function article_title_update(Request $request, Article $id)
    {
        $id->title = $request->title;
        $id->save();
        return redirect()->route('admin.articles');
    }
    public function delete_several_article(Request $request)
    {
        $article = [];
        foreach ($request->all() as $article_id => $v){
            if($article_id == '_token'){//because first on request array is _token
                continue;
            }
            $article[] = $article_id;
        }
        foreach ($article as $article_id){
            $article = Article::where('id', $article_id)->get()[0];
            $this->article_delete($article);
        }
        return redirect()->route('admin.articles');
    }
}
