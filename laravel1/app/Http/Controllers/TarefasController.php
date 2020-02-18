<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TarefasController extends Controller
{
    public function list(){
        $list = DB::select('SELECT * FROM tarefas');//crio minha query de busca

        return view('tarefas.list',['list' => $list]);//crio meu objeto do tipo LIST
    }

    public function add(){
        return view('tarefas.add');
    }

    public function addAction(Request $request){
        if ($request->filled('titulo')) {//verifico se existe o post titulo
            $titulo = $request->post('titulo');//se existir armazeno em uma variavel
            //crio meu insert 
            DB::insert('INSERT INTO tarefas SET titulo = :titulo', [
                'titulo' => $titulo]
            );
            //retorno para a minha lista
            return redirect()->route('tarefas.list');
        } else {
            //se não existir o post titulo mando uma alert para a mesma tela
            return redirect()
            ->route('tarefas.add')
            ->with('warning', 'Por favor preencher o campo Título!!');
        }
    }

    public function edit($id){
        $data = DB::select('SELECT * FROM tarefas WHERE id = :id', [
            'id' => $id
            ]);    
        if (count($data) > 0) {         
            return view('tarefas.edit', ['data' => $data[0]]);
        } else {
            return redirect()->route('tarefas.list');
        }
    }

    public function editAction(Request $request, $id){
        if ($request->filled('titulo')) {
            $titulo = $request->post('titulo');

            DB::update('UPDATE tarefas SET titulo = :titulo WHERE id = :id', [
                'id' => $id,
                'titulo' => $titulo,
            ]);

            return redirect()->route('tarefas.list');    

        } else {
            return redirect()
            ->route('tarefas.edit', ['id' => $id])
            ->with('warning', 'Por favor preencher o campo Título!!');
        }

    }
    
    public function del($id){
        
        DB::delete('DELETE FROM tarefas WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');
    }

    public function done($id){
        /////////////////////-------froma simples---------//////////////////////

        //se resultado original for = 1 (1 - 1 = 0)
        //se resultado original dor = 0 (1 - 0 = 1)

        DB::update('UPDATE tarefas Set resolvido = 1 - resolvido WHERE id = :id', [
            'id' => $id
        ]);

        return redirect()->route('tarefas.list');
        ///////////////----------fim forma simples--------------//////////////////
        

        ////////////////---------forma complex de resolver---------------------///////////////    
        // $result = DB::select('SELECT resolvido FROM tarefas WHERE id = :id', [
        //     'id' => $id
        //     ]);

        // if ($result[0]->resolvido === 1) {

        //     DB::update('UPDATE tarefas SET resolvido = 0 WHERE id = :id', [
        //         'id' => $id,
        //         ]);

        //         return redirect()->route('tarefas.list');

        // } else {

        //     DB::update('UPDATE tarefas SET resolvido = 1 WHERE id = :id', [
        //         'id' => $id,
        //         ]);

        //         return redirect()->route('tarefas.list');
        // }    
        /////////////////------------fim forma complexa----------//////////////////////////
    }    
}
