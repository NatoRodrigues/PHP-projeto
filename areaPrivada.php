

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="/img/favicon-32x32.png">
    <link rel="stylesheet" href="style.css">
    <title>Sessão iniciada</title>
</head>
<body>
<div class="container-login">
            <div class="quadro-login">
<img src="/img/Design sem nome (2).png" alt="logo">
<p>seja bem vindo</p>
<p><a href="">Acessar área </a>|<a href="sair.php">sair</a></p>


</div>
</div>

<?php
session_start();
if(!isset($_SESSION['id_usuario']))
{
    header("location:index.php");
    exit;
}

?>

</body>
</html>

