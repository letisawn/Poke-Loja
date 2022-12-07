<?php
include('connect.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $nome = $_POST['nome'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $confirmasenha = $_POST['confirmasenha'];
    $genero = $_POST['genero'];


    if($senha==$confirmasenha) {
        mysqli_query($conn, "INSERT INTO usuarios (nome, username, email, telefone, senha, genero) VALUES ('$nome', '$username', '$email', '$telefone', '$senha', '$genero')");
        header("Location: login.php");
    }
}



?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poke loja/Cadastro</title>
    <link rel="stylesheet" href="css/estiloCadastro.css">
    <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <div class="titulo">Cadastre-se</div>
        <form method="post">
            <div class="detalhes-usuario">
                <div class="input-box">
                    <span class="detalhes">Nome completo</span>
                    <input type="text" placeholder="Insira seu nome completo" name="nome" required>
                </div>
                <div class="input-box">
                    <span class="detalhes">Nome de usuário</span>
                    <input type="text" placeholder="Insira seu nome de usuário" name="username" required>
                </div>
                <div class="input-box">
                    <span class="detalhes">Email</span>
                    <input type="email" placeholder="Insira seu email" name="email" required>
                </div>
                <div class="input-box">
                    <span class="detalhes">Número de telefone</span>
                    <input type="number" placeholder="Insira seu número de telefone" name="telefone" required>
                </div>
                <div class="input-box">
                    <span class="detalhes">Senha</span>
                    <input type="password" placeholder="Insira sua senha" name="senha" required>
                </div>
                <div class="input-box">
                    <span class="detalhes">Confirme a senha</span>
                    <input type="password" placeholder="Confirme a sua senha" name="confirmasenha" required>
                </div>
            </div>
            <div class="detalhes-genero">
                <input type="radio" name="genero" value="Masculino" id="dot-1">
                <input type="radio" name="genero" value="Feminino" id="dot-2">
                <input type="radio" name="genero" value="Prefiro não dizer" id="dot-3">
                <span class="titulo-genero">Gênero</span>
                <div class="categorias">
                    <label for="dot-1">
                        <span class="escolha um"></span>
                        <span class="genero">Masculino</span>
                    </label>
                    <label for="dot-2">
                        <span class="escolha dois"></span>
                        <span class="genero">Feminino</span>
                    </label>
                    <label for="dot-3">
                        <span class="escolha tres"></span>
                        <span class="genero">Prefiro não dizer</span>
                    </label>
                </div>
            </div>
            <div class="botao">
                <input type="submit" value="Cadastrar">
            </div>
        </form>
    </div>
</body>
</html>