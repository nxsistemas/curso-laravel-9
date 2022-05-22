<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
   public function index(Request $request)
   {
      // 1a maneiro de passar um filtro
      // $users = User::where('name', 'LIKE', "%{$request->search}%")->get();

      // 2a maneira de passar um filtro
      $search = $request->search;
      $users = User::where(function ($query) use ($search) {
        if($search) {
          $query->where('email', $search);
          $query->orwhere('name', 'LIKE', "%{$search}%");
        }     
      })->get();

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

   public function store(StoreUpdateUserFormRequest $request)
   {
  
    $data = $request->all();
    $data['password'] = bcrypt($request->password);

    $users = User::create($data); 
    
   //  return redirect()->route('users.show');
    return redirect()->route('users.index');
    

   // 1a forma de salvar o usuario
   //   $users = new User;
   //   $users->name = $request->name;
   //   $users->email = $request->email;
   //   $users->password = $request->password;
   //   $users->save();
   }

   public function edit($id) 
   {
     if(!$users = User::find($id))
     return redirect()->route('users.index');
    

     if(!$users = User::find($id))
     return redirect()->route('users.index');

    return view('users.edit', compact('users'));
    
   //   return view('users.update', compact('users'));
   }

   public function update(StoreUpdateUserFormRequest $request, $id) 
   {
     if(!$users = User::find($id))
     return redirect()->route('users.index');
    
     $data = $request->only('name', 'email');
     if($request->password)
        $data['password'] = bcrypt($request->password);   
      
        $users->update($data);   

        return redirect()->route('users.index');
   }
}
