<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource. (GET /author) - AuthorController@index
     * @return \Illuminate\Http\Response
     **/
    
    public function index(Request $request) {
        return view('back.pages.home');
     }
}
