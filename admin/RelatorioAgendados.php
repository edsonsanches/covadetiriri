<script>
function loadRelatorio() {
  window.print();
  
}
</script>
<body onload="loadRelatorio()">
<?php	
session_start();	

if(isset($_SESSION['usuario'])){}else{
	header("Location:index.php");
}
include_once("../BD/conecta.php");

	$idgira=mysqli_real_escape_string($conexao, $_GET["idgira"]);
	
	
	    $logo="logo.png";

	
	$result_transacoes = "SELECT * FROM gira where id_gira=$idgira";
	$gira = mysqli_query($conexao, $result_transacoes);
	
	$result_agendados = "SELECT * FROM agendamento where id_gira=$idgira";
	$resultado_agendados = mysqli_query($conexao, $result_agendados);
	
	$giras=mysqli_fetch_assoc($gira);

	$html= '<center><div id=print class=conteudo> <img st src=../img/'.$logo.' width=100 height=100><p><strong>LISTA AGENDADOS GIRA:</strong> '.$giras['hora']." - ".$giras['dia']."/".$giras['mes']."/".$giras['ano']." - ";
	$html .= '<strong>GIRA DE:</strong> '.$giras['1parte']." - ".$giras['2parte']."</p>";
	$html .= '<table border=1 style="width: 100%; border: thin;">';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>#</th>';
	$html .= '<th>NOME</th>';
	$html .= '<th>1° VEZ?</th>';
	$html .= '<th>ENTIDADE</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody></div></center>';
	

	$incremento=0;

	while($row_agendados = mysqli_fetch_assoc($resultado_agendados)){
	    $idatualentidade=$row_agendados['id_entidade'];
	    
	    	$result_entidade = "SELECT * FROM entidade where id_entidade=$idatualentidade";
	$resultado_entidade = mysqli_query($conexao, $result_entidade);
	$entidades=mysqli_fetch_assoc($resultado_entidade);
	
	    $incremento=$incremento+1;
		$html .= '<tr><td>'.$incremento . "</td>";
		$html .= '<td>'.$row_agendados['nome']."</td>";
		$html .= '<td>'.$row_agendados['1vez']."</td>";
		$html .= '<td>'.$entidades['entidade'].'</td></tr>';
	}
	    
	
	
	
	$html .= '</tbody>';
	$html .= '</table>';
	

echo $html;

?>
</body>