<?php
include('connect.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    $result = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");
    $qtd = mysqli_num_rows($result);
    if($qtd == 1) {
        $user = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];
        header("Location: index.php");
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poke loja/Login</title>
    <link rel="stylesheet" href="css/estiloLogin.css">
    <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="login-area">
        <h1>Login</h1>
        <form method="post">
            <div class="login-form">
                <input type="email" name="email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="login-form">
                <input type="password" name="senha" required>
                <span></span>
                <label>Senha</label>
            </div>
            <input type="submit" value="Entrar">
            <div class="cadastro-link">
                Não tem uma conta?<a href="cadastro.php">Cadastre-se</a>
            </div>
        </form>
    </div>
</html>
