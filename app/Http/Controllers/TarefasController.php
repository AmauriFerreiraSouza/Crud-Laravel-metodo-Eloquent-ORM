<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;

class TarefasController extends Controller
{
    public function list(){
        ////------Eloquent------////
        $list = Tarefa::all();
        ///------Fim Eloquent-----////
        return view('tarefas.list',['list' => $list]);//crio meu objeto do tipo LIST
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
        //---validação pelo próprio laravel---//
        if ($request->validate([
            'titulo' => ['required', 'string']
        ]));
        /////---fim validação laravel---//////    
        $titulo = $request->post('titulo');//se existir armazeno em uma variavel
        ////----Eloquent----////
        $t = new Tarefa();
        $t->titulo = $titulo;
        $t->save();
        ////----Fim Eloquent----////
        //retorno para a minha lista
        return redirect()->route('tarefas.list');
    }

    public function edit($id){
        ////-----Eloquent----/////
        $data = Tarefa::find($id);
        ////-----Fim Eloquent-----/////    
        if ($data) {         
            return view('tarefas.edit', ['data' => $data]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }

    public function editAction(Request $request, $id){    
        //---validação pelo próprio laravel---//
        if ($request->validate([
            'titulo' => ['required', 'string']
        ]));
        /////---fim validação laravel---//////
        $titulo = $request->post('titulo');
        //-----Métdo 1 com Eloquent-----///    
        // $t = Tarefa::find($id);
        // $t->titulo = $titulo;
        // $t->save();
        ///---Fim métdo 1 com Eloquent---////
        
        //-----Métdo 2 com Eloquent-----///
        Tarefa::find($id)->update(['titulo' => $titulo]);
        ///---Fim métdo 2 com Eloquent---////

        return redirect()->route('tarefas.list');    
    }
    
    public function del($id){
        ///-----Eloquent-----////
        Tarefa::find($id)->delete();
        ///-----Fim Eloquent-----///
        
        return redirect()->route('tarefas.list');
    }

    public function done($id){    
        ///----Eloquent----/////
        $t = Tarefa::find($id);    
        if ($t) {
            $t->resolvido = 1 - $t->resolvido;
            $t->save();    
        }
        ////----Fim Eloquent----////    
        return redirect()->route('tarefas.list');    
    }    
}
