@extends('layouts.admin')

@section('title', 'Editar Tarefas')

@section('content')
    <h2>EDITAR TAREFAS</h2>

    @if(session('warning'))<!--verifico se existe minha sessão warning-->
        @alert
            {{session('warning')}}<!--existindo uso meu component alert para trazer a mensagem-->
        @endalert
    @endif
    <form method="post">
        @csrf
        <label>
            <input type="text" name="titulo" value="{{$data->titulo}}">
        </label>

        <input type="submit" value="SALVAR">
    </form>
@endsection