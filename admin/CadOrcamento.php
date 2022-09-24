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
                        <h1 class="h3 mb-0 text-gray-800">Cadastrar Orcamento</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

            <div class="register-form">
               <form action="../BD/orcamentoBD.php" method="post" data-toggle="validator" role="form">

                    <div class="form-group">
                     <label for="input1Parte" class="control-label">Nome</label>
                     <input id="nome" name="nome" type="text" required class="form-control" placeholder="Nome">
                  </div>
                  <div class="form-group">
                     <label for="input1Parte" class="control-label">Telefone</label>
                     <input id="telefone" name="telefone" type="text" required class="form-control" placeholder="Telefone">
                  </div>
                  <div class="form-group">
                     <label for="input1Parte" class="control-label">Email</label>
                     <input id="email" name="email" type="text" required class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <label for="input1Parte" class="control-label">Valor</label>
                     <input id="valor" name="valor" type="text" required class="form-control" placeholder="Valor">
                  </div>
                  <div class="form-group">
                     <label for="input1Parte" class="control-label">Descrição</label>
                     <input id="descricao" name="descricao" type="text" required class="form-control" placeholder="Descricao">
                  </div>

<br>
				  <center>
                  <button type="submit" class="btn btn-primary">Cadastrar</button><br>

				  </center>
				  </form>
				  <br>
				   <?php
    				  include("../BD/conecta.php");
    				  $diaatual=date('d');
    				  $mesatual=date('m');
    				  $anoatual=date('Y');


$selecionaGiras=mysqli_query($conexao, "select * from orcamento order by id_orcamento");

if(isset($selecionaGiras)){
    
    ?>
    
    <table class="table">
  <thead>
    <tr>
            <th scope="col">ID</th>
                  <th scope="col">Nome</th>
                        <th scope="col">Telefone</th>
                              <th scope="col">Email</th>
                                    <th scope="col">Valor</th>
                                          <th scope="col">Descricao</th>
      <th scope="col">Excluir</th>
    </tr>
    </thead>
    <tbody>
        <?php while($giras=mysqli_fetch_array($selecionaGiras)){
        
        ?>
    <tr>
      
      
      <td>
          <?php echo $giras['id_orcamento']; ?>
      </td>
      
      <td>
          <?php echo $giras['nome']; ?>
      </td>
      
      <td>
          <?php echo $giras['telefone']; ?>
      </td>
      
      <td>
          <?php echo $giras['email']; ?>
      </td>
      
      <td>
          <?php echo $giras['valor']; ?>
      </td>
      
      <td>
          <?php echo $giras['descricao']; ?>
      </td>
      
      <td>
          <form action="../BD/excluirGira.php" method="post">
              <input type="hidden" name="idorcamento" value="<?php echo $giras['id_orcamento']; ?>"/>
              <button style="background-color: red !important;" type="submit" class="btn btn-primary" onclick='return pergunta();'>X</button>
              </form>
      </td>
    </tr>
      <?php 
      } ?>
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