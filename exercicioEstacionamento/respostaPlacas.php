<?php

include "session.php";
include "placas.php";


$sess = new Session();
$placas = new Placas();
$placas->mostrarVeiculos();