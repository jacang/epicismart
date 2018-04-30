<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;

class PagesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

      $user = User::first();
      //Auth::logout();
      return view('dashboard');
    }
}
