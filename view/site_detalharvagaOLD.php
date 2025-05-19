<?php foreach($ar_vagas as $vaga) { 
   
    
    ?>
    <!-- Details Modal -->
    <div class="modal fade" id="detailsModal<?php echo $vaga->codigo;?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Detalhes da Vaga</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card card-margin-bottom">
                        <div class="card-header">Função</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $vaga->titulo;?></p>
                        </div>
                    </div>
                    <div class="card card-margin-bottom">
                        <div class="card-header">Descrição</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $vaga->descricao;?> </p>
                        </div>
                    </div>
                    <div class="card card-margin-bottom">
                        <div class="card-header">Remuneração</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $vaga->salario;?></p>
                        </div>
                    </div>
                    <div class="card card-margin-bottom">
                        <div class="card-header">Benefícios</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $vaga->beneficios;?></p>
                        </div>
                    </div>
                    <div class="card card-margin-bottom">
                        <div class="card-header">Horário</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $vaga->horario;?></p>
                        </div>
                    </div>
                    <div class="card card-margin-bottom">
                        <div class="card-header">Tipo de contratação</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo strtoupper($vaga->tipocontratacao);?></p>
                        </div>
                    </div>
                    <div class="card card-margin-bottom">
                        <div class="card-header">Empresa</div>
                        <div class="card-body">
                            <p class="card-text"><?php echo $vaga->oEmpresa->nome;?></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">Forma de contato</div>
                        <div class="card-body">
                            <p class="card-text">Enviar currículo para <?php echo $vaga->oEmpresa->email;?> ou ligar para <?php echo $vaga->oEmpresa->telefone;?></p>
                        </div>
                    </div>
                    <!-- Adicionando o mapa aqui -->
                    <div id="map<?php echo $vaga->codigo;?>" style="height: 400px; width: 100%; margin-top: 20px;"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
<?php } 

?>

<script>
    // Função para carregar o mapa específico ao abrir o modal
    <?php foreach($ar_vagas as $vaga) { 

        ?>
        $('#detailsModal<?php echo $vaga->codigo;?>').on('shown.bs.modal', function () {
            var mapContainer = document.getElementById('map<?php echo $vaga->codigo;?>');
            mapContainer.innerHTML = ''; // Limpa o conteúdo anterior do mapa
            
            var lat = <?php echo (!isset($vaga->latitude) ? $vaga->latitude : -23.01481 );?>; // Latitude (exemplo: São Paulo)
            var lon = <?php echo (!isset($vaga->longitude) ? $vaga->longitude : -46.81704 );?>; //  // Longitude (exemplo: São Paulo)

            // Criar iframe do mapa
            var map = document.createElement('iframe');
            map.src = "https://www.openstreetmap.org/export/embed.html?bbox=" +
                (lon - 0.01) + "%2C" + (lat - 0.01) + "%2C" +
                (lon + 0.01) + "%2C" + (lat + 0.01) + "&layer=mapnik&marker=" +
                lat + "%2C" + lon;
            map.width = "100%";
            map.height = "400";
            map.style.border = "1px solid black";

            mapContainer.appendChild(map); // Adiciona o mapa ao modal
        });
    <?php } ?>
</script>

<script>
    let fontSize = 16; // Tamanho inicial da fonte
    const maxFontSize = 24; // Tamanho máximo permitido
    const minFontSize = 12; // Tamanho mínimo permitido

    document.getElementById('increase-font').addEventListener('click', function () {
        if (fontSize < maxFontSize) {
            fontSize += 2; // Aumenta a fonte em 2px
            document.body.style.fontSize = fontSize + 'px';
        }
    });

    document.getElementById('decrease-font').addEventListener('click', function () {
        if (fontSize > minFontSize) {
            fontSize -= 2; // Diminui a fonte em 2px
            document.body.style.fontSize = fontSize + 'px';
        }
    });
</script>
