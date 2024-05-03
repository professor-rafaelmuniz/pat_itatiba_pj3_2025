<?php

trait ControllerTrait
{
    private $mensagem;

    private function getMensagem() {
        return $this->mensagem ?? null;
    }

    private function setMensagem($mensagem) {
        $this->mensagem = $mensagem;
    }

    private function unsetMensagem() {
        unset($this->mensagem);
    }

    
    private function acharCodigoPeloMD5($codigoMD5){
         ##################################################################
                // DESCOBRE O CODIGO ATRAVES DO MD5
                for($verificador = 0; $verificador < 1000000; $verificador ++){
                    if ($codigoMD5 == strtoupper(md5($verificador))){
                        return $verificador;
                        break;
                    }
                }
                //Validacao::debugMe("Arquivo: ".__FILE__."\nFunção:".__FUNCTION__,$verificador );
                echo "Erro ao converter ". $codigoMD5 . " no inteiro.";
                exit;

         ##################################################################
    }

    function gerarToken() {
        return bin2hex(random_bytes(32)); // Gera um token de 32 bytes e o converte para hexadecimal
    }


}
