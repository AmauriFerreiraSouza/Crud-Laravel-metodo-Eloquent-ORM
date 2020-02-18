<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function index(Request $resquest){
        /////////----FORMAS DE USO DO REQUEST---/////////// 
        
        //uso que request para trazer os metodos usados
        //$resquest = request()->url();//neste exemplo trago a url usada;
        //$resquest = request()->method();//metodo usado
        //echo $resquest;

        //----USO DE REQUEST PARA PEGAR DADOS ENVIADOS DE FORMULÁRIOS---//

        //$dados = request()->all();//pego todos os dados enviados, seja da url como do corpo
        //print_r($dados);//como é um array trago os dados por print_r

        //$name = request()->input('name');//input pega todos os dados priorizando os do corpo
        //echo $name;

        //$cidade = request()->query('age', '120');//pega os dados enviados apenas da url
        //echo $cidade;

        //$nome = request()->get('age');//pego um único dado tanto por get como input
        //echo $nome;
        
        /////////////////////////////////////////////////

        /////////----FORMAS DE VALIDAÇÃO DE DADOS----//////////
        //metodo de validação mais "complexo"
        // if ($resquest->has('state')) {
        //     echo "Tem estado!";
        // }else{
        //     echo "Não tem estado!";
        // }

        //validação simples
        // $estado = $resquest->input('state', "São Paulo");

        // $nome = request()->input('name', 'Visitante');
        // $age = request()->input('age', 0);

        // echo "Meu nome é ".$nome." Tenho ".$age." anos";
        // echo "<br/>";
        // echo "Moro no estado de: ".$estado;

        ///////////////////////////////////////////////////////

        /////////-------CARREGAR DADOS DADOS PARA BLADE----////////
        //pego minhas variávei 
        $name = 'Amauri';
        $age = 12;
        $city = 'São paulo';
        // $list = [
        //     'ovos',
        //     'farinha',
        //     'fermento',
        //     'sal',
        // ];

        //-------posso incrementar este array-------//
         $list = [
            ['nome'=>'Farinha', 'qtd'=>2],
            ['nome'=>'Ovos', 'qtd'=>2],
            ['nome'=>'Fermento', 'qtd'=>2],
            ['nome'=>'azeite', 'qtd'=>1]
         ];
        //-----------------------------------------//    

        //jogo dentro de um array    
        $data = ['name' => $name, 'age'=> $age, 'city'=> $city, 'list'=> $list];

        //////////////////////////////////////////////////////////    

        return view('admin.config', $data);//apresento na tela os valores
    }

    public function info(){
        echo "configurações info 3";
    }

    public function permissoes(){
        //echo "configurações permissões 3";
        return view('admin.permissoes');
    }
}
