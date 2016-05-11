<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Application;
use App\Http\Requests;
use Illuminate\Support\Facades\Route;

class LanguageController extends Controller
{
    // public function __construct(Application $app) {
    //   $this->app = $app;
    // }

    public function switchLanguage($lang, Request $request)
    {
        // //$currentPathName = $request->route->getCurrentRoute()->getActionName();
        //
        // $this->app->setLocale($lang);
        // return redirect()->back();
    }
}
