<?php

//-------------------------------------------------------------------------------//
// import system core
include("system/AppConst.php");
include "system/config/config.php";
foreach (glob("system/core/*.php") as $filename) {
    require_once $filename;
}
//-------------------------------------------------------------------------------//

//-------------------------------------------------------------------------------//
// edit method from form send to server
//-------------------------------------------------------------------------------//


//-------------------------------------------------------------------------------//
// Run router
$router = new Router();
foreach (glob("routes/*.php") as $filename) {
    require_once $filename;
}
$router->run();
//-------------------------------------------------------------------------------//
?>