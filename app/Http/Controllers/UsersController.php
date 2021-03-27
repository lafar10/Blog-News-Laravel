<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->paginate(5);
        return view('admin.admin_users', compact('users'));
    }
}
