<?php
$v_params = $this->getParams();



if (isset($v_params['mensagem'])){
    $mensagem = $v_params['mensagem'];
}else{
    $mensagem = "Por favor, tente novamente e caso o erro continue entre em contato com o(a)s responsáveis pelo e-mail xxxxxx";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro no Sistema</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center;
            padding: 50px;
            background-color: #f2f2f2;
            margin: 0;
        }
        .error-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #e74c3c;
        }
        p {
            color: #555;
            font-size: 18px;
        }
        img {
            max-width: 100%;
            height: auto;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="error-container">
        <img src="view/img/error.png" alt="Erro">
        <h1>Ops! Ocorreu um erro no sistema.</h1>
        <p><?php echo $mensagem;?></p>

        <?php 
        //Validacao::debugMe("Arquivo: ".__FILE__."\nFunção:".__FUNCTION__, "");
        //APAGAR ANTES DE IR PRA PRODUCAO
        ?>
    </div>
</body>
</html>