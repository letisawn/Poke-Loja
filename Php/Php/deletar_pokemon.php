<?php
$id = $_GET['id'];

include('connect.php');
mysqli_query($conn, "DELETE FROM pokemons WHERE id='$id'");
header("Location: painel_pokemon.php");

?>