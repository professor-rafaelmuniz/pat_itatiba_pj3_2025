<?php


/**
* Essa classe é responsável por renderizar os arquivos HTML
* Diretório Pai - lib  
* @package Exemplo simples com MVC
* @author DigitalDev
* @version 0.1.1
*
* @Adaptado Rafael Muniz e Raul Souza @2019
*/
class View
{

    use Encryptor;
	use ErrosTrait;

    /**
	* Armazena o conteúdo HTML
	* @var string
	*/
	private $st_contents;
	
	/**
	* Armazena o nome do arquivo de visualização
	* @var string
	*/
	private $st_view;
	
	/**
	* Armazena os dados que devem ser mostrados ao reenderizar o 
	* arquivo de visualização
	* @var array
	*/
	private $v_params;
	
	/**
	* É possivel efetuar a parametrização do objeto ao instanciá-lo,
	* $st_view é o nome do arquivo de visualização a ser usado e 
	* $v_params são os dados que devem ser utilizados pela camada de visualização
	* 
	* @param string $st_view
	* @param array $v_params
	*/
	function __construct($st_view = null, $v_params = null) {
		if ($st_view != null) {
			try {
                $this->setView($st_view);
            } catch (Exception $e) {
                (new Application())->setSystemFlux();
                exit;
            }
        }
		$this->v_params = $v_params;
	}	
	
	/**
	* Define qual arquivo HTML deve ser renderizado
	* @param string $st_view
	* @throws Exception
	*/
	public function setView($st_view) {
		if (file_exists($st_view)) {
            $this->st_view = $st_view;
        } else {
			// GRAVAR NO BANCO O ERRO
			$erro = "Arquivo ".$st_view . " não encontrado.";
			(new LogErroDAO)->inserirLogErro($erro);
			echo $st_view;
		}
	}
	
	/**
	* Retorna o nome do arquivo que deve ser renderizado
	* @return string 
	*/
	public function getView() {
		return $this->st_view;
	}
	
	/**
	* Define os dados que devem ser repassados à view
	* @param array $v_params
	*/
	public function setParams(Array $v_params) {
		$this->v_params = $v_params;	
	}
	
	/**
	* Retorna os dados que foram repassados ao arquivo de visualização
	* @return array
	*/
	public function getParams() {
		return $this->v_params;
	}
	
	/**
	* Retorna uma string contendo todo 
	* o conteudo do arquivo de visualização
	* 
	* @return string
	*/
	private function getContents() {
		ob_start();
		if (isset($this->st_view)) {
			
			if (file_exists($this->st_view)) {
				require_once($this->st_view);
			}else{
					Validacao::debugMe("Arquivo:" . __FILE__ . "\nFunção:" . __FUNCTION__ ."\nLinha:". __LINE__, "ERRO");
			}
        }
		$this->st_contents = ob_get_contents();

		ob_end_clean();

		return $this->st_contents;	
	}
	
	/**
	* Imprime o arquivo de visualização 
	*/
	public function showContents() {
		echo $this->getContents();
		exit;
	}
}
