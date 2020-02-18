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
//no caso esta rota me traz a pagina inicial do laravel atravez da controller Homecontroller 
Route::get('/', function(){
   return redirect()->route('tarefas.list');
});

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

//----------------FallBack----------------------
/*
 |fallback é uma função do proprio laravel que retorna uma
 | página de erro caso o usuário tente entrar em uma rona inexistente as estabelecidas
 */
Route::fallback(function(){
   return view('404'); 
});
//----------------------------------------------













