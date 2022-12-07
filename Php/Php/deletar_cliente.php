<?php
include('connect.php');

$id = intval($_GET['id']);
mysqli_query($conn, "DELETE FROM usuarios WHERE id = '$id'");

header("Location: painel.php");
