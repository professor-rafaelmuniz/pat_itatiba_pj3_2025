<?php


class VagaController
{
    use ControllerTrait;

    /**
     * Não precisa do codigo do aluno porque está sendo resolvido no DAO
     */
        

    //#####################################################################


    public function cadastrarNovaVagaAction()
    {

        $retorno = (new VagaClass)->cadastrarNovaVaga($_POST);

        $o_view = new View('view/empr_mensagem.php');
        $o_view->setParams(array(
            'mensagem' => $retorno
        ));
        $o_view->showContents();
    }

//#####################################################################

    public function listarVagaPorEmpresassAction()
    {
        $oEmpresa = unserialize($_SESSION['oEmpresa']);

        $ar_vagas = (new VagaClass)->listarVagaPorEmpresass($oEmpresa->codigo);

        //Validacao::debugMe("Arquivo:" . __FILE__ . "\nFunção:" . __FUNCTION__ ."\nLinha:". __LINE__, $ar_vagas);
        $o_view = new View('view/empr_listarminhasvagas.php');
        $o_view->setParams(array(
            'ar_vagas' => $ar_vagas
        ));
        $o_view->showContents();
    }

    
//#####################################################################

public function buscarVagaAction()
{

    

    $palavra= $_POST['procurar'];



    $ar_vagas = (new VagaClass)->buscarVaga($palavra);


    $o_view = new View('view/site_listarvagas.php');
    $o_view->setParams(array(
        'ar_vagas' => $ar_vagas
    ));
    $o_view->showContents();
}


//#####################################################################

public function carregarTelacanditarAction()
{


    $codigovaga= $_GET['codigovaga'];
    $ar_vagas = (new VagaClass)->buscarVagaPorCodigo($codigovaga);
    $oVaga = $ar_vagas[0];

    $o_view = new View('view/site_candidatarvagas.php');
    $o_view->setParams(array(
        'ar_vagas' => $ar_vagas
    ));
    $o_view->showContents();
}   
    
}
