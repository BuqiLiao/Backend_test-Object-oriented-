<?php
//Define final Frame class
final class Frame{

    public static function run(){
     
        self::initConfig();//Initial configuration information        
        self::initRoute();//Initial routing parameters        
        self::initConst();//Initial directory constants        
        self::initAutoLoad();//Initial class autoloading        
        self::initDispatch();//Initial request dispatch
    }

    private static function initConfig(){

        $GLOBALS['config'] = require_once "./Config.php";

    }
    private static function initRoute(){
        
        //Get the routing parameters
        $p = isset($_GET['p']) ? $_GET['p'] : $GLOBALS['config']['default_platform'];
        $c = isset($_GET['c']) ? $_GET['c'] : $GLOBALS['config']['default_controller'];
        $a = isset($_GET['a']) ? $_GET['a'] : $GLOBALS['config']['default_action'];
        define("PLAT",$p);
        define("CONTROLLER",$c);
        define("ACTION",$a);
    }
    private static function initConst(){
        
        //Define direction constants
        define("DS",DIRECTORY_SEPARATOR);
        define("ROOT_PATH",getcwd().DS);
        define("FRAME_PATH",ROOT_PATH."Frame".DS);
        define("MODEL_PATH",ROOT_PATH."Model".DS);
        define("CONTROLLER_PATH",ROOT_PATH."Controller".DS);
        define("VIEW_PATH",ROOT_PATH."View".DS.CONTROLLER.DS);
    }
    private static function initAutoLoad(){
        
        spl_autoload_register(function($ClassName){

            $ClassPath = [
                FRAME_PATH."$ClassName.class.php",
                MODEL_PATH."$ClassName.class.php",
                CONTROLLER_PATH."$ClassName.class.php"
            ];
        
            foreach ($ClassPath as $FileName){
                
                if(file_exists($FileName)){
        
                    require_once($FileName);
                }
            }
        });
    }
    private static function initDispatch(){
        
        $controllerName = CONTROLLER."Controller";

        $User_obj = new $controllerName();

        $action_name = ACTION;
        $User_obj->$action_name();

    }



    
}





?>