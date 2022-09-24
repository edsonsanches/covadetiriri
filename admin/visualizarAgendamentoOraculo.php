<?php
include 'topo.php';
?>
<script>
function pergunta(){ 
   // retorna true se confirmado, ou false se cancelado
   return confirm('Tem certeza que deseja excluir?');
}
</script>
<center>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Visualizar Agendamentos Oraculo</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

            <div class="register-form">
                              <form action="visualizarAgendamentoOraculo.php" method="get" data-toggle="validator" role="form">
                
                                  <div class="form-group">
                          <?php 
                          
                      include("../BD/conecta.php");
    				  $diaatual=date('d');
    				  $mesatual=date('m');
    				  $anoatual=date('Y');

                    $selecionaGiras=mysqli_query($conexao, "select * from oraculo where mes>=$mesatual and ano>=$anoatual");
                          
                         ?> <label class="control-label">Informe um dia:</label> 
                         
                             <select id="idoraculo" name="idoraculo" class="custom-select" required>
        <option value="">Escolha um dia</option>
                         
                         <?php
                          
                          while($giras=mysqli_fetch_array($selecionaGiras)){ 
                              $id=$giras["id_oraculo"];
                              $giravagas=$giras["vagas"];
                          $selecionavagas=mysqli_query($conexao, "select count(*) from agendamentooraculo where id_oraculo=$id");
                          $vagas=mysqli_fetch_array($selecionavagas);
                          
                          $vagasfim=$giravagas-$vagas["count(*)"];
                          
                          
                          ?>

                          <option value="<?php echo $giras["id_oraculo"];?>">
                            <?php echo $giras['hora']." - ".$giras['dia']."/".$giras['mes']."/".$giras['ano']." - ".$vagasfim." Vagas";?>
                          </option>

      <?php } ?>
      
    </select>
    <div class="invalid-feedback">Informe um dia</div>
    </div>

				  <center>
                  <button type="submit" class="btn btn-primary">Listar</button><br>
                  </form>
				  
				  <br>

				  </center>
				   <?php
    				  
    				  $diaatual=date('d');
    				  $mesatual=date('m');
    				  $anoatual=date('Y');
    				  
    				  if(isset($_GET["idoraculo"])){
    				  $idoraculopost=mysqli_real_escape_string($conexao, $_GET["idoraculo"]);
    				  }else{
    				      $idoraculopost=0;
    				  }
    				  

$selecionaGiras=mysqli_query($conexao, "select * from agendamentooraculo where id_oraculo=$idoraculopost");

if(isset($selecionaGiras)){
    
    ?>
    <!---
        <?php// if(isset($_GET["idoraculo"])){ ?>
<center><a href="RelatorioAgendados.php?idgira=<?php// echo $idoraculopost; ?>" target="_blank">IMPRIMIR</a></center>
    <?php// }else{ } ?>

    --->
    <table class="table">
  <thead>
    <tr>
        <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Valor</th>
      <th scope="col">Aceita?</th>
      <th scope="col">Status</th>
      <th scope="col">Link PG</th>
        <th scope="col">Excluir</th>
    </tr>
    </thead>
    <tbody>
        <?php while($giras=mysqli_fetch_array($selecionaGiras)){ 
                    $idagendamentoMp=$giras["id_agendamentooraculo"];
        
        $selecionaMp=mysqli_query($conexao, "select * from mp_oraculo where id_agendamentooraculo=$idagendamentoMp");
        $mp=mysqli_fetch_array($selecionaMp);
        
        ?>
    <tr>
        <th scope="row"><?php echo $giras['nome'];?></th>
      <th scope="row"><?php echo $giras['telefone'];?></th>
      <th scope="row"><?php echo $giras['email'];?></th>
      <th scope="row">
          <?php
                              if($giras["valor"]=="com"){
                              ?>
                              <a style="background-color: green !important;">COM LINHAGEM</a>
                              <?php
                              }else{
                              ?>
                              <a style="background-color: red !important;">SEM LINHAGEM</a>
                              <?php
                              }
                              ?>
      </th>
      
      <td>
          
                              <form action="../BD/agendamentochegouOraculoBD.php" method="post">
                                  <input type="hidden" name="valor" value="<?php echo $giras["valor"]; ?>"/>
                              <input type="hidden" name="idagendamentooraculo" value="<?php echo $giras["id_agendamentooraculo"]; ?>"/>
                              <input type="hidden" name="email" value="<?php echo $giras["email"]; ?>"/>
                              
                              <input type="hidden" name="nome" value="<?php echo $giras["nome"]; ?>"/>
                              <?php
                              if($giras["confirmou"]==1){
                              ?>
                              <a style="background-color: green !important;">ACEITO!</a>
                              <?php
                              }else{
                              ?>
                              <button style="background-color: red !important;" type="submit" class="btn btn-primary">Aguardando...</button>
                              <?php
                              }
                              ?>
                            </form>
          
      </td>
      <td>
          
          <?php
          if($mp['status']=='pending' || $mp['status']=='CREATED'){ ?>
          <a style="background-color: yellow !important;"><?php echo $mp['status']; ?></a>
          <?php
          }else if($mp['status']=='approved'){
          ?>
          <a style="background-color: green !important;"><?php echo $mp['status']; ?></a>
          <?php }else{ ?>
          <a style="background-color: red !important;"><?php echo $mp['status']; ?></a>
          <?php } ?>
          </td>
          <td>
              <a><?php echo $mp['url']; ?></a>
              </td>

                <td>
          		<form method="post" action="../BD/cancelaragendamentoOraculoBD.php">
          		    <input type="hidden" name="idagendamentooraculo" value="<?php echo $giras["id_agendamentooraculo"]; ?>"/>
          		    
    <button style="background-color: red !important;" type="submit" class="btn btn-primary" onclick='return pergunta();'>X</button>
</form>
      </td>
    </tr>
      <?php } ?>
    </tbody>
    </table>
    
    <?php
}else{
    ?>
    
		<h3>Nenhuma gira cadastrada no momento</h3>
		
		<?php } ?>
				  
               
            </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

</center>
<?php
include 'rodape.php';
?>