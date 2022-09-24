
<?php

session_start();	

$imagem = $_FILES["imagem"];

include("conecta.php");

    $ext = strtolower(substr($_FILES["imagem"]['name'],-4)); //Pegando extensão do arquivo
    if($ext=="jpeg"){
        $ext = ".jpeg";
    }
    $new_name = date("Ymd-His") . $ext; //Definindo um novo nome para o arquivo
    $dir = '../comprovantes/'; //Diretório para uploads 
    move_uploaded_file($_FILES["imagem"]['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    $mes=date('m');
$ano=date('Y');
mysqli_query($conexao, "INSERT INTO imagem (mes, ano, img) VALUES ($mes, $ano, '$new_name')");

        $_SESSION['GravaOk'] = "Comprovante anexado com sucesso!";
		header("location: ../portalCadastraComprovante.php");

?>