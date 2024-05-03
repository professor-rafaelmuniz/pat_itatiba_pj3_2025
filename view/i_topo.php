<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login - PAT</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="view/js/jquery-3.7.1.min.js"></script>
        <link rel="stylesheet" type="text/css" href="view/main.css">
        <script type="module" src="view/scripts.js"></script>
    </head>
    
	<body>
        <div class="container header">
            <nav class="container navbar navbar-expand-md">
                <img src="view/pat.jpg" class="rounded float-start logo" alt="...">
                <div class="menu-title">
                    <span>Posto de Atendimento</span>
                    <span>ao Trabalhador - Itatiba</span>
                </div>
                <div class="collapse navbar-collapse normal-justify" id="main-navigation">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="btn btn-dark btn-header" href="<?php echo $this->getHash("Site=listarVagas"); ?>">Mural de Vagas</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-dark btn-header" href="<?php echo $this->getHash("Login=loginPage"); ?>">Para Empresas</a>
                        </li>
                    </ul>
                </div>
                <div class="menu-title">
                    <span>Prefeitura</span>
                    <span>de Itatiba</span>
                </div>
                <img src="view/ita.jpg" class="rounded float-start logo" alt="...">
            </nav>
        </div>

    
  