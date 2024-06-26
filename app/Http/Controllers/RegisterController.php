<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
      return view("regist.register");
    }
    
    public function store(Request $request)  {
      $request->validate([
        "name" => "required|string|max:255",
        "email" => "required|string|email|max:255|unique:users",
        "password" => "required|string|confirmed|min:8"
      ]);

      $user = User::create([
        "name"=>$request->name,
        "email"=>$request->email,
        "password"=>$request->password,
      ]);

      return view("regist.complete", compact("user"));
    }
}
