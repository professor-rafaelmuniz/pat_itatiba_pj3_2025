<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login - PAT</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="view/js/jquery-3.7.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="view/main.css">





        <noscript>
  <p>O JavaScript está desabilitado no seu navegador. Para a melhor experiência, ative o JavaScript ou utilize um navegador que o suporte.</p>
</noscript>



    </head>
    
	<body>
        <div class="container header" id="topo">
            <nav id="navTopo" class="container navbar navbar-expand-md">
                <img src="view/pat.jpg" class="rounded float-start logo" alt="...">
                <div class="menu-title">
                <h1 style="font-size:18px;"><span>Posto de Atendimento<br>
                    ao Trabalhador - Itatiba</h1>
                </div>
                <div class="collapse navbar-collapse normal-justify" id="main-navigation">
                    <ul class="navbar-nav">
                    <li class="nav-item">
                    <a href="#mainContent" class="sr-only sr-only-focusable">Pular para o conteúdo</a>
                    </li>
                        <li class="nav-item">
                            <a class="btn btn-dark btn-header" href="http://rafaelmuniz.com.br/pat_itatiba/index.php" target="_self">Mural de Vagas</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark btn-header" href="<?php echo $this->getHash("Login=loginPage"); ?>">Para Empresas</a>
                        </li>
                    </ul>
                    <div class="menu-acessibilidade">&nbsp;&nbsp;&nbsp;&nbsp;
                <button id="increase-font" class="btn btn-secondary me-2 btn-sm">A+</button>
                <button id="decrease-font" class="btn btn-secondary btn-sm">A-</button>
                <button id="toggle-dark-mode" class="btn btn-secondary btn-sm">Fundo escuro</button>
            </div>
                </div>
                <div class="menu-title">
                    <span>Prefeitura</span>
                    <span>de Itatiba</span>
                </div>
                <img src="view/ita.jpg" class="rounded float-start logo" alt="Imagem Logo da Preteitura">
            </nav>
            
        </div>

    

  