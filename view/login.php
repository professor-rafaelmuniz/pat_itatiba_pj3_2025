<?php


$title = "Acessar o sistema";
//require_once "view/common/i_head.php";
$v_params = $this->getParams();
if (isset($v_params["mensagem"])) {
	$mensagem = $v_params["mensagem"];
}
if (isset($v_params["mensagemCadastro"])) {
	$mensagemCadastro = $v_params["mensagemCadastro"];
}
if (isset($v_params["cadastradoComSucesso"])) {
	$cor = "alert alert-success";
} else {
	$cor = "alert alert-danger";
}
$token = $v_params['token'];
//######################################
require_once "i_topo.php";
//######################################
?>


<div class="container">
            <div class="position-relative">
                <div class="position-absolute top-0 start-50 translate-middle-x">
                    <div class="card text-center">
                        <div class="card-header">
                            Login para empresas
                        </div>
                        <div class="card-body">
						<form method="post" action="<?php echo $this->getHash("Login=validarAcesso"); ?>" onsubmit="return validarFormularioLogin()" id="formularioLogin">
                                <div class="mb-3">
                                    <label for="businessInputEmail" class="form-label">Email:</label>
									<input type="email" class="form-control" placeholder="E-mail" name="emailLogin" id="emailLogin" required maxlength="30">
								<div id="emailError" style="color: red;"></div>
                                </div>
                                <div class="mb-3">
                                    <label for="businessInputPassword" class="form-label">Senha:</label>
                                    <input type="password" class="form-control" placeholder="Senha" name="senhaLogin" id="senhaLogin" required maxlength="15">
									<div id="senhaError" style="color: red;"></div> 
                                </div>
                                <button type="submit" class="btn btn-secondary btn-lg btn-block" >Acessar</button>
								
                            </form>
                        </div>
						<?php if (isset($mensagem)) { ?>
									<div class="alert alert-danger" role="alert">
										<?php echo $mensagem; ?>
									</div>
								<?php } ?>
                    </div>
                    <div class="card text-center mt-4">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Sua empresa não está cadastrada?</h5>
                            <p class="card-text card-text-login">Se sua empresa deseja participar do PAT e poder acessar o sistema e publicar postos de trabalho em aberto, entre em contato pelo nosso email ou telefone.</p>
                            <p class="card-text">(11) 4534-0503 / (11) 4534-3334</p>
                            <p class="card-text">email@email.gov.br</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

	

<script>
   function validarEmail(email) {
    // Expressão regular para validar o e-mail
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}

function validarFormularioLogin() {
    var emailInput = $('#emailLogin');
    var emailError = $('#emailError');
    if (!validarEmail(emailInput.val())) {
        emailError.text('Por favor, insira um e-mail válido.');
        emailInput.focus();
        return false;
    } else {
        emailError.text('');
    }

    // Validação da senha (se necessário)
    // Aqui você pode adicionar outras validações conforme necessário

    // Se todas as validações passarem, o formulário será enviado
    return true;
}


$(document).ready(function(){
        $('#emailLogin').on('blur', function() {
            var emailError = $('#emailError');
            if (!validarEmail($(this).val())) {
                emailError.text('Por favor, insira um e-mail válido.');
            } else {
                emailError.text('');
            }
        });
        $('#emailCadastro').on('blur', function() {
            var emailError = $('#emailCadastroError');
            if (!validarEmail($(this).val())) {
                emailError.text('Por favor, insira um e-mail válido.');
            } else {
                emailError.text('');
            }
        });
        $('#emailCadastro').on('blur', function() {
        var emailError = $('#emailCadastroError');
        if (!validarEmail($(this).val())) {
            emailError.text('Por favor, insira um e-mail válido.');
        } else {
            emailError.text('');
        }
    });

    // Adicione um evento de 'blur' nos campos de senha para verificar se as senhas coincidem
    $('#confirmaSenha').on('blur', function() {
        verificarSenhasIguais();
    });

});



function verificarSenhasIguais() {
    var senha = $('#senhaCadastro').val();
    var confirmaSenha = $('#confirmaSenha').val();
    var senhaError = $('#confirmaSenhaError');

    if (senha !== confirmaSenha) {
        senhaError.text('As senhas são diferentes.');
        return false;
    } else {
        senhaError.text('');
        return true;
    }
}


   

    // Adicione um evento de 'blur' nos campos de senha para verificar se as senhas coincidem
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


<?php
//######################################
require_once "i_rodape.php";
//######################################


?>