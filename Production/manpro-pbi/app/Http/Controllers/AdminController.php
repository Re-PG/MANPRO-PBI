<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      return view('admin.article');
    }

    public function create(){
      return view('admin.createPublication');
    }

    public function publicationView()
    {

    }
}
