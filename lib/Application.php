<?php

require_once "lib/trait/MyAutoLoader.php";


/**
 * @author DigitalDev
 * @adaptedBy Rafael Muniz e Raul Souza
 */


class Application
{

    use MyAutoLoader;
    use Encryptor;

    protected $st_controller; // Controller atual
    protected $st_action; // Action atual



    /**
     * Instancia classe Controller e executa o método solicitado
     * -- Verifica se o usuario está logado
     * -- Verifica se tem permissão pra página solicitada
     */
    public function setSystemFlux()
    {
      
       date_default_timezone_set('America/Sao_Paulo');

        $this->verifySession();
        $this->setControllerAndAction(); // seta controller e action passados no URL
        $this->treatLoginAndEmptyRequest($this->st_controller, $this->st_action);

        $controllerFile = $this->checkControllerFile($this->st_controller);
        if ($controllerFile !== false) {
            require_once $controllerFile;

            $o_class = $this->checkControllerClass($this->st_controller);

            if ($o_class !== false) {
                $controllerMethod = $this->checkControllerClassMethod($o_class, $this->st_action);
                if ($controllerMethod !== false) {
                    $o_class->$controllerMethod(); // *** VAI PARA O LOCAL DESEJADO
                } else {
                    $erro = "Controller:  " . $this->st_controller . " - Action:" . $this->st_action . " não encontrados.";
                    (new LogErroDAO)->inserirLogErro($erro);
                }
            } else {
                $erro = "Controller:  " . $this->st_controller . " - Action:" . $this->st_action . " não encontrados.";
                (new LogErroDAO)->inserirLogErro($erro);
            }
        }
        $erro = "Controller:  " . $this->st_controller . " - Action:" . $this->st_action . " não encontrados.";
        (new LogErroDAO)->inserirLogErro($erro);
        //Validacao::debugMe("Application: Controller or Action error", $_REQUEST);
        $this->loadError(); // algum dos arquivos não existe
    }

    /**
     * Verifica o status da sessão
     */
    private function verifySession()
    {

        // Verifica se existe alguma sessão valida ou cria uma nova
       
        (new LoginController())->verifySession();
    }

    /**
     * Verifica se os parametros de Controller e Action foram
     * passados via GET e carrega tais dados (codificados pela Encryptor)
     * nos respectivos atributos da classe
     */
    private function setControllerAndAction()
    {
        //########################################################
        // DESCOMENTAR  a proxima linha para mapear novas paginas
        //$this->calculateHash();
        //########################################################
        if (isset($_REQUEST["p"])) {
            $item = $this->getValue($_REQUEST["p"]);
            $permission = $this->checkAuthPage($_REQUEST["p"]);

            if ($item[0] != "" and $permission === true) {
                $this->st_controller = $item[0];
                $this->st_action = $item[1];
                
            }
        } else {
            $this->treatLoginAndEmptyRequest();
        }

    }

    /**
     * Tratar caso de login
     * Se quiser logar e já estiver logado
     * Se não especificar
     * Vai para página inicial do tipo de usuário
     */
    private function treatLoginAndEmptyRequest($controller = null, $action = null)
    {

        //Validacao::debugMe("Debug: ", $controller);

        if ($controller == "Login" and $action == "loginPage") {
            (new LoginController())->treatLogin(true);
        } elseif (!isset($_REQUEST["p"]) or empty($_REQUEST["p"])) {
            (new LoginController())->treatLogin();
        }
    }

    /**
     * Verifica se o arquivo de Controller existe
     */
    private function checkControllerFile($controller)
    {
        $st_controller_file = 'controller/' . ucfirst($controller) . 'Controller.php';
        if (file_exists($st_controller_file)) {
            clearstatcache();
            return $st_controller_file;
        } else {
            return false;
        }
    }

    /**
     * Verifica se existe a Classe dentro do arquivo Controller
     */
    private function checkControllerClass($controller)
    {

        //Validacao::debugMe("Application: Controller or Action error", $controller);
        $controllerClass = $controller . 'Controller';
        if (class_exists($controllerClass)) {
            return new $controllerClass;
        } else {
            return false;
        }
    }

    /**
     * Verifica se o método existe dentro da Classe Controller
     */
    private function checkControllerClassMethod($o_class, $action)
    {

        //Validacao::debugMe("Application: Controller or Action error", $o_class, $action);
        $controllerMethod = $action . 'Action';
        if (method_exists($o_class, $controllerMethod)) {
            return $controllerMethod;
        } else {
            return false;
        }
    }

    /**
     * Verificar as permissoes de acesso de acordo com o tipo de usuario
     * ex: if SESSAO[oCoordenador] está tentando mexer em VIEWS de usuário: BARRAR
     */
    private function checkAuthPage(&$item)
    {
        
        $permissionFromSystem = $this->getPermission($item);

       $type = null;
        if (isset($_SESSION['oComissao'])) {
                 $type = "1";
        } elseif (isset($_SESSION['oParticipante'])) {
                $type = "2";
        } elseif (isset($_SESSION['oOrientador'])) {
                $type = "3";
        }else {
            $type = "0"; // Consulta geral
        }



        if ($type == $permissionFromSystem or $permissionFromSystem == "0") {
            return true;
        } else {
            $oParticipante = unserialize($_SESSION['oParticipante']);
            $erro = "Acesso Negado. Arquivo: Application.php - Function: checkAuthPage - Link negado: ". $this->getValue($item)[0]. "=".$this->getValue($item)[1];
            (new LogErroDAO)->inserirLogErro($erro,$oParticipante->email);
            
            $o_view = new View('view/erro.php');
            $o_view->setParams(array(
                'mensagem' => 'Acesso negado. Entre em contato com o administrador do sistema.'
            ));
            $o_view->showContents();
            exit;
            return false;
        }
    }


    /**
     * Redireciona para a página de erro
     */
    public function loadError()
    {

        // GERAR LOG DE ERRO
        $o_view = new View('view/erro.php');
        $o_view->showContents();
    }

    /**
     * Redireciona a chamada HTTP para outra página
     * @param string $url
     */
    private function redirect($url)
    {
        header("Location: $url");
    }
}
