@extends('layout.app')

@section('title', 'Novo Usuário')

@section('content')
<h3>Novo Usuário</h3>
@if ($errors->any())
<ul class="errors">
  @foreach ($errors->all(); as $error)
      <li class="error"> {{ $error }}</li>
  @endforeach
</ul>
    
@endif


<form action="{{ route('users.store') }}" method="post">
    @csrf
  <input type="text" name="name" placeholder="Usuário:" value="{{ old('name') }}">
  <input type="email" name="email" placeholder="Email:" value="{{ old('email') }}">
  <input type="password" name="password" placeholder="Senha:">

  <button type="submit">
      Enviar
  </button>
</form>

@endsection

