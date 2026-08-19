<?php

class Router{

    public static Server $server;

public static function get(string $rota, callable $callback){
    $r = $_SERVER["REQUEST_URI"];

    $m = $_SERVER["REQUEST_METHOD"];

    if($m == "GET" && $r == $rota){
        $callback();
    }
}


public static function post(string $rota, callable $callback){
    $r = $_SERVER["REQUEST_URI"];

    $m = $_SERVER["REQUEST_METHOD"];

    if($m == "POST" && $r == $rota){
        $callback();
    }
}


public static function delete(string $rota, callable $callback){
    $r = $_SERVER["REQUEST_URI"];

    $m = $_SERVER["REQUEST_METHOD"];

     if($m == "DELETE" && $r == $rota){
        $callback();
     }

}

public static function put(string $rota, callable $callback){
    $r = $_SERVER["REQUEST_URI"];

    $m = $_SERVER["REQUEST_METHOD"];

     if( $r == $rota){
        $callback();
     }

}

}