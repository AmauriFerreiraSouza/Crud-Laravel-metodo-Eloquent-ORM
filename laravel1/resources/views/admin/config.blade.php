@extends('layouts.admin')

@section('title', 'Configurações')

@section('content')
    <h2>Configurações</h2>

    Meu nome é {{$name}} e tenho {{$age}} anos.<br/>
    <!---chamo aqui minha variável global 'VERSAO' vindo da minha Providers AppServiceProvider.php--->
    {{-- Versão: {{$versao}} --}}

    <!--///////////////////////////// condicionais //////////////////////////////-->
    <!--verifico a idade-->    
    {{-- @if($age > 18 && $age <= 60)
        Eu sou um Adulto
    @elseif($age > 60 && $age <= 120)     
        Eu sou um Idoso
    @else
        Eu sou de Menor
    @endif --}}
    <br>
    <!--verifico se foi setado a versão-->
    {{-- @isset($versao)
        Sim existe uma versão: {{$versao}}
    @endisset
    <br> --}}
    <!--verifico se esta vazio o campo cidade-->
    {{-- @empty($city)
        Não existe um Cidade
    @endempty --}}
    <!--/////////////////////////////////////////////////////////////////////////////-->
    
    <!---///////////////////////////////// LOOP ////////////////////////////////////--->
    <!--crio um loop com for-->
    {{-- @for($q=1;$q<=10;$q++)    
        .{{$q}}<br/>
    @endfor     --}}
    <!--uso um foreach para listar-->
    {{-- RECITA DE BOLO: --}}
    <br/>
    <!--faço uma verificação se o count da minha lista é maior que zero-->    
    {{-- @if(count($list) > 0)    
        @foreach ($list as $item)
            <ul>
                <li>{{$item}}</li>
            </ul>
        @endforeach    
    @else
        Não à ingredientes
        <br/>
    @endif --}}
    
    <!--com forelse se verifica seu array esta ou não vazio-->
    {{-- @forelse ($list as $item)
        <ul>
        <li>{{$item}} - {{$item}}</li>
        </ul>
    @empty
        Não à ingredientes
        <br/>
    @endforelse --}}
   
    <!--forelse com uma lista com array dentro de array-->
    {{-- @forelse ($list as $item)
        <ul>
        <li>{{$item['nome']}} - {{$item['qtd']}}</li><!--passo a index do meu array-->
        </ul>
    @empty
        Não à ingredientes
        <br/>
    @endforelse --}}

    <!--//////////////////////////////////////////////////////////////////////////////-->

        {{-- @component('alert')
            @slot('type')
                Aviso
            @endslot
            Testando 1,2,3...
        @endcomponent --}}

        @alert
            Testando novamente
        @endalert


    <br/>
    <form method="POST">
    @csrf

    NOME:<br/>
    <input type="text" name="name"><br/><br/>

    Idade:<br/>
    <input type="text" name="age"><br/><br/>

    Cidade:<br/>
    <input type="text" name="city"><br/><br/>

    <!-- Estado:<br/>
    <input type="text" name="state"><br/><br/> -->

    <input type="submit" value="Enviar">
    </form>

    <a href="config/permissoes">permissões</a>
@endsection