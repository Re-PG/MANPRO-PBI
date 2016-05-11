<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProgramController extends Controller
{
  public function show($id)
  {
    $prog = Program::findOrFail($id);
    return view('dynamic.program')->with('pub', $prog);
  }
}
