@extends('layout.app')

@section('title', "Editando Usuário { $users->name }")

@section('content')
<h3>Editando Usuário {{ $users->name }}</h3>
@if ($errors->any())
<ul class="errors">
  @foreach ($errors->all(); as $error)
      <li class="error"> {{ $error }}</li>
  @endforeach
</ul>
    
@endif


<form action="{{ route('users.update', $users->id) }}" method="post">
    @method('PUT')
    @csrf
  <input type="text" name="name" placeholder="Usuário:" value="{{ $users->name }}">
  <input type="email" name="email" placeholder="Email:" value="{{ $users->email }}">
  <input type="password" name="password" placeholder="Senha:">

  <button type="submit">
      Enviar
  </button>
</form>

@endsection