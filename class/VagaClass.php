<?php


class VagaClass // aluno
{
    use ErrosTrait;
    use ControllerTrait;

    private $codigo;
    private $titulo;
    private $descricao;
    private $salario;
    private $quantidade;
    private $beneficios;
    private $horario;
    private $tipocontratacao;
    private $oEmpresa;




    public function __construct($vaga = null)
    {


        $this->codigo                   = $vaga["vaga_codigo"] ?? null;
        $this->titulo                   = $vaga["vaga_titulo"] ?? null;
        $this->descricao                = $vaga["vaga_descricao"] ?? null;
        $this->salario                  = $vaga["vaga_salario"] ?? null;
        $this->quantidade               = $vaga["vaga_quantidade"] ?? null;
        $this->beneficios               = $vaga["vaga_beneficios"] ?? null;
        $this->horario                  = $vaga["vaga_horario"] ?? null;
        $this->tipocontratacao          = $vaga["vaga_tipo_contratacao"] ?? null;
        

        $this->oEmpresa       = new EmpresaClass($vaga);
    }

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
    }

    public function __get($atrib)
    {
        return $this->$atrib;
    }

  //######################################################################
    public function listarVagaPorEmpresass($codigo)
    {

        return (new  VagaDAO())->listarVagaPorEmpresassDAO($codigo);

    }

  //######################################################################

    public function listarVagas()
    {

        return (new  VagaDAO())->listarVagasDAO();

    }
//######################################################################

public function buscarVaga($palavra)
{

    return (new  VagaDAO())->buscarVagaDAO($palavra);

}

    
    
  //######################################################################

    public function cadastrarNovaVaga($dados)
    {

            $oVaga = new VagaClass();
                  
             
                // Verifica e atribui o campo 'proj_titulo'
                if (isset($dados['titulovaga'])) {
                    $oVaga->titulo = Validacao::limparDadosEntrada($dados['titulovaga']);
                } else {
                    $oVaga->titulo = null;
                }

                if (isset($dados['descricao'])) {
                    $oVaga->descricao = Validacao::limparDadosEntrada($dados['descricao']);
                } else {
                    $oVaga->descricao = null;
                }

                if (isset($dados['salario'])) {
                    $oVaga->salario = Validacao::limparDadosEntrada($dados['salario']);
                } else {
                    $oVaga->salario = null;
                }
                if (isset($dados['beneficios'])) {
                    $oVaga->beneficios = Validacao::limparDadosEntrada($dados['beneficios']);
                } else {
                    $oVaga->beneficios = null;
                }

                if (isset($dados['qtdvagas'])) {
                    $oVaga->quantidade = Validacao::limparDadosEntrada($dados['qtdvagas']);
                } else {
                    $oVaga->quantidade = null;
                }

                if (isset($dados['horario'])) {
                    $oVaga->horario = Validacao::limparDadosEntrada($dados['horario']);
                } else {
                    $oVaga->horario = null;
                }

                if (isset($dados['tipocontratacao'])) {
                    $oVaga->tipocontratacao = $dados['tipocontratacao'];
                } else {
                    $oVaga->tipocontratacao = null;
                }
               
                return (new  VagaDAO())->cadastrarNovaVagaDAO($oVaga);
                

            }    
        }          


