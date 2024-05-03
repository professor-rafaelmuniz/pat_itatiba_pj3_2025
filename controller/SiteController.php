<?php


class SiteController
{
    use ControllerTrait;

    /**
     * Não precisa do codigo do aluno porque está sendo resolvido no DAO
     */
        

    //#####################################################################


    public function listarVagasAction()
    {

        $ar_vagas = (new VagaClass)->listarVagas();


  
        $o_view = new View('view/site_listarvagas.php');
        $o_view->setParams(array(
            'ar_vagas' => $ar_vagas
        ));
        $o_view->showContents();
    }


    
}
