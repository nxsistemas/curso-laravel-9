@extends('layout.app')

@section('title', 'Novo Usuário')

@section('content')
<h3>Novo Usuário</h3>


<form action="{{ route('users.store') }}" method="post">
    @csrf
  <input type="text" name="name" placeholder="Usuário:">
  <input type="email" name="email" placeholder="Email:">
  <input type="password" name="password" placeholder="Senha:">

  <button type="submit">
      Enviar
  </button>
</form>

@endsection

