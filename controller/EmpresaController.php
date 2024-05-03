<?php


class EmpresaController
{
    use ControllerTrait;
    /**
     * Não precisa do codigo do aluno porque está sendo resolvido no DAO
     */
    public function painelAction()
    {

        $o_view = new View('view/empr_painel.php');
        $o_view->showContents();
    }

    public function carregartelanovavagaAction()
    {

        $o_view = new View('view/empr_telanovavaga.php');
        $o_view->showContents();


    }
}
