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
                        <h1 class="h3 mb-0 text-gray-800">Visualizar PG Orçamentos</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

            <div class="register-form">
                              <form action="visualizarPgOrcamentoTrabalho.php" method="get" data-toggle="validator" role="form">
                
                                  <div class="form-group">
                          <?php 
                          
                      include("../BD/conecta.php");
    				  $diaatual=date('d');
    				  $mesatual=date('m');
    				  $anoatual=date('Y');

                    $selecionaGiras=mysqli_query($conexao, "select * from orcamento where criado=1");
                          
                         ?> <label class="control-label">Informe um orcamento:</label> 
                         
                             <select id="idorcamento" name="idorcamento" class="custom-select" required>
        <option value="">Escolha um orçamento</option>
                         
                         <?php
                          
                          while($giras=mysqli_fetch_array($selecionaGiras)){ 
                              $id=$giras["id_orcamento"];
                              
                          
                          
                          ?>

                          <option value="<?php echo $giras["id_orcamento"];?>">
                            <?php echo $giras['id_orcamento']." - ".$giras['nome']." - ".$giras['valor']." - ".$giras['descricao'];?>
                          </option>

      <?php } ?>
      
    </select>
    <div class="invalid-feedback">Informe um orcamento</div>
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
    				  
    				  if(isset($_GET["idorcamento"])){
    				  $idorcamentopost=mysqli_real_escape_string($conexao, $_GET["idorcamento"]);
    				  }else{
    				      $idorcamentopost=0;
    				  }
    				  

$selecionaGiras=mysqli_query($conexao, "select * from orcamento where id_orcamento=$idorcamentopost");

if(isset($selecionaGiras)){
    
    ?>

    <table class="table">
  <thead>
    <tr>
        <th scope="col">Nome</th>
      <th scope="col">Telefone</th>
      <th scope="col">Email</th>
      <th scope="col">Valor</th>
      <th scope="col">Descricao</th>
      <th scope="col">Status</th>
      <th scope="col">Link PG</th>
    </tr>
    </thead>
    <tbody>
        <?php while($giras=mysqli_fetch_array($selecionaGiras)){ 
            
                    $idorcamentoMp=$giras["id_orcamento"];
        
        $selecionaMp=mysqli_query($conexao, "select * from mp_trabalho where id_orcamento=$idorcamentoMp");
        $mp=mysqli_fetch_array($selecionaMp);
        
        ?>
    <tr>
        <th scope="row"><?php echo $giras['nome'];?></th>
      <th scope="row"><?php echo $giras['telefone'];?></th>
      <th scope="row"><?php echo $giras['email'];?></th>
      <th scope="row">
<?php echo $giras['valor'];?>
      </th>
      <td>
          <?php echo $giras['descricao'];?>
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