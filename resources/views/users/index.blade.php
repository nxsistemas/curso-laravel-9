@extends('layout.app')

@section('title', 'Listagem dos Usuários')
    
@section('content')
<h3>
    Listagem dos Usuários
    (<a href="{{ route('users.create') }}">+</a>)
</h3>
    <h3>
        <ul>
            
         @foreach ($users as $user)
            <li>
                {{$user->name}} -
                {{$user->email}}   
                | <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
            </li>    
         @endforeach
            
        </ul>
        
    </h3>
</body>
</html>
    
@endsection