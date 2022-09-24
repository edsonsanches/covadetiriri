
<?php

session_start();	

include("conecta.php");

$telefone=mysqli_real_escape_string($conexao, $_POST["inputEmail"]);
$email=mysqli_real_escape_string($conexao, $_POST["inputEmail2"]);
$idoraculo=mysqli_real_escape_string($conexao, $_POST["idoraculo"]);
$nome=mysqli_real_escape_string($conexao, $_POST["nome"]);
$valor=mysqli_real_escape_string($conexao, $_POST["valor"]);
//echo $telefone." - ".$email." - ".$idoraculo." - ".$nome." - ".$valor;


                          $selecionavagas=mysqli_query($conexao, "select count(*) from agendamentooraculo where id_oraculo=$idoraculo");
                          $vagas=mysqli_fetch_array($selecionavagas);
                          
                          $selecionavagas2=mysqli_query($conexao, "select vagas from oraculo where id_oraculo=$idoraculo");
                          $vagas2=mysqli_fetch_array($selecionavagas2);
                          
                          $vagasfim=$vagas2["vagas"]-$vagas["count(*)"];
                          
                          if($vagasfim<=0){
                              $_SESSION['ErroAgendamento']="Que pena, as vagas para esta dia finalizaram enquanto você estava no formulario!";
                              header("location: ../oraculo.php");
	                        exit;
                          }


$duplicidade=mysqli_query($conexao, "select email from agendamentooraculo where email='$email' and id_oraculo=$idoraculo");
$campoemail=mysqli_fetch_array($duplicidade);

if($email==$campoemail["email"]){
	$_SESSION['ErroAgendamento']="Este email já esta agendado para este dia";
	header("location: ../oraculo.php");
	exit;
}

mysqli_query($conexao, "INSERT INTO agendamentooraculo (id_oraculo, telefone, email, nome, valor) VALUES ($idoraculo, '$telefone', '$email', '$nome', '$valor')");
$_SESSION['AvisoHome']="Agendamento realizado com sucesso!";
header("location: ../index.php");


?>