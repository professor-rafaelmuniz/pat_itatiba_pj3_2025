<?php require_once("i_topo.php") ?>
<?php

$v_params = $this->getParams();
$ar_vagas = $v_params['ar_vagas'];

?>

<div id="mainContent" class="container">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <h2 class="display-6">Mural de Vagas</h2>
            <div class="navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" method="post" action="<?php echo $this->getHash('Vaga=buscarVaga'); ?>">
                    <fieldset class="mt-2 d-flex">
                        <!--<legend>Formulário</legend>-->
                        <label for="procurar"><span style="font-size:1px;">.&nbsp;</span></label>
                        <input class="form-control me-2" type="search" placeholder="Digite para procurar..."  id="procurar" name="procurar">
                        <button class="btn btn-secondary" type="submit">Procurar</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </nav>

    <div class="row row-cols-1 row-cols-md-3 card-list">
        <?php
        if (empty($ar_vagas)) { ?>
        <div class="card">
            <div class="card-body">
                Nenhuma vaga encontrada.
            </div>
        </div>

        <?php } else {
        foreach ($ar_vagas as $vaga) { ?>
        <div class="col mb-4">
            <div class="card text-center h-100">
                <div class="card-header">
                    <?php echo $vaga->titulo; ?>
                </div>
                <div class="card-body">
                    <p class="card-text"><?php echo $vaga->oEmpresa->nome; ?></p>
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $vaga->codigo; ?>">Ver Detalhes</button>
                </div>  
                <div class="card-footer text-muted">
                    Vagas: <?php echo $vaga->quantidade; ?>
                </div>
            </div>
        </div>
        <?php }
        } ?>
    </div>
   
    <?php require_once("site_detalharvaga.php"); ?>

    <script>
        let fontSize = 16; // Tamanho inicial da fonte
        const maxFontSize = 24; // Tamanho máximo permitido
        const minFontSize = 12; // Tamanho mínimo permitido

        document.getElementById('increase-font').addEventListener('click', function() {
            if (fontSize < maxFontSize) {
                fontSize += 2; // Aumenta a fonte em 2px
                document.body.style.fontSize = fontSize + 'px';
            }
        });

        document.getElementById('decrease-font').addEventListener('click', function() {
            if (fontSize > minFontSize) {
                fontSize -= 2; // Diminui a fonte em 2px
                document.body.style.fontSize = fontSize + 'px';
            }
        });
    </script>

    <noscript>
        <p>O JavaScript está desabilitado no seu navegador. Para uma melhor experiência, por favor, habilite o JavaScript ou use um navegador que o suporte.</p>
    </noscript>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <noscript>
        <p>O JavaScript está desabilitado no seu navegador. Para uma melhor experiência, por favor, habilite o JavaScript ou use um navegador que o suporte.</p>
    </noscript>


    <script>
        // Inicializando o modo claro por padrão
        let darkModeEnabled = false;

        // Função para alternar o modo escuro
        document.getElementById('toggle-dark-mode').addEventListener('click', function() {
            darkModeEnabled = !darkModeEnabled; // Alterna entre claro e escuro

            if (darkModeEnabled) {
                // Aplica o fundo escuro
                document.querySelector("html").setAttribute('data-bs-theme', 'dark');
                document.body.style.backgroundColor = '#333';
                document.body.style.color = '#FFF';

                // Aplica o fundo escuro também na tabela
                document.getElementById('navbar').classList.add('navbar-dark', 'bg-dark');
                document.getElementById('topo').classList.add('navbar-dark', 'bg-dark');
                document.getElementById('navTopo').classList.add('navbar-dark', 'bg-dark');
            } else {
                // Volta ao fundo claro
                document.querySelector("html").setAttribute('data-bs-theme', 'light');
                document.body.style.backgroundColor = '#FFF';
                document.body.style.color = '#000';

                // Remove o fundo escuro da tabela
                document.getElementById('navbar').classList.remove('navbar-dark', 'bg-dark')
                document.getElementById('topo').classList.remove('navbar-dark', 'bg-dark');
                document.getElementById('navTopo').classList.remove('navbar-dark', 'bg-dark');
            }
        });
    </script>
    <noscript>
        <p>O JavaScript está desabilitado no seu navegador. Para uma melhor experiência, por favor, habilite o JavaScript ou use um navegador que o suporte.</p>
    </noscript>

    </body>

    </html>