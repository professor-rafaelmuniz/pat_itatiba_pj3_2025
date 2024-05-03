<?php

class Conexao extends PDO{


    private static $instance;


    public static function getInstance($sql, $noPrepare = false) //: PDO|PDOStatement {}
    {
        if ($noPrepare == true)
            return self::shakeInstance();
        else
            return self::shakeInstance()->prepare($sql);
    }

    // Método para executar uma instrução INSERT e retornar o ID da última inserção
    public static function recuperaUltimoId() {
        $pdo = self::shakeInstance(); // Obter instância do PDO
        return $pdo->lastInsertId(); // Retornar o ID da última inserção
    }

    private static function shakeInstance() : PDO
    {
        if (!isset(self::$instance)) {
            self::$instance = self::getPDO();
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
            //self::$instance->beginTransaction();  do not use it here
        }
        return self::$instance;
    }


    private static function getPDO() : PDO
    {
  
        $host = 'localhost';
        $database = 'u472708129_pat_itatiba';
        $user = 'u472708129_pat_itatiba';
        $password = 'mwH9/c9:El';
    /*  
   
        $host = '127.0.0.1:3306';
        $database = 'bd_pat_itatiba';
        $user = 'root';
        $password = 'senha';
   */
        return new PDO("mysql:host=$host;dbname=$database", $user, $password);

        // Configurando PDO para lançar exceções em caso de erros
       
    }

}





    