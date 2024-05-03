<?php

//################################
require_once("empr_i_topo.php");
//################################


$v_params = $this->getParams();
$ar_vagas = $v_params['ar_vagas'];



$oEmpresa = unserialize($_SESSION["oEmpresa"]);

?>

<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Lista das vagas divulgadas</h1>
                        <h5 style="color:red;"></h5>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Projetos
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Título</th>
                                            <th>Salário</th>
                                            <th>Descrição</th>
                                            <th>Benefícios</th>
                                            <th>Horário</th>
                                            <th>Quantidade de vagas</th>
                                            <th>Tipo de contratação</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Código</th>
                                            <th>Título</th>
                                            <th>Salário</th>
                                            <th>Descrição</th>
                                            <th>Benefícios</th>
                                            <th>Horário</th>
                                            <th>Quantidade de vagas</th>
                                            <th>Tipo de contratação</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

            <?php foreach($ar_vagas as $vaga) {?>

                                        <tr>
                                            <td><?php echo $vaga->codigo;?></td>
                                            <td><?php echo $vaga->titulo;?></td>
                                            <td><?php echo $vaga->salario?></td>
                                            <td><?php echo $vaga->descricao;?></td>
                                            <td><?php echo $vaga->beneficios;?></td>
                                            <td><?php echo $vaga->horario?></td>
                                            <td><?php echo $vaga->quantidade?></td>
                                            <td><?php echo $vaga->tipocontratacao?></td>

                                            
                                        </tr>
                                        
               <?php } ?>                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>




    <?php require_once("view/empr_i_rodape.php") ?>