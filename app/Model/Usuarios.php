<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Usuarios extends Model
{

    protected $_tableName = 'usuarios';

    protected $_tableAlias = 'usuarios';

    protected $_join = array();

    protected $_where = array();

    protected $_orWhere = array();

    protected $_select = array();

    protected $_query = null;

    public function __construct(array $attributes = []){
        parent::__construct($attributes);
    }

    public function exists($email){
        if($email){
            $exists = self::where('email', '=', $email)->exists();
            return $exists;
        }else{
            throw new \Exception("Erro, parâmetro vazio!");
        }
    }

    //Seleciona a propria tabela
    public function recordSet($columns = array('*')){
        $result = array();

        if($this->getWhere()){
            $result = DB::table($this->_getTableName())->select($columns)
                ->where($this->getWhere())
                ->get()
                ->toArray();
        }else{
            $result = DB::table($this->_getTableName())->select($columns)
                ->get()
                ->toArray();
        }

        return $result;
    }

    //seleciona com joins
    public function findAll(){
        $pessoas = array();

        if($this->getWhere()) {
            $pessoas = $this->_queryJoin()
                            ->select($this->_getColumns())
                            ->where($this->getWhere())
                            ->get()
                            ->toArray();
        }else{
            $pessoas = $this->_queryJoin()
                            ->select($this->_getColumns())
                            ->get()
                            ->toArray();
        }



        return $pessoas;

    }

    public function addWhere($column, $operator = null, $value = null, $boolean = 'and'){

        if(!is_array($column)) {

            $this->_where[] = array($column, $operator, $value, $boolean);
        }else{
            foreach ($column as $value) {

                if(strtoupper($value['$boolean']) == strtoupper('OR')){
                    $this->_orWhere[] = array($value['column'], $value['operator'], $value['value']);
                }else{
                    $this->_where[] = array($value['column'], $value['operator'], $value['value']);
                }
            }
        }

        return  $this->_where;
    }

    public function getWhere(){
        return $this->_where;
    }

    private function _queryJoin(){
        $this->_getJoin();

        $query = $this->_getQuery();

        foreach ($this->_join as $join) {
            $query->join($join['table'], $join['first'], $join['operator'], $join['second']);
        }

        return $query;
    }

    public function addJoins($joins = array()){
        $this->_getJoin();

        if($joins){
            foreach($joins as $join){
                $this->addJoin($join);
            }
            return $this->_join;
        }else {
            return $this->_getJoin();
        }
    }

    public function addJoin($join = array()){
        $this->_getJoin();

        if($join){
            $this->_join[] = $join;
        }else{
            throw new \Exception('Join vazio!');
        }

        return $this->_join;
    }

    private function _getJoin()
    {
        $this->_join = array();
        $this->_join[] = ['table' => 'pessoas', 'first' => 'usuarios.id_pessoa', 'operator' => '=', 'second' => 'pessoas.id'];
        $this->_join[] = ['table' => 'enderecos', 'first' => 'pessoas.id', 'operator' => '=', 'second' => 'enderecos.id_pessoa'];
        $this->_join[] = ['table' => 'telefones', 'first' => 'pessoas.id', 'operator' => '=', 'second' => 'telefones.id_pessoa'];
        return $this->_join;
    }

    protected function _getQuery(){
        $this->_query = DB::table($this->_getTableName());
        return $this->_query;
    }

    private function _loadColumns(){
        $this->_select = [
            'pessoas.id as pessoa_id',
            'pessoas.nome as pessoa_nome',
            'pessoas.codigo as pessoa_codigo',
            'pessoas.sexo as pessoa_sexo',
            'usuarios.foto as usuario_foto',
            'usuarios.email as usuario_email',
            'usuarios.status as usuario_status',
            'usuarios.nivel as usuario_nivel',
            'enderecos.id_pessoa as endereco_id_pessoa',
            'enderecos.bairro as endereco_bairro',
            'enderecos.rua as endereco_rua',
            'enderecos.numero as endereco_numero',
            'enderecos.cidade as endereco_cidade',
            'enderecos.estado as endereco_estado',
            'enderecos.resumo as endereco_resumo',
            'enderecos.cep as endereco_cep',
            'enderecos.cep as endereco_cep',
            'telefones.numero as telefone_numero',
        ];

        return $this->_select;
    }


    protected function _getColumns(){
        return $this->_loadColumns();
    }

    protected function _getTableName(){
        if($this->getTable()){
            return $this->getTable();
        }else{
            return self::tableName;
        }
    }

    public function setTableName($tableName){
        $this->setTable($tableName);
        $this->_tableName = $tableName;
    }

    protected function _getTableAlias(){
        return $this->_tableAlias;
    }

    public function setTableAlias($alias){
        $this->_tableAlias = $alias;
        return $this->_tableAlias;
    }

    public function deletar($id)
    {
        $result = new \stdClass();
        $result = self::find($id);

        if($result){
            $result = $class->delete();
            return $result;
        }else return false;
    }


}
