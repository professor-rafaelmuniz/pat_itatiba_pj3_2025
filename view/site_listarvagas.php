<?php require_once ("i_topo.php") ?>
<?php 

$v_params = $this->getParams();
$ar_vagas = $v_params['ar_vagas'];

?>

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <h2 class="display-6">Mural de Vagas</h2>
                    <div class="navbar-collapse" id="navbarSupportedContent">
                        <form class="d-flex"  method="post" action="<?php echo $this->getHash("Vaga=buscarVaga"); ?>" >
                            <input class="form-control me-2" type="search" placeholder="Digite para procurar..." aria-label="Search" id="procurar" name="procurar">
                            <button class="btn btn-outline-dark" type="submit">Procurar</button>
                          </form>
                    </div>
                </div>
            </nav>
            <div class="table-responsive">
                <table class="table table-hover vertical-align-mid">
                    <thead class="thead-light bg-dark">
                        <tr class="bg-dark bg-gradient">
                            <th scope="col"></th>
                            <th scope="col">Função</th>
                            <th scope="col">Empresa</th>
                            <th scope="col" class="align-mid">Vagas</th>
                            <th scope="col"></th><!-- Button column -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                    
                    if (empty($ar_vagas)) { ?>

                            <tr>
                                    <th scope="row"></th>
                                    <td colspan="3"> Nenhuma vaga encontrada</td>
                            </tr>
                   
                    <?php }else{
                    
                            foreach($ar_vagas as $vaga) {?>
                                <tr>
                                    <th scope="row"></th>
                                    <td><?php echo $vaga->titulo;?></td>
                                    <td><?php echo $vaga->oEmpresa->nome;?></td>
                                    <td class="align-mid"><?php echo $vaga->quantidade;?></td>
                                    <td><button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $vaga->codigo;?>">Ver Detalhes</button></td>
                                </tr>
                            <?php } 
                            } ?>  
                        
                    </tbody>
                </table>
            </div>

<!--
            <nav aria-label="...">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <span class="page-link">Anterior</span>
                    </li>
                    <li class="page-item active" aria-current="page">
                        <span class="page-link">1</span>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">Próxima</a>
                    </li>
                </ul>
            </nav>
                    -->
            <?php require_once("site_detalharvaga.php");?>



        </div>

        <script src="scripts.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	</body>
	
</html>