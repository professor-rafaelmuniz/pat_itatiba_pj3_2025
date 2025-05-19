<?php

require_once('dao/Conexao/Conexao.php');

class LogErroDAO  {

    use ErrosTrait;

########################################################

public function inserirLogErro($erro, $usuario=null){


    try {
        $sql = "INSERT tb_log_erro (`log_erro`, `log_email_usuario`, `log_data`) values (:erro, :usuario,:dataAtual);";

            $p_sql = Conexao::getInstance($sql);
            $p_sql->bindValue(":erro", $erro);
            $p_sql->bindValue(":usuario", $usuario);
            $p_sql->bindValue(":dataAtual", date('Y-m-d H:i'));
           // $p_sql->execute();

//Validacao::debugMe("Arquivo:" . __FILE__ . "\nFunção:" . __FUNCTION__ ."\nLinha:". __LINE__, $erro);


        return true;

    } catch (Exception $e) {

        return $this->getExceptionMessage($e, $p_sql, "", "DAO_");
    } finally {
        // Fecha a conexão no bloco finally
        if ($p_sql !== null) {
            $p_sql->closeCursor(); // Fecha o cursor
            $p_sql = null; // Atribui null à variável
        }
    }

}


//##################################333




}
