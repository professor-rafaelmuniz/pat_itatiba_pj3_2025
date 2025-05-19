<?php


Class LoginClass
{

    public function validarAcessoClass($post)
    {

        if ($this->checkCredenciais($post)) {
            return true;
        } else {
            return "E-mail ou senha inválido(s)";
        }
    }


    private function checkCredenciais($post)
    {

        if (array_key_exists("emailLogin", $post) and array_key_exists("senhaLogin", $post)) {
			$email = Validacao::limparDadosEntrada($post["emailLogin"]) ?? null;
            $senha = $post["senhaLogin"];

            if ($email and !is_null($senha)) {
                /*if ($this->checkParticipante($email, $senha)) { // Verificar participante
                    return true;
                }elseif ($this->checkOrientador($email, $senha)) { // Verifica Adminstrador
                    return true;
                }else
                */
                if ($this->checkComissao($email, $senha)) { // Verifica Adminstrador
                    return true;
                }
            }
        }

        return false;
    }


    /**
     * @param $email
     * @param $senha
     * @return bool
     * Valida usuário do tipo Aluno e inclui na SESSÃO
     */
      

    private function checkComissao(&$email, &$senha)
    {
        $oEmpresa = (new EmpresaDAO())->validarAcessoDAO($email); // SELECT banco trazer dados 

        if ($oEmpresa instanceof EmpresaClass) { // verifica se é to tipo participante
            if (password_verify($senha, $oEmpresa->senha)) {
                $_SESSION['oEmpresa'] = serialize($oEmpresa);

                return true;
            }
        }
        return false;// RM - CASO NAO ENCONTRE NO BANCO RETORNE NULL
    }

   

    /**
     * Desloga qualquer tipo de usuário e reinicia o sistema
     */
    public function sair() {
        //Validacao::debugMe("Arquivo:" . __FILE__ . "\nFunção:" . __FUNCTION__, $_SESSION);
        $_SESSION = array();
        if (session_status() == PHP_SESSION_ACTIVE) {
            session_unset();
            session_destroy();
        }
        (new LoginController())->loginPageAction();
    }


    /**
     * Verifica o status da sessão
     *
         0  PHP_SESSION_DISABLED if sessions are disabled.
         1  PHP_SESSION_NONE if sessions are enabled, but none exists.
         2  PHP_SESSION_ACTIVE if sessions are enabled, and one exists.
     *
     */
    public function verifySession() {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * @TODO
     * enviar email de recuperação de senha se o usuário exister
     * Implementar um select com todos os emails dos usuarios
     */
    public function forgotPassword() {
        $mensagem = "Se o e-mail informado estiver correto, verifique sua caixa de entrada para instruções";
        return true;
    }

}
