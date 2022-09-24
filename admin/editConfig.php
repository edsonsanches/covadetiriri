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
                        <h1 class="h3 mb-0 text-gray-800">Editar Configurações</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="register-form">
				  <br>
				   <?php
    				  include("../BD/conecta.php");

$selecionaConfig=mysqli_query($conexao, "select * from config where id_config>=1");

if(isset($selecionaConfig)){
    
    ?>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Detalhe</th>
      <th scope="col">Config</th>
      <th scope="col">Editar</th>

    </tr>
    </thead>
    <tbody>
        <?php while($config=mysqli_fetch_array($selecionaConfig)){ ?>
    <tr>
      <th scope="row"><?php echo $config['id_config'];?></th>
      <td><?php echo $config['detalhe']; ?></td>
            <td>
                <form action="../BD/editarConfig.php" method="post">
<input type="text" name="config" value="<?php echo $config['config']; ?>"/>
          </td>
      <td>
                          <input type="hidden" name="idconfig" value="<?php echo $config['id_config']; ?>"/>
              <button style="background-color: green !important;" type="submit" class="btn btn-primary">EDITAR</button>
              </form>
      </td>
    </tr>
      <?php } ?>
    </tbody>
    </table>
    
    <?php
}else{
    ?>
    
		<h3>Nenhuma config cadastrada no momento</h3>
		
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