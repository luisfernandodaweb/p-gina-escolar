<?php
/*
Autora: Eugine Bahit
*/

importar('core/mvc_engine/helper');


abstract class controller {
    public function __construct ($resource='', $arg="", $api=false){
        $this->api = $api;
        $this->apidata ='';
        $this->model = MVCEngineHelper::get_model ($this); //CORREGIDO
        $this->view = MVCEngineHelper::get_view($this);
        
        if (method_exists ($this, $resource)){  //CORREGIDO
            //-- llamar la clase con su método correspondiente
            // -- y le manda los argumentos correspondientes en caso de 
            call_user_func(array($this, $resource), $arg);  //CORREGIDO
        } 
        else {
            HTTPHelper::go(DEFAULT_VIEW);
        }        
    }    
}

?>