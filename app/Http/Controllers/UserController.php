<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function allData(){
        $users = User::get();
        return view('control-panel', ['data' => $users]);
    }
}
