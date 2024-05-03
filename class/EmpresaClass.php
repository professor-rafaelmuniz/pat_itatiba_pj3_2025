<?php


class EmpresaClass 
{
    private $codigo;
    private $nome;
    private $responsavel;
    private $telefone;
    private $endereco ;
    private $email;
    private $senha;



    public function __construct($empresa = null)
    {
        $this->codigo           = $empresa["empr_cod"] ?? null;
        $this->nome             = $empresa["empr_nome"] ?? null;
        $this->responsavel      = $empresa["empr_responsavel"] ?? null;
        $this->telefone         = $empresa["empr_telefone"] ?? null;
        $this->endereco         = $empresa["empr_endereco"] ?? null;
        $this->email            = $empresa["empr_email"] ?? null;
        $this->senha            = $empresa["empr_senha"] ?? null;
      
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

public function verificarCadastroPeloEmail($emailCadastro){
  return (new EmpresaDAO)->verificarCadastroPeloEmailDAO($emailCadastro);
}

//######################################################################
  
















}
