<?php

$v_params = $this->getParams();
$mensagem = $v_params['mensagem'];



require_once("empr_i_topo.php");

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Mensagem</h1>
            <ol class="breadcrumb mb-4">
            </ol>
            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <?php
                    if ($mensagem[0] === true) {
                    ?>
                        <div class="card bg-success text-white mb-4">
                        <?php
                    } else {
                        ?>
                        <div class="card bg-danger text-white mb-4">
                            <?php
                    }
                            ?>
                            <div class="card-body">

                                <?php
                                echo $mensagem[1];
                                ?>
                            </div>
                        </div>
                </div>
            </div>
    </div>

        
    </main>
    <?php echo require_once("empr_i_rodape.php");
