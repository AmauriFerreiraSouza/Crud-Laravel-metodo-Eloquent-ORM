<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    //protected $table = 'minhas_tarefas';
    //protected $primaryKay = 'id';
    //public $incrementing = true;
    //protected $keyType = 'string';

    public $timestamps = false;//desabilo o método que cria as colunas CREATED_AT e UPDATED_AT em uma tabela

    /**
     * Para fazer a inserção desta segunda forma, você precisa setar na sua Model os campos que serão permitidos serem setados. 
     * Por se tratar de uma inserção em massa, o Laravel bloqueia todos os campos por padrão. 
     * Isso ocorre para evitar que usuários consigam passar parâmetros indesejados na Request e que eles acabem
     * alterando um dado importante dentro do banco de dados.
     * 
     * Então criarei na Model Product, a variavel “fillable” e definirei um array com os campos que serão inseridos aqui.
     */
    protected $fillable = ['titulo'];

    //const CREATED_AT = 'date_create';
    //const UPDATE_ATE = 'date_update';
}
