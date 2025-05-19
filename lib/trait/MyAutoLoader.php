<?php

spl_autoload_register('MyAutoLoader::LibLoader');
spl_autoload_register('MyAutoLoader::ClassLoader');
spl_autoload_register('MyAutoLoader::DAOLoader');
spl_autoload_register('MyAutoLoader::ControllerLoader');



trait MyAutoLoader
{


    /**
     * @param $className
     * Mapeia todos arquivos .php em diretórios abaixo de LIB
     */
    public static function LibLoader($className)
    {
        if (file_exists("lib/".$className.".php")) {
            require_once "lib/".$className.".php";
            //echo "Arquivo importado: $className\n";
        } elseif (file_exists("lib/trait/".$className.".php")) {
            require_once "lib/trait/".$className.".php";
            //echo "Arquivo importado: $className\n";
        }
        clearstatcache();
    }

    /**
     * @param $className
     * Mapeia todos arquivos .php em diretórios abaixo de CLASS
     */
    public static function ClassLoader($className)
    {

        require_once('class/LoginClass.php');
        require_once('class/VagaClass.php');
        require_once('class/EmpresaClass.php');
   
        clearstatcache();
       
    }

    /**
     * @param $className
     * Mapeia todos arquivos .php em diretórios abaixo de DAO
     */
    public static function DAOLoader($className)
    {
        require_once('dao/Conexao/Conexao.php');
        require_once('dao/LogErroDAO.php');
        require_once('dao/VagaDAO.php');
        require_once('dao/EmpresaDAO.php');


        clearstatcache();
    }

    /**
     * @param $className
     * Mapeia todos arquivos .php em diretórios abaixo de CONTROLLER
     */
    public static function ControllerLoader($className)
    {
        require_once('controller/LoginController.php');
        require_once('controller/VagaController.php');
        require_once('controller/EmpresaController.php');

        clearstatcache();
    }

    /**
     * @param $className
     * Mapeia todos arquivos .php em diretórios abaixo de HELPER
     */
    
   
}