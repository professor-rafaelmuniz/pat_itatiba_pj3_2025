<?php

require_once('dao/Conexao/Conexao.php');

class EmpresaDAO  {

    use ErrosTrait;

   


//########################################################################

    public function validarAcessoDAO($email) {
        try {
            //Valida no login
           

            $sql = "SELECT * FROM `tb_empresa` WHERE `empr_email` = :email";

            $p_sql = Conexao::getInstance($sql);
            $p_sql->bindValue(":email", $email);
            $p_sql->execute();

            $oEmpresa="";
            while ($v_ret = $p_sql->fetchObject()) {
                $oEmpresa = new EmpresaClass((array) $v_ret);
            }
            
            return $oEmpresa ?? null;

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
//########################################################
    
    
    public function verificarCadastroPeloEmailDAO($emailCadastro) {
        try {
            //Valida no login


            $sql = "SELECT * FROM `tb_comissao` WHERE `comi_email` = :email";

            $p_sql = Conexao::getInstance($sql);
            $p_sql->bindValue(":email", $emailCadastro);
            $p_sql->execute();

           
            $num_linhas = $p_sql->rowCount();

            return $num_linhas;

            
           

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
