<?php

require_once "session.php";
require_once "placas.php";


$sess = new Session();
$placas = new Placas();
$placas->mostrarVeiculos();