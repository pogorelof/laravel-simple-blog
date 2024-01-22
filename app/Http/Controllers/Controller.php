<?php

namespace App\Http\Controllers;

//use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function change_language(Request $request)
    {
        if(app()->currentLocale() == 'en'){
            $request->session()->put('locale', 'ru');
        }else{
            $request->session()->put('locale', 'en');
        }

        return back();
    }
}
