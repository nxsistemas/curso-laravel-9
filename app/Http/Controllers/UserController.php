<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index()
   {
      $users = User::get();
      return view('users.index', compact('users'));
   }

   public function show($id)
   {
    // $users = User::where('id', $id)->first();
    //$users = User::find($id); 
    if(!$users = User::find($id))
    return redirect()->route('users.index');
    return view('users.show', compact('users'));
   }

   public function create()
   {
      return view('users.create');
   }

   public function store()
   {
      dd('cadastrando o usuário');
   }
}
