@extends('layout.app')

@section('title', 'Listagem dos Usuários')
    
@section('content')
<h3>
    Listagem dos Usuários
    (<a href="{{ route('users.create') }}">+</a>)
</h3>
<form action="{{ route('users.index') }}" method="get">
    <input type="text" name="search" placeholder="Pesquisar:">
    <button>
       Pesquisar
    </button>

</form>
    <h3>
        <ul>
            
         @foreach ($users as $user)
            <li>
                {{$user->name}} -
                {{$user->email}}   
                | <a href="{{ route('users.edit', $user->id) }}">Editar</a>
                | <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
            </li>    
         @endforeach
            
        </ul>
        
    </h3>
</body>
</html>
    
@endsection