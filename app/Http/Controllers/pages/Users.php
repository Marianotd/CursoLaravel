<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class Users extends Controller
{
  public function index()
  {
    $users = User::all();

    return view('content.pages.users', ['users' => $users]);
  }
}
