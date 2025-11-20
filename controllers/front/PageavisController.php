<?php

class PageavisControllerCore extends FrontController{

    public $php_self = 'pageavis';

    public function initContent(){


    /*$this->context->smarty->assign(

        array(

        'var1' => 'Prueba 1',

        'variableSmarty2' => 'Prueba 2',
        )

    );*/

    parent::initContent();

    $this->setTemplate('pageavis');

    }

    static function Getparts(){

        return include './themes/aluclassic/templates/pageavis.php';
    }


}






?>
