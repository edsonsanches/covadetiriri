<script>alert('VOCÊ CONFIRMOU SUA PRESENÇA E CONCORDOU COM AS ORIENTAÇÕES LISTADAS NO E-MAIL!');location.href='index.php';</script>

<?php

session_start();

include("BD/conecta.php");

$id=mysqli_real_escape_string($conexao, $_GET["idagendamento"]);

mysqli_query($conexao, "UPDATE agendamento SET click=1 WHERE id_agendamento=$id");

?>