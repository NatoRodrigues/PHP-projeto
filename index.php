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
    <script src="/js/script.js"></script>
    <link rel="icon" type="image/x-icon" href="/img/favicon-32x32.png">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
<div class="container-login">
            <div class="quadro-login">
                <img src="/img/Design sem nome (2).png" alt="logo">
        <form method="POST" class="inputs">
            <p>Email*</p>
                <input type="email" placeholder="Email" class="input" name="email" id= "email" onclick="acionaCampo()" onblur="desativaCampo()">
            <p>Senha*</p>
                <input type="password" placeholder="Senha" class="input" name="senha" onclick="acionaCampoSenha()" onblur="desativaCampoSenha()" id="senha1">

                <input type="submit" id="logar" name="logar" value="Logar">
                    <p id="cadastrar">Não possui credenciais? <a href="/cadastrar.php"><strong>Cadastre-se</strong></a></p>
                
                <div class="cadastre">
                </div>
            </div>

            </form>
        </div>

    <?php
    
    if(isset($_POST['email']))
    {
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if(!empty($email) && !empty($senha))
        {
            $u->conectar("projeto-login","localhost","root","");
            if($u->msgErro == "")
            {
                if($u->logar($email, $senha))
                {
                    header("location:areaPrivada.php");
                }
                else
                {
                    ?>
                    <div class="msg_erro">
                        Email e/ou senha estão incorretos
                    </div>
                    <?php
                }
            }
            else
            {
                ?>
                <div class="msg_erro">
                     <?php echo "ERRO ".$u->msgErro; ?>
                </div>
                <?php
            }
        }
        else
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