<?php
/**
* Clase que provee de una API p�blica para cada uno de los recursos habilitados
*
* @package    EuropioEngine
* @subpackage core.api
* @license    http://www.gnu.org/licenses/gpl.txt  GNU GPL 3.0
* @author     Eugenia Bahit <ebahit@member.fsf.org>
* @link       http://www.europio.org
*/
importar('core/helpers/http');
importar('core/mvc_engine/helper');
importar('core/helpers/http');
importar('core/mvc_engine/helper');
class ApiRESTFul {
    public static function get($apidata='', $model='', $resource='') {
        $modelo = MVCEngineHelper::set_name('model', $model);
        $recurso = MVCEngineHelper::set_name('resource', $resource);
        self::check_resource($modelo, $recurso);
        header("Content-Type: text/json; charset=utf-8");
        print json_encode($apidata);
    }
	    private static function check_resource($model, $resource) {
        $resources = self::check_model($model);
        if (!in_array($resource, $resources)){
            HTTPHelper::error_response();
        } 
    }
}
?>