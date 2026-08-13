<?php

class Router{

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

}