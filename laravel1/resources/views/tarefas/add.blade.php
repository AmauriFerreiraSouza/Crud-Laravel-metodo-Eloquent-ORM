@extends('layouts.admin')

@section('title', 'Adicionar de Tarefas')

@section('content')
    <h2>ADICIONAR TAREFAS</h2>
    @if(session('warning'))<!--verifico se existe minha sessão warning-->
        @alert
            {{session('warning')}}<!--existindo uso meu component alert para trazer a mensagem-->
        @endalert
    @endif
    <form method="post">
        @csrf
        <label>
            <input type="text" name="titulo">
        </label>

        <input type="submit" value="ADICIONAR">
    </form>
@endsection