<?php

    /*ini_set('display_errors', 1);
    ini_set('error_reporting', E_ALL);
    feito na linha debaixo
    */


    //##################################
    // INICIO SESSION DO EVENTO
    //#################################

  

    //##################################
    // FINAL SESSION DO EVENTO
    //#################################

    require_once 'lib/Application.php';

    try {
        (new Application())->setSystemFlux();
    } catch (Exception $e) {
        Validacao::debugMe("Unknown error", $e->getMessage());
    }
