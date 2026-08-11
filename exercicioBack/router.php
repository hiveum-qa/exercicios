<?php

class Router{

public static function get(string $rota, callable $callback){
    $r = $_SERVER["REQUEST_URI"];

    if($r == $rota){
        $callback();
    }
}
}