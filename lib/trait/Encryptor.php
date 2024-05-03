<?php
//######################################
require_once('view/i_verificasessao.php');
//######################################

trait Encryptor
{

    private function calculateHash()
    {
        foreach ($this->geradorDeHash as $item) {
            echo nl2br("\"" . mb_strtoupper(Validacao::hasher($item)) . "\" => array(\"" . $item . "\",\"0\"),\n");
        }
        exit("Copy and paste in the pageMapper array");
    }

    private function getValue($hash)
    {
        foreach ($this->pageMapper as $key => $item) {
            if ($hash === $key) {
                $page = $item[0];
            }
        }
        return explode("=", $page);
    }


    private function getPermission($hash)
    {
        foreach ($this->pageMapper as $key => $item) {
            if ($hash === $key) {
                $page = $item[1];
            }
        }
        
        return $page;
    }


    private function getHash($value)
    {


        $page = "";
        foreach ($this->pageMapper as $key => $item) {
            if ($value === $item[0]) {
                $page = $key;
            }
        }
        return "?p=" . $page;
    }



    private $geradorDeHash = array(
        "Vaga=buscarVaga",


    );


    /**
     * Segurança de acesso
     * Mapeia hash das páginas/ações e determina tipo de usuário que pode acessar
     * 0 no restrictions
     * 1 Comissão
     * 2 Participante
     * 3 orientador
     */
    // TEM Q TER NO CONTROLLER


    private $pageMapper = array(
        "59FD886425CF961" => array("Login=loadError", "0"),
        "E6DBAB26BBA5306" => array("Login=validarAcesso", "0"),
        "77EEFAD481E6553" => array("Login=sair", "0"),
        "769AF007083DD52" => array("Login=loginPage", "0"),
        "E2670408AE0381F" => array("Login=cadastrarNovoUsuario","0"),
        "5048EC17CBAB9D7" => array("Empresa=carregartelanovavaga","0"),
        "F3D4704E1B694FF" => array("Empresa=carregartelavagasanunciadas","0"),
        "816843D619DE0E6" => array("Vaga=cadastrarNovaVaga","0"),
        "1CD371921056DDB" => array("Vaga=listarVagaPorEmpresass","0"),
        "8D065684EF81FEA" => array("Site=listarVagas","0"),
        "1807CCE7307FEEE" => array("Vaga=buscarVaga","0"),
        
    );
}
