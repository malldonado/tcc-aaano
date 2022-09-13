<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Adocao extends Model
{

    protected $_tableName = 'adocaos';

    protected $_tableAlias = 'adocaos';

    protected $_join = array();

    protected $_where = array();

    protected $_select = array();

    protected $_query = null;

    public function __construct(array $attributes = []){
        parent::__construct($attributes);
    }

    public function recordSet($columns = array('*')){
        $result = self::all($columns);
        return $result;
    }

    public function findAll(){

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
        $this->_join[] = ['table' => 'pessoas', 'first' => 'adocaos.id_pessoa', 'operator' => '=', 'second' => 'pessoas.id'];
        $this->_join[] = ['table' => 'animals', 'first' => 'adocaos.id_animal', 'operator' => '=', 'second' => 'animals.id'];
        $this->_join[] = ['table' => 'usuarios', 'first' => 'pessoas.id', 'operator' => '=', 'second' => 'usuarios.id_pessoa'];
        return $this->_join;
    }

    protected function _getQuery(){
        $this->_query = DB::table($this->_getTableName());
        return $this->_query;
    }

    private function _loadColumns(){
        $this->_select = [
            'adocaos.id as adocao_id',
            'adocaos.adotado as adocao_adotado',
            'adocaos.created_at as adocao_dt_inclusao',
            'adocaos.updated_at as adocao_dt_atualizacao',
            'adocaos.data_adocao as adocao_dt_adocao',
            'adocaos.data_recusa as adocao_dt_recusa',
            'adocaos.data_pedido_ad as adocao_dt_pedido_adocao',
            'pessoas.id as pessoa_id',
            'pessoas.nome as pessoa_nome',
            'pessoas.codigo as pessoa_codigo',
            'pessoas.sexo as pessoa_sexo',
            'usuarios.id as usuario_id',
            'usuarios.email as usuario_email',
            'usuarios.foto as usuario_foto',
            'animals.id as animal_id',
            'animals.idade as animal_idade',
            'animals.raca as animal_raca',
            'animals.nome as animal_nome',
            'animals.cor as animal_cor',
            'animals.porte as animal_porte',
            'animals.deficiencia as animal_deficiencia',
            'animals.sexo as animal_sexo',
            'animals.vacinado as animal_vacinado',
            'animals.dt_registro as animal_dt_registro',
            'animals.castrado as animal_castrado',
            'animals.patologia as animal_patologia',
            'animals.situacao as animal_situacao',
            'animals.status as animal_status',
            'animals.descricao as animal_descricao',
            'animals.imagem as animal_imagem',
            'animals.created_at as animal_created_at',
            'animals.updated_at as animal_updated_at',
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
            return $this->_tableName;
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



}
