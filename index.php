<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    


    require_once 'lib/Application.php';

    try {
        (new Application())->setSystemFlux();
    } catch (Exception $e) {
        Validacao::debugMe("Unknown error", $e->getMessage());
    }
