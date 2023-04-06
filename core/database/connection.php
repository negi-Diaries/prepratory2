<?php

class connection{

    public static function make($config){
        try{
            // return new PDO('mysql:host=localhost;dbname=prepratory1', 'root', '');
            return new PDO(
                $config['connection'].';dbname='.$config['dname'],
             $config['username'],
              $config['password'],
             $config['options']
            );
        }catch(PDOException $e){
            die($e->getMessage());
        }
    }

}




?>