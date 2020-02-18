<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//rota orginal do laravel
//Route::get('/', function () {
  // return view('welcome');
//});
//----------------rota para retorna atravéz de uma controller----------------
//no caso esta rota me traz a pagina inicial do laravel atravez da controller Homecontroller 
Route::get('/','HomeController');
//---------------------------------------------------------------------------

//-----------------ROTA que redireciona para uma view------------------------
//Route::redirect('/', '/welcome');
//---------------------------------------------------------------------------

//--------------------carrega a view diretamente-----------------------------
//Route::view('/welcome', 'welcome');
//---------------------------------------------------------------------------

//----------carrega a view atravéz de um GET que me retorna uma função view------------
Route::get('/teste', function() {
   return view('teste');
});
//----------------------------------------------------------------------------

//------------------------------rota dinâmica-----------------------------------------------
Route::get('/noticias/{slug}',function ($slug){
   echo "Notícia Urgente! ".$slug;
});
//mais uma rota com mais parametros
Route::get('/noticias/{slug}/comentario/{id}', function ($slug, $id){
    echo "Notícia da morte de fulano ".$id." que estava internado ".$slug;
});
//------------------------------------------------------------------------------------------

//-------------------------------rotas com regex--------------------------------------------
Route::get('/user/{nome}',function($nome){
   echo "O Nome do usuário é: ".$nome;   
})->where('nome', '[a-zA-Z]+');//defino meu regex trabalhar com strings

//rotas com provider
Route::get('/user/{id}',function($id){
   echo "O id do usuário é: ".$id;   
});//->where('id', '[0-9]+'); definido meu regex trabalhar com números de 0 à 9
//--------------------------------------------------------------------------------------------

//------------------------------Rotas com nome + redirect--------------------------------------
// Route::get('/config',function(){
//    //return redirect()->route('info');//retorne com com redirect e passo a name (nome) da rota, 
//    //sendo assim todas vez que ela entrar nesta rota é redirecionada para a info
//    return view('config');
// })->name('config');//atribuo um name para esta rota

// Route::get('/config/info',function(){
//    echo "Configurações Info";
// })->name('info');//atribuo um name para esta rota

// Route::get('/config/permissoes',function(){
//    echo "Configurações Permissões";
// });
//----------------------------------------------------------------------------------------------

//-----------------------------grupo de rotas----------------------------------
/*
|Crio uma routa com um prefixo, exemplo: config e adiciono um grup function
|crio as demais rotas normalmente, todas elas trabalharão com o prefixo config
*/

//crio um novo grupo de rotas para trabalhar com meu CRUD
   Route::prefix('/tarefas')->group(function(){

      Route::get('/','TarefasController@list')->name('tarefas.list');//Tela de listagem

      Route::get('/add', 'TarefasController@add')->name('tarefas.add');//Tela de adição
      Route::post('/add', 'TarefasController@addAction')->name('tarefas.addAction');//Ação de edição

      Route::get('/edit/{id}', 'TarefasController@edit')->name('tarefas.edit');//Tela de edição
      Route::post('/edit/{id}', 'TarefasController@editAction')->name('tarefas.editAction');//Ação de edição

      Route::get('/del/{id}', 'TarefasController@del')->name('tarefas.del');//Ação de delete

      Route::get('/marca/{id}', 'TarefasController@done')->name('tarefas.done');//Ação Sim/Não

   });












Route::prefix('/config')->group(function(){

   //Route::get('/', function(){
     // return view('config');
   //});

   //Route::get('info', function(){
     // echo "Configurações Info";
   //});

   //Route::get('permissoes', function(){
     // echo "Configurações Permissões";
   //});

   //-----------------rota para chamada via controller------------------------
   Route::get('/', 'Admin\ConfigController@index');
   Route::post('/', 'Admin\ConfigController@index');//crio uma outra rota para receber envios pelo método post

   Route::get('info', 'Admin\ConfigController@info');

   Route::get('permissoes', 'Admin\ConfigController@permissoes');
   //-------------------------------------------------------------------------
});
//-----------------------------------------------------------------------------

//----------------FallBack----------------------
/*
 |fallback é uma função do proprio laravel que retorna uma
 | página de erro caso o usuário tente entrar em uma rona inexistente as estabelecidas
 */
Route::fallback(function(){
   return view('404'); 
});
//----------------------------------------------













