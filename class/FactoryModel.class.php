<?php


Final class FactoryModel{

    public static function GetInstance($ModelClassName){

        return new $ModelClassName();
    }
}

?>