<?php


trait ErrosTrait
{

    /**
     * @param $exception
     * @return String
     */
    private function getExceptionMessage($exception, $p_sql, $obj = null, $pacote = null, $codErro = null): String
    {
        $this->logException($exception, $p_sql, $obj, $pacote);
        return "Oops! Algo inesperado aconteceu. Sentimos muito. Entre em contato com o administrador ou retorne mais tarde.<br> Código erro: "  . $codErro;
        //return "Oops! Algo inesperado aconteceu. ".$this->logException($exception);
    }

    /**
     * To create directories
     * @param $dir
     * @param $contents
     */
    private function file_force_contents($dir, $contents)
    {
        $parts = explode('/', $dir);
        $file = array_pop($parts);
        $dir = '';
        foreach ($parts as $part)
            if (!is_dir($dir .= "/$part"))
                mkdir($dir);
        file_put_contents("$dir/$file", $contents);
    }


    /**
     * @param $exception
     * @param $code
     * @return String (SHA1)
     * logar as exceções com $_SESSION
     * TODO logar identificação do usuário (Coordenador, Candidato)
     */
    private function logException($exception, $p_sql, $obj = null, $pacote = null): String
    {

        //Validacao::debugMe("logger", $exception);
        $datetime = Validacao::getDatetime();
        $message = $exception->getMessage();
        $trace = $exception->getTraceAsString();
        $query = $p_sql->queryString;

        $log = "DATETIME: " . $datetime . "\n\nERROR MESSAGE: " . $message . "\n\nQUERY: " . $query . "\n\nTRACE:\n" . $trace;
        $code = mb_convert_case(sha1($log), MB_CASE_UPPER);
        $log .= "\n\n" . serialize($obj);
        $log .= "\n\nSHA1: " . $code;
        if (isset($pacote)) {
            $realfilename = mb_eregi_replace("/|:", "", $pacote . $datetime);
        } else {
            $realfilename = mb_eregi_replace("/|:", "", $datetime);
        }
        $realfilename = mb_eregi_replace("\s", "_", $realfilename);

        $filename = getcwd() . "\\erros\\" . $realfilename . ".log";
        file_put_contents($filename, $log);

        // GRAVA NO BANCO O ERRO
        (new LogErroDAO)->inserirLogErro($log);
        
        (new Application())->loadError();
        exit();


        return $code;
    }


    function levantarErroDAO( $message){
        // TRATANDO MENSAGEM DE SAIDA
        $pattern = "/Duplicate entry '([^']+)'/";
        if (preg_match($pattern, $message, $matches)) {
            // Email duplicado encontrado
            $duplicateEmail = $matches[1];
            $retorno = "O email $duplicateEmail já está cadastrado e não é possível cadastrá-lo novamente. Entre em contato com a comissão do evento.";
        } else {
            $retorno = "Ocorreu um erro ao processar a solicitação. Tente novamente em seguida. Caso o erro persista, entre em contato com a comissão.";
        }
        return array(false, $retorno);
    }

}
