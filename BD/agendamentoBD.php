
<?php

session_start();	

include("conecta.php");

$telefone=mysqli_real_escape_string($conexao, $_POST["inputEmail"]);
$email=mysqli_real_escape_string($conexao, $_POST["inputEmail2"]);
$idgira=mysqli_real_escape_string($conexao, $_POST["idgira"]);
$nome=mysqli_real_escape_string($conexao, $_POST["nome"]);
$valor=mysqli_real_escape_string($conexao, $_POST["valor"]);
$entidade=mysqli_real_escape_string($conexao, $_POST["entidade"]);
$vez1=mysqli_real_escape_string($conexao, $_POST["simnao"]);


if($entidade==''){
    $entidade=1;
}

                          $selecionavagas=mysqli_query($conexao, "select count(*) from agendamento where id_gira=$idgira");
                          $vagas=mysqli_fetch_array($selecionavagas);
                          
                          $selecionavagas2=mysqli_query($conexao, "select vagas from gira where id_gira=$idgira");
                          $vagas2=mysqli_fetch_array($selecionavagas2);
                          
                          $vagasfim=$vagas2["vagas"]-$vagas["count(*)"];
                          
                          $selecionavagasentidade=mysqli_query($conexao, "select count(*) from agendamento where id_gira=$idgira and id_entidade=$entidade");
                          $vagasentidade=mysqli_fetch_array($selecionavagasentidade);
                          
                          $selecionavagas2entidade=mysqli_query($conexao, "select vagas from entidade where id_entidade=$entidade");
                          $vagas2entidade=mysqli_fetch_array($selecionavagas2entidade);
                          
                          $vagasfimentidade=$vagas2entidade["vagas"]-$vagasentidade["count(*)"];
                          
                          if($vagasfim<=0){
                              $_SESSION['ErroAgendamento']="Que pena, as vagas para esta gira finalizaram enquanto você estava no formulario!";
                              header("location: ../toque.php");
	                        exit;
                          }
                          
                                                    if($vagasfimentidade<=0 and $entidade!=1){
                              $_SESSION['ErroAgendamento']="Que pena, as vagas para essa entidade finalizaram enquanto você estava no formulario, por favor, agende com outra entidade que tenha vagas disponiveis!";
                              header("location: ../toque.php");
	                        exit;
                          }

$duplicidade=mysqli_query($conexao, "select email from agendamento where email='$email' and id_gira=$idgira");
$campoemail=mysqli_fetch_array($duplicidade);

if($email==$campoemail["email"]){
	$_SESSION['ErroAgendamento']="Este email já esta agendado para esta gira";
	header("location: ../toque.php");
	exit;
}

mysqli_query($conexao, "INSERT INTO agendamento (id_gira, telefone, email, nome, valor, id_entidade, 1vez) VALUES ($idgira, '$telefone', '$email', '$nome', '$valor', '$entidade', '$vez1')");
$_SESSION['AvisoHome']="Agendamento realizado com sucesso!";
header("location: ../index.php");


?>