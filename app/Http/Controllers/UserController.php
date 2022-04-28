<?php

namespace App\Http\Controllers;

use \App\Models\User;
use \App\Models\Type;

class UserController extends Controller
{
    

    /**
     * Display a listing of all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageTitle = __('All users'); // Set page title 
        $users = User::all(); // Get all users
        return view('back.pages.users.index', compact('pageTitle', 'users')); // Return view with data
    }
}
