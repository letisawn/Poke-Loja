<?php
if (!isset($_SESSION)) {
    session_start();
}

include('connect.php');
$result = mysqli_query($conn, "SELECT * FROM pokemons");

if($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $_POST['nome'];
    $tipos = $_POST['tipos'];
    $valor = $_POST['valor'];

    
    $pasta = "pokemons/";
    $nome_arquivo = $_FILES['imagem']['name'];
    $tipo = strtolower(pathinfo($nome_arquivo, PATHINFO_EXTENSION));
    $path = $pasta . $nome . "." . $tipo;
    move_uploaded_file($_FILES['imagem']['tmp_name'], $path);
    
    mysqli_query($conn, "INSERT INTO pokemons (img, nome, tipos, valor) VALUES('$path', '$nome', '$tipos', '$valor')");
    header("Location: painel_pokemon.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poke loja</title>
    <link rel="stylesheet" href="css/pokemons.css">
    <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
</head>

<body>
<header>
        <div class="logo"><a href="index.php"><img src="imagens/Logo.png" width="80px"></a></div>
        <h1>PokeLoja</h1>
        <ul class="nav-link">
        <?php if(isset($_SESSION['username'])) { ?>
            <li><a href="logout.php">Logout</a></li>
            <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {?>
            <li><a href="painel_pokemon.php">Painel</a></li>
            </div>
            <?php }
            } else { ?>
            <li><a href="login.php">Entre</a></li>
            <li><a href="cadastro.php">Cadastre-se</a></li>
            <li><a href="faq.html">FAQ</a></li>
            <?php } ?>
        </ul>
    </header>

    <main>
        <div class="container">
            <div style="margin: 50px 0 0 100px;">
                <h1>Cadastre um pokemon</h1>
                <form method="POST" enctype="multipart/form-data" action="">
                    <p>
                        <label for="">Selecione a imagem do pokemon: </label>
                        <input name="imagem" type="file">
                    </p>
                    <p>
                        Nome do pokemon:
                        <input type="text" name="nome">
                    </p>
                    <p>
                        Tipos do pokemon:
                        <input type="text" name="tipos">
                    </p>
                    <p>
                        Valor do pokemon:
                        <input type="number" name="valor" placeholder="R$">
                    </p>
                    <button name="upload" type="submit">Salvar</button>
                </form>
                <h1>Lista de Pokemons</h1>
                <table border="1" cellpadding="10">
                    <thead>
                        <th>Preview</th>
                        <th>Pokemon</th>
                        <th>Tipo</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </thead>
                    <tbody>
                        <?php
                        while ($pokemon = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><img height="50" src="<?php echo $pokemon['img']; ?>" alt=""></td>
                                <td><?php echo $pokemon['nome']; ?></td>
                                <td><?php echo $pokemon['tipos']; ?></td>
                                <td><?php echo "R$" . $pokemon['valor']; ?></td>
                                <th><a href="deletar_pokemon.php?id=<?php echo $pokemon['id']; ?>">Deletar</a></th>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>