<?php
if(!isset($_SESSION)) {
  session_start();
}

include('connect.php');
$result = mysqli_query($conn, "SELECT * FROM usuarios");
$num_clientes = mysqli_num_rows($result);



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poke loja</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="shortcut icon" href="favicon/favicon.ico" type="image/x-icon">
</head>
<body>
  <header>
    <div class="logo-loja">
      <a href="index.php"><img src="imagens/Logo.png" width ="80px" alt="Logo da loja" ></a>
    </div>
    <div class="titulo-loja">
      <h1 class="titulo"> POKE LOJA </h1>
    </div>
    <nav>
      <?php if(isset($_SESSION['username'])) { ?>
      <div class="login-link">
          <a href="logout.php"><h2>Logout</h2></a>
      </div>
      <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 1) {?>
      <div class="cadastro-link">
          <a href="painel.php"><h2>Painel</h2></a>
      </div>
      <?php }
      } else { ?>
      <div class="login-link">
        <a href="login.php"><h2>Entre</h2></a>
      </div>
      <div class="cadastro-link">
        <a href="cadastro.php"><h2>Cadastre-se</h2></a>
      </div>
      <div class="faq-link">
        <a href="faq.html" target="_blank"><h2>FAQ</h2></a>
      </div>
      <?php } ?>
    </nav>
  </header> 

  <div class="galeria">
    <div style="margin: 50px 0 0 100px;">
        <h1>Gerenciar usuarios da loja</h1>
        <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Username</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Genero</th>
            <th>Ações</th>

        </thead>
        <tbody>
            <?php
            if ($num_clientes == 0) { ?>
                <tr>
                    <td colspan="6">Nenhum cliente foi cadastrado</td>
                </tr>
                <?php
            } else {
                while ($cliente = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $cliente['id']; ?></td>
                        <td><?php echo $cliente['nome']; ?></td>
                        <td><?php echo $cliente['username']; ?></td>
                        <td><?php echo $cliente['email']; ?></td>
                        <td><?php echo $cliente['telefone']; ?></td>
                        <td><?php echo $cliente['genero']; ?></td>
                        <td>
                            <a href="editar_cliente.php?id=<?php echo $cliente['id']; ?>">Editar</a>
                            <a href="deletar_cliente.php?id=<?php echo $cliente['id']; ?>">Deletar</a>
                        </td>
                    </tr>

            <?php }
            } ?>

        </tbody>
    </table>
    </div>

  </div>
</body>
</html>
