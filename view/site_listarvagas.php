<?php require_once("i_topo.php") ?>
<?php

$v_params = $this->getParams();
$ar_vagas = $v_params['ar_vagas'];

?>

<div id="mainContent"   class="container">
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h2 class="display-6">Mural de Vagas</h2>
            <div class="navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" method="post" action="<?php echo $this->getHash('Vaga=buscarVaga'); ?>">
                <fieldset>
                    <legend>Formulário</legend>
                    <label for="procurar"><span style="font-size:1px;">.&nbsp;</span></label>
                    <input class="form-control me-2" type="search" placeholder="Digite para procurar..."  id="procurar" name="procurar">
                    <button class="btn btn-outline-dark" type="submit">Procurar</button>
</fieldset>
                </form>
            </div>
        </div>
    </nav>
    <div class="table-responsive">
        <table class="table table-hover vertical-align-mid">
            <thead class="thead-light bg-dark">
                <tr class="bg-dark bg-gradient">
                    <th scope="col">Função</th>
                    <th scope="col">Empresa</th>
                    <th scope="col" class="align-mid">Vagas</th>
                    <th scope="col">Detalhar</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if (empty($ar_vagas)) { ?>

                    <tr>
                        <th scope="row" style="color:white;">&nbsp;.</th>
                        <td colspan="3"> Nenhuma vaga encontrada</td>
                    </tr>

                    <?php } else {

                    foreach ($ar_vagas as $vaga) { ?>
                        <tr>
                            <td><?php echo $vaga->titulo; ?></td>
                            <td><?php echo $vaga->oEmpresa->nome; ?></td>
                            <td class="align-mid"><?php echo $vaga->quantidade; ?></td>
                            <td><button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#detailsModal<?php echo $vaga->codigo; ?>">Ver Detalhes</button></td>
                        </tr>
                <?php }
                } ?>

            </tbody>
        </table>
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
                document.body.style.backgroundColor = '#333';
                document.body.style.color = '#FFF';

                // Aplica o fundo escuro também na tabela
                document.querySelector('.table').classList.add('table-dark');
                document.getElementById('navbar').classList.add('navbar-dark', 'bg-dark');

                document.getElementById('topo').classList.add('navbar-dark', 'bg-dark');
                document.getElementById('navTopo').classList.add('navbar-dark', 'bg-dark');
            } else {
                // Volta ao fundo claro
                document.body.style.backgroundColor = '#FFF';
                document.body.style.color = '#000';

                // Remove o fundo escuro da tabela
                document.querySelector('.table').classList.remove('table-dark');
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