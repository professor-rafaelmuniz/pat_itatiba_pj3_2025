<?php

//################################
require_once("empr_i_topo.php");
//################################

?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Cadastrar nova vaga</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active"></li>
            </ol>
            <div class="row">
                <form method="POST" action="<?php echo $this->getHash("Vaga=cadastrarNovaVaga") ?>" onsubmit="return validarFormulario()" enctype="multipart/form-data">
                    <div class="card mb-4" style="padding:10px;">
                        <div class="col-xl-12 col-md-12">
                            <div class="row">
                                <div class="card-body col-md-12">
                                    <label for="fonte">Título da vaga</label>
                                    <input type="text" class="form-control" id="titulovaga" name="titulovaga" required>

                                </div>
                            </div>
                            <div class="row">
                                <div class="card-body col-md-5">
                                    <label for="resumo">Descrição da vaga</label>
                                    <textarea rows="6" cols="55" id="descricao" name="descricao"  class="form-control" required maxlength="500" oninput="contarCaracteres('descricao','contadordescricao')"></textarea>
                                    <small id="contadordescricao">0 caracteres digitados. Restam 500 caracteres. </small>
                                </div>
                                <div class="card-body col-md-5">
                                    <label for="fonte">Salário</label>
                                    <input type="text" class="form-control" name="salario" id="salario" maxlength="20" required>
                                    <label for="fonte">Quantidade de vagas</label>
                                    <input type="text" class="form-control" name="qtdvagas" id="qtdvagas" maxlength="20" required>
                                    <label for="fonte">Horário</label>
                                    <input type="text" class="form-control" name="horario" id="horario" maxlength="100" required>
                                </div>
                            </div>
                            <div class="row">

                                <div class="card-body col-md-5">
                                    <label for="resumo">Benefícios</label>
                                    <textarea rows="6" cols="55" id="beneficios" name="beneficios"  class="form-control" required maxlength="500" oninput="contarCaracteres('beneficios','contadorbeneficios')"></textarea>
                                    <small id="contadorbeneficios">0 caracteres digitados. Restam 500 caracteres. </small>
                                </div>
                                
                                <div class="card-body col-md-5">
                                    <label for="tipocontratacao">Tipo contratação</label>
                                    <select id="tipocontratacao" name="tipocontratacao" class="form-select" aria-label="Default select example">
                                        <option value="clt">CLT</option>
                                        <option value="pj">PJ</option>
                                        <option value="mei">MEI</option>
                                        <option value="outra">Outra</option>
                                    </select>
                                    <label for="fonte">Empresa</label>
                                    <input type="text" class="form-control" value="<?php echo  $oEmpresa->nome;?>" maxlength="20" disabled >
                                </div>
                            </div>
                           
                            

                           
                            <div class="card-body col-md-5">
                                <button type="submit" class="btn btn-primary"> Cadastrar vaga </button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </main>
    <script>
        function contarCaracteres(elemento, contador) {
            // Obter o elemento do textarea
            var textarea = document.getElementById(elemento);
            // Obter o elemento onde o contador será exibido
            var contador = document.getElementById(contador);
            // Obter o número de caracteres atualmente no textarea
            var numCaracteres = textarea.value.length;
            // Calcular o número de caracteres restantes
            var caracteresRestantes = 500 - numCaracteres;
            // Exibir o contador de caracteres
            contador.textContent = numCaracteres + " caracteres digitados. Restam " + caracteresRestantes + " caracteres.";
        }

        function validarFormulario() {

           return true;
        }
    </script>
    <?php require_once("view/empr_i_rodape.php") ?>