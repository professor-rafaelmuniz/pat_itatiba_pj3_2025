<?php


$title = "Acessar o sistema";
//require_once "view/common/i_head.php";
$v_params = $this->getParams();
if (isset($v_params["mensagem"])) {
	$mensagem = $v_params["mensagem"];
}
if (isset($v_params["mensagemCadastro"])) {
	$mensagemCadastro = $v_params["mensagemCadastro"];
}
if (isset($v_params["cadastradoComSucesso"])) {
	$cor = "alert alert-success";
} else {
	$cor = "alert alert-danger";
}
$oVaga = $v_params["ar_vagas"];
$oVaga = $oVaga[0];


//######################################
require_once "i_topo.php";
//######################################
?>


<div class="container">
  <div class="d-flex justify-content-center">
    <div class="card w-100" style="max-width: 80%;">
      <div class="card-header text-center">
        Realizar o cadastro em uma vaga ofertada
      </div>
      <div class="card-body">
        <form method="post" action="#" id="formularioCadastro">
          <div class="row">
            <!-- Coluna 1 -->
            <div class="col-md-6">
              <div class="mb-3">
                <label class="form-label">Código da Vaga</label>
                <input type="text" class="form-control" name="codigo_vaga" value="<?php echo $oVaga->codigo;?>" style="background-color:#CCC;">
              </div>
              <div class="mb-3">
                <label class="form-label">Título da Vaga</label>
                <textarea class="form-control" name="descricao_vaga" rows="3"  style="background-color:#CCC;"><?php echo $oVaga->titulo;?></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label">Empresa</label>
                <input type="text" class="form-control" name="empresa" value="<?php echo $oVaga->oEmpresa->nome;?>" style="background-color:#CCC;">
              </div>
              
            </div>

            <!-- Coluna 2 -->
            <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Nome do Candidato</label>
                <input type="text" class="form-control" name="nome_candidato" required>
              </div>
              <div class="mb-3">
                <label class="form-label">RG</label>
                <input type="text" class="form-control" name="rg" required>
              </div>
              <div class="mb-3">
                <label class="form-label">CPF</label>
                <input type="text" class="form-control" name="cpf" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" class="form-control" name="endereco" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Idade</label>
                <input type="number" class="form-control" name="idade" required>
              </div>
            </div>
          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-success btn-lg">Candidatar-se</button>
          </div>
        </form>

        
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="modalSucesso" tabindex="-1" aria-labelledby="modalSucessoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-color: #d4edda; border-color: #c3e6cb;">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSucessoLabel" style="color: #155724;">✅ Sucesso!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body" style="color: #155724;">
        Cadastro na vaga realizado com sucesso.<br>
        Em breve a empresa entrará em contato com você.<br>
        Boa sorte!
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap Bundle JS (com Modal) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<script>
document.getElementById('formularioCadastro').addEventListener('submit', function(e) {
  e.preventDefault(); // Impede envio real

  // Limpa os campos do formulário
  this.reset();

  // Abre o modal de sucesso
  var modal = new bootstrap.Modal(document.getElementById('modalSucesso'));
  modal.show();
});
</script>


<?php
//######################################
require_once "i_rodape.php";
//######################################


?>