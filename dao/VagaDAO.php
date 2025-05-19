<?php

//require_once('dao/Conexao/Conexao.php');
class VagaDAO  {

    use ErrosTrait;



    
//##################################################################################

public function listarVagasDAO() {
    try {


        $sql = "SELECT * FROM `tb_vaga` v
                inner join tb_empresa e on e.empr_cod = v.vaga_empresa_fk";

        $p_sql = Conexao::getInstance($sql);
        $p_sql->execute();


        

        $ar_vagas = array();
        while ($v_ret = $p_sql->fetchObject()) {
            array_push($ar_vagas, new VagaClass((array) $v_ret));
        }


        return $ar_vagas ?? null;

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
//##################################################################################

public function buscarVagaDAO($palavra) {
    try {


        $sql = "SELECT * FROM `tb_vaga` v
                inner join tb_empresa e on e.empr_cod = v.vaga_empresa_fk
                where vaga_titulo like concat('%', :palavra, '%')";

        $p_sql = Conexao::getInstance($sql);
        $p_sql->bindValue(":palavra", $palavra);
        $p_sql->execute();


        

        $ar_vagas = array();
        while ($v_ret = $p_sql->fetchObject()) {
            array_push($ar_vagas, new VagaClass((array) $v_ret));
        }
       

        return $ar_vagas ?? null;

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


//##################################################################################

public function buscarVagaPorCodigoDAO($codigo) {
    try {


        $sql = "SELECT * FROM `tb_vaga` v
                inner join tb_empresa e on e.empr_cod = v.vaga_empresa_fk
                where vaga_codigo = :codigo";

        $p_sql = Conexao::getInstance($sql);
        $p_sql->bindValue(":codigo", $codigo);
        $p_sql->execute();


        

        $ar_vagas = array();
        while ($v_ret = $p_sql->fetchObject()) {
            array_push($ar_vagas, new VagaClass((array) $v_ret));
        }
       

        return $ar_vagas ?? null;

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


//##############################################################################
public function listarVagaPorEmpresassDAO($codigoEmpresa) {
    try {


        $sql = "SELECT * FROM `tb_vaga` WHERE   `vaga_empresa_fk` = :codigoEmpresa ";

        $p_sql = Conexao::getInstance($sql);
        $p_sql->bindValue(":codigoEmpresa", $codigoEmpresa);
        $p_sql->execute();



        $ar_vagas = array();
        while ($v_ret = $p_sql->fetchObject()) {
            array_push($ar_vagas, new VagaClass((array) $v_ret));
        }
       // Validacao::debugMe("Arquivo:" . __FILE__ . "\nFunção:" . __FUNCTION__ ."\nLinha:". __LINE__, $ar_vagas);
        return $ar_vagas ?? null;

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


//##############################################################################
    public function cadastrarNovaVagaDAO($oVaga) {

        $oEmpresa = unserialize($_SESSION['oEmpresa']);
        $p_sql =null;
       
        try {
                $sql = "INSERT INTO tb_vaga 
                (vaga_titulo, vaga_descricao, vaga_salario, vaga_quantidade, vaga_beneficios, vaga_horario, vaga_tipo_contratacao, vaga_empresa_fk, vaga_latitude, vaga_longitude) 
                VALUES 
                (:titulo, :descricao, :salario, :quantidade, :beneficios, :horario, :tipocontratacao, :empresa_fk, :vaga_latitude, :vaga_longitude);";
    
                // Prepare a declaração SQL
                $p_sql = Conexao::getInstance($sql);


                // Vincule os valores do objeto Projeto aos parâmetros da consulta
                $p_sql->bindValue(":titulo", $oVaga->titulo);
                $p_sql->bindValue(":descricao", $oVaga->descricao);
                $p_sql->bindValue(":salario", $oVaga->salario);
                $p_sql->bindValue(":quantidade", $oVaga->quantidade);
                $p_sql->bindValue(":beneficios", $oVaga->beneficios);
                $p_sql->bindValue(":horario", $oVaga->horario);
                $p_sql->bindValue(":tipocontratacao", $oVaga->tipocontratacao);
                $p_sql->bindValue(":empresa_fk", $oEmpresa->codigo);

                
                $p_sql->bindValue(":vaga_latitude", $oVaga->latitude);
                $p_sql->bindValue(":vaga_longitude", $oVaga->longitude);
                
                $p_sql->execute();


                return array(true, "Vaga cadastrada com sucesso");

        } catch (Exception $e) {
          
          
            $ar_erro = $this->levantarErroDAO($e->getMessage());



            $this->logException($e, $p_sql, "", "DAO_", "PROJETO");

            return $ar_erro;

        } finally {
            // Fecha a conexão no bloco finally
            if ($p_sql !== null) {
                $p_sql->closeCursor(); // Fecha o cursor
                $p_sql = null; // Atribui null à variável
            }
        }

    }


 
}


