<?php foreach($ar_vagas as $vaga) {?>


            <!-- Details Modal -->
            <div class="modal fade" id="detailsModal<?php echo $vaga->codigo;?>" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Detalhes da Vaga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="card card-margin-bottom">
                            <div class="card-header">
                                Função
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $vaga->titulo;?></p>
                            </div>
                        </div>
                        <div class="card card-margin-bottom">
                            <div class="card-header">
                                Descrição
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $vaga->descricao;?> </p>
                            </div>
                        </div>
                        <div class="card card-margin-bottom">
                            <div class="card-header">
                                Remuneração
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $vaga->salario;?></p>
                            </div>
                        </div>
                        <!--
                        <div class="card card-margin-bottom">
                            <div class="card-header">
                                Requisitos
                            </div>
                            <div class="card-body">
                                <p class="card-text">Ensino Fundamental</p>
                            </div>
                        </div>
-->
                        <div class="card card-margin-bottom">
                            <div class="card-header">
                                Benefícios
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $vaga->beneficios;?></p>
                            </div>
                        </div>
                        <div class="card card-margin-bottom">
                            <div class="card-header">
                                Horário
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $vaga->horario;?></p>
                            </div>
                        </div>
                        <div class="card card-margin-bottom">
                            <div class="card-header">
                                Tipo de contratação
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo strtoupper($vaga->tipocontratacao);?></p>
                            </div>
                        </div>
                        <div class="card card-margin-bottom">
                            <div class="card-header">
                                Empresa
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo $vaga->oEmpresa->nome;?></p>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                Forma de contato
                            </div>
                            <div class="card-body">
                                <p class="card-text">Enviar currículo para <?php echo $vaga->oEmpresa->email;?> ou ligar para <?php echo $vaga->oEmpresa->telefone;?></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
                </div>
            </div>
            <?php } ?>  
           