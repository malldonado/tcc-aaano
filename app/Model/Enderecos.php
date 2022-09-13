<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model{       


    protected $_enderecos;

    public function montarResumo(){
        $resumo = '';
        $resumo .= $this->rua;
        $resumo .= ' ' . $this->bairro;
        $resumo .= ', ' . $this->bairro;
        $resumo .= ', ' . $this->numero;
        $resumo .= ', ' . $this->cidade;
        $resumo .= ', ' . $this->estado;
        
        return $resumo;        
    }


    public function recordSet($columns = array('*')){
        $this->_enderecos = self::all($columns);
        return $this->_enderecos;
    }

    public function getAllEnderecos(){
        $this->recordSet();
        return $this->_enderecos;
    }
}
