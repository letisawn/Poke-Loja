<?php
if (!isset($_SESSION)) {
    session_start();
}

include('connect.php');
$result = mysqli_query($conn, "SELECT * FROM pokemons");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pokemons.css">
    <title>Loja</title>
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
            <div class="container-pokemons">
                <?php $i = 0;
                while ($pokemon = mysqli_fetch_assoc($result)) {
                    if ($i / 3 == 1) echo '<br>' ?>
                    <div class="pokemon">
                        <a href="" class="table-link">
                            <table class="table">
                                <tr>
                                    <td><img src="<?php echo $pokemon['img'] ?>" width="250px"></td>
                                    <td>
                                        <h2><?php echo $pokemon['nome'] ?></h2>
                                        <p>- <?php echo $pokemon['valor'] ?></p>
                                        <p>- <?php echo $pokemon['tipos'] ?></p>
                                    </td>
                                </tr>
                            </table>
                        </a>
                    </div>
                <?php $i++;
                } ?>
            </div>
        </div>
    </main>
</body>

</html>