


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
                //document.querySelector('.table').classList.add('table-dark');
                document.getElementById('navbar').classList.add('navbar-dark', 'bg-dark');

                document.getElementById('topo').classList.add('navbar-dark', 'bg-dark');
                document.getElementById('navTopo').classList.add('navbar-dark', 'bg-dark');
            } else {
                // Volta ao fundo claro
                document.querySelector("html").setAttribute('data-bs-theme', 'light');
                document.body.style.backgroundColor = '#FFF';
                document.body.style.color = '#000';

                // Remove o fundo escuro da tabela
                //document.querySelector('.table').classList.remove('table-dark');
                document.getElementById('navbar').classList.remove('navbar-dark', 'bg-dark')
                document.getElementById('topo').classList.remove('navbar-dark', 'bg-dark');
                document.getElementById('navTopo').classList.remove('navbar-dark', 'bg-dark');
            }
        });


