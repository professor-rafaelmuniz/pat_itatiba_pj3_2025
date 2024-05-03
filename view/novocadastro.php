<?php require_once "i_topo.php"; ?>
<?php

$v_params = $this->getParams();
$token = $v_params['token'];
$emailCadastro = $v_params['emailCadastro'];

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card rounded p-4 p-md-12">
                <div class="w-100" style="text-align:center;">
                    <h3 class="mb-4">Novo cadastro</h3>
                </div>
                <form method="post" action="<?php echo $this->getHash("Login=cadastrarNovoUsuario"); ?>" onsubmit="return verificarSenhasIguais();">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="label" for="emailCadastro">Email:</label>
                                <input type="text" name="emailCadastro" id="emailCadastro" value="<?php echo $emailCadastro; ?>" readonly class="form-control" style="background-color:#e0e0e0;">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="label" for="nome">Nome</label>
                                <input type="text" class="form-control" placeholder="Nome" name="nome" id="nome" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="label" for="dataNascimento">Data de Nascimento</label>
                                <input type="date" class="form-control" placeholder="dataNascimento" name="dataNascimento" id="dataNascimento" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="label" for="cpf">CPF</label>
                                <input type="text" class="form-control" placeholder="CPF" name="cpf" id="cpf" required maxlength="14" onblur="validarCPF(this)">
                                <span id="cpf-valido" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="label" for="estado">Estado</label>
                                <select id="estado" name="estado"class="form-control" required>
                                <option value="">Selecione um estado</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="label" for="cpf">Município</label>
                                <input type="text" class="form-control" placeholder="municipio" name="municipio" id="municipio" required maxlength="80" >
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="label" for="tipo_participante">Tipo de cadastro:</label>
                                <select class="form-control" name="tipo_participante" id="tipo_participante">
                                    <option value="participante" selected>Aluno(a) / Participante</option>
                                    <option value="orientador">Orientador(a) / Coorientador(a) / Avaliador(a)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="label" for="rede_escola" id="lblredeescola">Rede da Escola</label>
                                <select id="redeescola" name="redeescola"class="form-control">
                                <option value="privada">Privada</option>
                                <option value="publica">Publica</option>
                               
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                            <label class="label" for="tipoinscricao" id="lbltipoinscricao">Tipo de inscrição</label>
                                <select id="tipoinscricao" name="tipoinscricao"class="form-control" required>
                                <option value="fundamental">Alunos(as) 8° e 9° ano do fundamental</option>
                                <option value="medio">Ensino médio</option>
                                <option value="tecnicoate21">Ensino técnico até os 21 anos</option>
                                
                               
                            </select>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label class="label" for="instituicao">Instituição</label>
                                <input type="text" class="form-control" placeholder="Instituição" name="instituicao" id="instituicao">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                            <label class="label" for="curso" id="lbl_curso">Curso</label>
                                <input type="text" class="form-control" placeholder="Curso" name="curso" id="curso">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                            <label class="label" for="senhaCadastro">Senha</label>
                                <input type="password" class="form-control" placeholder="Senha" name="senhaCadastro" id="senhaCadastro" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                            <label class="label" for="confirmaSenha">Confirmar Senha</label>
                                <input type="password" class="form-control" placeholder="Confirmar Senha" name="confirmaSenha" id="confirmaSenha" required>
                                <div id="confirmaSenhaError" style="color: red;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <input type="hidden" name="emailCadastro" id="emailCadastro" value="<?php echo $emailCadastro; ?>">
                            <input type="hidden" name="token" id="token" value="<?php echo $token; ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Cadastrar</button> &nbsp; 
                            

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <button id="botaoVoltar" class="btn btn-secondary btn-lg">Voltar</button>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if (isset($mensagem)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensagem; ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<script>
function validarCPF(input) {

    // Remove caracteres não numéricos
    let cpf = input.value.replace(/\D/g, '');
    
    // Verifica se o CPF tem 11 dígitos
    if(cpf.length !== 11) {
        document.getElementById('cpf-valido').textContent = 'CPF inválido (1)';
        return false;
    }

    // Verifica se todos os dígitos são iguais, o que tornaria o CPF inválido
    if(/(\d)\1{10}/.test(cpf)) {
        document.getElementById('cpf-valido').textContent = 'CPF inválido (2)';
        return false;
    }

    // Calcula os dígitos verificadores
    let soma1 = 0;
    for(let i = 0; i < 9; i++) {
        soma1 += parseInt(cpf.charAt(i)) * (10 - i);
    }
    let d1 = (soma1 * 10) % 11;

    let soma2 = 0;
    for(let i = 0; i < 10; i++) {
        soma2 += parseInt(cpf.charAt(i)) * (11 - i);
    }
    let d2 = (soma2 * 10) % 11;



    // Verifica se os dígitos verificadores estão corretos
    if(d1 !== parseInt(cpf.charAt(9)) || d2 !== parseInt(cpf.charAt(10))) {
        document.getElementById('cpf-valido').textContent = 'CPF inválido (3)';
        alert("CPF Inválido");
        return false;
    } else {
        document.getElementById('cpf-valido').textContent = '';//valido
        return true;
    }
}



    $(document).ready(function() {

        $('#botaoVoltar').click(function() {
            window.history.back(); // Volta para a página anterior
        });

         $('form').submit(function() {
        // Verifica se as senhas são iguais
            if (!verificarSenhasIguais()) {
                return false; // Impede o envio do formulário se as senhas não forem iguais
            }

            // Verifica se o CPF é válido

            var cpfValido = validarCPF($('#cpf').val());

            if (!cpfValido) {
            // Exibe um alerta se o CPF for inválido
                return false; // Impede o envio do formulário se o CPF for inválido
            }
            alert("aqui3");

        // Se todas as validações passarem, o formulário é enviado normalmente
        return true;
        });



        $("#tipo_participante").change(function() {
            if ($(this).val() === "orientador") {
                $("#redeescola, #tipoinscricao, #lblredeescola,#lbltipoinscricao, #curso, #lbl_curso").hide();
            } else {
                $("#redeescola, #tipoinscricao, #lblredeescola,#lbltipoinscricao").show();
            }
        });

        $("#curso,#lbl_curso").hide();

        $("#tipoinscricao").change(function() {
            if ($(this).val() != "tecnicoate21") {
                $("#curso, #lbl_curso").hide();
            } else {
                $("#curso, #lbl_curso").show();
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
</script>
<?php require_once "i_rodape.php"; ?>