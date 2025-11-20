<?php

class NotasCore extends ObjectModel
{
    public $name;

    function __construct($name)
    {
        $this->name = $name;
    }

    function GetNotaGoogle($idnota = 1)
    {
       $arraySelectFilter = array();
       $stringSQL = "SELECT id, nome, nota FROM ps_notas_externas";

       $resultSQL = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($stringSQL);

       foreach($resultSQL as $value)
        $arraySelectFilter[$value['id']] = $value['nota'];

       return $arraySelectFilter[$idnota];
    }


    function GetNotaTrustpilot($idnota = 2)
    {
       $arraySelectFilter = array();
       $stringSQL = "SELECT id, nome, nota FROM ps_notas_externas";

       $resultSQL = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($stringSQL);

       foreach($resultSQL as $value)
        $arraySelectFilter[$value['id']] = $value['nota'];

       return $arraySelectFilter[$idnota];
    }


    function GetNotaPriximbattable($idnota = 3)
    {
       $arraySelectFilter = array();
       $stringSQL = "SELECT id, nome, nota FROM ps_notas_externas";

       $resultSQL = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($stringSQL);

       foreach($resultSQL as $value)
        $arraySelectFilter[$value['id']] = $value['nota'];

       return $arraySelectFilter[$idnota];
    }


    function GetNotaPagesJaunes($idnota = 4)
    {
       $arraySelectFilter = array();
       $stringSQL = "SELECT id, nome, nota FROM ps_notas_externas";

       $resultSQL = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($stringSQL);

       foreach($resultSQL as $value)
        $arraySelectFilter[$value['id']] = $value['nota'];

       return $arraySelectFilter[$idnota];
    }

}

?>
