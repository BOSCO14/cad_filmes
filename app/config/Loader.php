<?php

namespace app\config;

use \app\core\Core;

class Loader extends Core{

    public function __construct(){

        $this->loadPage();        
        
    }

    public function loadPage(){

        $template = file_get_contents('app/config/template/estrutura.html');

        ob_start();
        $core = new Core;
        //$core->start($_GET);
        $saida = ob_get_contents();
        ob_end_clean();

        $tplPronto = str_replace('{{area_dinamica}}', $saida, $template);
        echo $tplPronto;        
    }

}