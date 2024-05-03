<?php


class LoginController
{
    use ControllerTrait;


    //################################################## 

    public function loginPageAction($retorno = null)
    {

        if (isset($_GET['p'])) {
            $token = $this->gerarToken();
            $_SESSION["token"] = $token;
            $o_view = new View('view/login.php');
            $o_view->setParams(array(
                'token' => $token,
                'mensagem' => $retorno
            ));
            $o_view->showContents();
        } else {
            $ar_vagas = (new VagaClass)->listarVagas();



            $o_view = new View('view/site_listarvagas.php');
            $o_view->setParams(array(
                'ar_vagas' => $ar_vagas
            ));
            $o_view->showContents();
        }
    }

    //##################################################

  




    //##################################################
    /**
     * Verifica se o usuário existe
     */
    public function validarAcessoAction()
    {


        $retorno = (new LoginClass())->validarAcessoClass($_POST);
        if ($retorno === true) { // Existe o login e a senha

            $this->redirecionaParticipante();
        } else {
            $this->loginPageAction($retorno); // é verdadeiro e string
        }
    }
    //##################################################
    /**
     * Se não tem usuário vai para a página de Login ou para a página inicial
     */
    public function treatLogin($goToLogin = false)
    {


        if ($this->redirecionaParticipante() === false) {


            if ($goToLogin) {

                $this->loginPageAction();
            } else {
                // RM - Entra aqui quando está acessando pela 1 vez
                $this->sairAction();
            }
        }
    }
    //##################################################
    /**
     * Verifica o tipo de usuário na Sessão e direciona para a página principal de cada um
     */
    private function redirecionaParticipante()
    {


        if (isset($_SESSION['oEmpresa'])) {

            (new EmpresaController())->painelAction();
        }


        return false;
    }


    public function sairAction()
    {
        (new LoginClass())->sair();
    }

    public function verifySession()
    {
        (new LoginClass())->verifySession();
    }

    public function forgotPasswordAction()
    {
        (new LoginClass())->forgotPassword();
    }

    public function loadErrorAction()
    {
        (new Application())->loadError();
    }

    public function carregarTelaErro()
    {
        (new Application())->loadError();
    }


    //###################################################








}
