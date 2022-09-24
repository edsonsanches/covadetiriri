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
                        <h1 class="h3 mb-0 text-gray-800">Visualizar Agendamentos Toques</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

            <div class="register-form">
                              <form action="visualizarAgendamentoToque.php" method="get" data-toggle="validator" role="form">
                
                                  <div class="form-group">
                          <?php 
                          
                      include("../BD/conecta.php");
    				  $diaatual=date('d');
    				  $mesatual=date('m');
    				  $anoatual=date('Y');

                    $selecionaGiras=mysqli_query($conexao, "select * from gira where mes>=$mesatual and ano>=$anoatual");
                          
                         ?> <label class="control-label">Informe uma gira:</label> 
                         
                             <select id="idgira" name="idgira" class="custom-select" required>
        <option value="">Escolha uma gira</option>
                         
                         <?php
                          
                          while($giras=mysqli_fetch_array($selecionaGiras)){ 
                              $id=$giras["id_gira"];
                              $giravagas=$giras["vagas"];
                          $selecionavagas=mysqli_query($conexao, "select count(*) from agendamento where id_gira=$id");
                          $vagas=mysqli_fetch_array($selecionavagas);
                          
                          $vagasfim=$giravagas-$vagas["count(*)"];
                          
                          
                          ?>

                          <option value="<?php echo $giras["id_gira"];?>">
                            <?php echo $giras['hora']." - ".$giras['dia']."/".$giras['mes']."/".$giras['ano']." - ".$vagasfim." Vagas";?>
                          </option>

      <?php } ?>
      
    </select>
    <div class="invalid-feedback">Informe uma gira</div>
    </div>

				  <center>
                  <button type="submit" class="btn btn-primary">Listar</button><br>
                  </form>
				  
				  

				  </center>
				   <?php
    				  
    				  $diaatual=date('d');
    				  $mesatual=date('m');
    				  $anoatual=date('Y');
    				  
    				  if(isset($_GET["idgira"])){
    				  $idgirapost=mysqli_real_escape_string($conexao, $_GET["idgira"]);
    				  }else{
    				      $idgirapost=0;
    				  }
    				  

$selecionaGiras=mysqli_query($conexao, "select * from agendamento where id_gira=$idgirapost");

if(isset($selecionaGiras)){
    
    ?>
    
        <?php if(isset($_GET["idgira"])){ ?>
<center><a href="RelatorioAgendados.php?idgira=<?php echo $idgirapost; ?>" target="_blank">IMPRIMIR</a></center>
    <?php }else{ } ?>

    
    <table class="table">
  <thead>
    <tr>
        <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Tipo</th>
      <th scope="col">Aceita?</th>
      <th scope="col">Status PG</th>
      <th scope="col">LINK PG</th>
        <th scope="col">Excluir</th>
    </tr>
    </thead>
    <tbody>
        <?php while($giras=mysqli_fetch_array($selecionaGiras)){ 
        $idagendamentoStone=$giras["id_agendamento"];
        
        $selecionaStone=mysqli_query($conexao, "select * from pagarme where id_agendamento=$idagendamentoStone");
        $stone=mysqli_fetch_array($selecionaStone);
        
        ?>
    <tr>
        <th scope="row"><?php echo $giras['nome'];?></th>
      <th scope="row"><?php echo $giras['telefone'];?></th>
      <th scope="row"><?php echo $giras['email'];?></th>
      <th scope="row">
          <?php
                              if($giras["valor"]=="consulta"){
                              ?>
                              <a style="background-color: green !important;">CONSULTA</a>
                              <?php
                              }else{
                              ?>
                              <a style="background-color: red !important;">SEM CONSULTA</a>
                              <?php
                              }
                              ?>
      </th>
      
      <td>
          
                              <form action="../BD/agendamentochegouBD.php" method="post">
                                  <input type="hidden" name="valor" value="<?php echo $giras["valor"]; ?>"/>
                              <input type="hidden" name="idagendamento" value="<?php echo $giras["id_agendamento"]; ?>"/>
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
                                        if($giras["confirmou"]==1){
                              if($stone['status']=='CRIADO'){
                              ?>
                              <a style="background-color: yellow !important;">PENDENTE</a>
                              <?php
                              }if($stone['status']=='order.canceled'){
                              ?>
                              <a style="background-color: red !important;">CANCELADO</a>
                              <?php
                              }if($stone['status']=='order.paid'){
                              ?>
                              <a style="background-color: green !important;">PAGO</a>
                              <?php 
                              }if($stone['status']=='order.created'){
                              ?>
                              <a style="background-color: yellow !important;">PENDENTE</a>
                              <?php }
                              if($stone['status']=='order.payment_failed'){
                              ?>
                              <a style="background-color: blue !important;">PAGAMENTO FALHOU</a>
                              <?php }}else{ echo "N/D"; }?>
          </td>
          <td>
              <?php if($giras["confirmou"]==1){ ?>
              <a ><?php echo $stone['link'];?></a>
              <?php }else{ echo "N/D"; }?>
              </td>
                <td>
          		<form method="post" action="../BD/cancelaragendamentoBD.php">
          		    <input type="hidden" name="idagendamento" value="<?php echo $giras["id_agendamento"]; ?>"/>
          		    <input type="hidden" name="tipo" value="quimbanda"/>
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