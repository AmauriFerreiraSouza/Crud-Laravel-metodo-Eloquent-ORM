@extends('layouts.admin')

@section('title', 'Lista de Tarefas')

@section('content')
    <style>
        td, a {text-align: center; text-decoration: none;}
        table{margin-top: 1%;}
    </style>
    <h2>LISTA DE TAREFAS</h2>

    <a href="{{route('tarefas.add')}}">Adicionar Nova Tarefa</a>

    <table border="1px;", width="50%;"><!--crio minha tabela-->
        <tr>
            <th>TAREFAS</th>
            <th>RESOLVIDO</th>
            <th>AÇÕES</th>
        </tr>
        @if(count($list) > 0)<!--verifico se o count da minha lista é maior que 0-->
            @foreach($list as $item)<!--se for percorro minha lista-->
                <tr>
                    <td>{{$item->titulo}}</td><!--pego o valor do meu titulo-->
                    <td><a href="{{route('tarefas.done',['id'=>$item->id])}}"><!--verifico a rota e pego os valores do campo resolvido--> 
                        @if($item->resolvido === 1) 
                            Marcar 
                        @else 
                            Desmarcar 
                        @endif</a>
                    </td>
                    <td>
                        <!--pego a rota e os id dos meus campo editar e excluir-->
                        <a href="{{route('tarefas.edit',['id'=>$item->id])}}">EDITAR</a> 
                        - 
                        <a href="{{route('tarefas.del',['id'=>$item->id])}}" onclick=" return confirm('Tem certeza que deseja excluir?')">EXCLUIR</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </table>
@endsection