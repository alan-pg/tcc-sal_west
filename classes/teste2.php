<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes;
new \Classes\teste();

/**
 * Description of teste
 *
 * @author allan
 */
class teste {
    
    public function __construct() {
        $uri = urldecode(filter_input(INPUT_SERVER, 'REQUEST_URI'));
        $resquest = explode('/', $uri);
        $method = $resquest[4];
        $param = $resquest[5];
        
       if(method_exists(get_class(), $method)){
           $this->$method($param);
        }else{
            return false;
        }                
    }
    
    public function teste($param = null){
        $Response=[
            "jan"=>"10",
            "fev"=>"15",
            "mar"=>"30",
            "abr"=>"20",
            "mai"=>"5",
            "jun"=>"25",
            "jul"=>"50",
            "ago"=>"24",
            "set"=>"150",
            "out"=>"44",
            "nov"=>"30",
            "dez"=>"60"
        ];
        echo $dados = json_encode($Response);
    }
}
