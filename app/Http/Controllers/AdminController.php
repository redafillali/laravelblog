<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource. (GET /author) - AuthorController@index
     * @return \Illuminate\Http\Response
     **/
    
    public function index(Request $request) {
        $pageTitle = 'Dashboard';
        $user = Auth::user();
        return view('back.pages.home', compact('pageTitle', 'user'));
    }

    /**
      * logout (GET /admin/logout) - AdminController@logout
      * @return \Illuminate\Http\Response - redirect to login page
    **/
    public function logout() {
        Auth::guard('web')->logout();
        return redirect()->route('admin.login');
    }
}
