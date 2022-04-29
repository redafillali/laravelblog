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

    /**
     * Show the form for editing the specified user.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $pageTitle = __('Edit user'); // Set page title 
        $types = Type::all(); // Get all types
        $user = User::find($id)->first(); // Get user by id
        return view('back.pages.users.edit', compact('pageTitle', 'user', 'types')); // Return view with data
    }
}
