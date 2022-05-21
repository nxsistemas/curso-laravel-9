@extends('layout.app')

@section('title', 'Listagem do Usuário')

@section('content')
<h3>Listagem do Usuário - {{ $users->name }}</h3>

<ul>
    <li>{{ $users->name }}</li> 
    <li>{{ $users->email }}</li> 
</ul>    
@endsection

