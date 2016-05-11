<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\DataDosen;
use App\Publication;
use App\Program;
use Illuminate\Http\Request;
use View;
use Redirect;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $dataDosen = DataDosen::all();
      $publication = Publication::all()->take(6);
      $program = Program::all();

      // if(!isset($section)){
      //   $section = "#welcome";
      // }
      //return View::make('static.home')->withDosens($dataDosen)->with('scroll','$section');
      return view('Static.home')->with('Dosens',$dataDosen)->with('program', $program)->with('publikasi',$publication);
    }

    public function redirectLanguage($lang)
    {

    }

}
