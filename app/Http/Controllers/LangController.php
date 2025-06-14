<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function switch($lang)
    {
        Session::put('locale', $lang);
        App::setLocale($lang);
        return back();
    }
}
