<?php

require_once 'classes/usuarios.php';
$u = new Usuario;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="/img/favicon-32x32.png">
    <title>Cadastre-se</title>
    <script src="/js/script.js"></script>
    <script src="https://kit.fontawesome.com/47a5f71d76.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

<div class="container-login">
            <div class="quadro-login">
            <img src="/img/Design sem nome (2).png" alt="logo">
        <form method="POST" class="inputs">
                <p>Usuário*</p>
                <input type="text" placeholder="Nome" class="input" name="nome" onclick="acionaCampoUsuario()" onblur="desativaCampoUsuario()" id="usuario">

            <p>Telefone*</p>
                <input type="text" placeholder="telefone" class="input" name="telefone" onclick="acionaCampoFone()" onblur="desativaCampoFone()" id="fone">

            <p>Email*</p>
                <input type="email" placeholder="Email" class="input" name="email" onclick="acionaCampo()" onblur="desativaCampo()" id="email">
            
            <p>Senha*</p>
                <input type="password" placeholder="Senha" class="input" name="senha" onclick="acionaCampoSenha()" onblur="desativaCampoSenha()" id="senha1">

            <p>Confirme sua senha*</p>
                <input type="password" placeholder="Confirme a senha" class="input" name="confSenha" id="senha2" onclick="acionaCampoConfSenha()" onblur="desativaCampoConfSenha()">


            
                <input type="submit" id="logar" onclick="window.location.href=''" name="logar" value="Cadastrar">
                            <p id="cadastrar">Já possui conta? <a href="/index.php"><strong>Login</strong></a></p></a></div>
            </div>

        </form>
    </div>
    <?php

    if (isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email= addslashes($_POST['email']);
        $senha= addslashes($_POST['senha']);
        $confirmarSenha= addslashes($_POST['confSenha']);

        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
        {
            $u->conectar("projeto-login","localhost","root","");
            if($u->msgErro == "")// ta certo
            {
                if($senha == $confirmarSenha)
                {
                    if( $u->cadastrar($nome,$telefone,$email,$senha))
                    {
                        ?>
                        <div id="msg-sucesso">
                            Usuário cadastrado com sucesso 
                        </div>                 
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="msg_erro">
                            Email ja cadastrado
                        </div>                 
                        <?php
                    }
                }
                else
                 {
                    ?>
                    <div class="msg_erro">
                     As senhas não são iguais
                    </div>                 
                    <?php
                ;
                 }
             }
             else
            {

                ?>
                <div class="msg_erro">
                 <?php echo "Erro: ".$u->msgErro; ?>
                </div>                 
                <?php
            
            }
        }else
        {

            ?>
            <div class="msg_erro">
               Preencha todos os campos
            </div>                 
            <?php       
        }
    }

    ?>

</body>

</html>