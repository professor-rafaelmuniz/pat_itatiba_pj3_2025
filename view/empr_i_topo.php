<?php

require_once "class/EmpresaClass.php";

//$oEvento = unserialize($_SESSION["oEvento"]);
$oEmpresa = unserialize($_SESSION["oEmpresa"]);
//Validacao::debugMe("Arquivo:" . __FILE__ . "\nFunção:" . __FUNCTION__ ."\nLinha:". __LINE__, $_SESSION);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistema de vagas PAT Itatiba</title>
    <link href="view/participante/css/style.min.css" rel="stylesheet" />
    <link href="view/participante/css/styles.css" rel="stylesheet" />
    <script src="view/participante/js/all.js"></script>
    <script src="view/vendor/tinymce/js/tinymce/tinymce.min.js"></script>

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="?p=769AF007083DD52">PAT Itatiba </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <div class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group" style="color:beige;font-size:11px;">
                <?php echo $oEmpresa->nome. "- Resp: ".  $oEmpresa->responsavel; ?>
            </div>
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo $this->getHash("Login=sair"); ?>">Sair</a></li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- MENU LATERAL -->
    <?php require_once("empr_i_menuLateral.php"); ?>