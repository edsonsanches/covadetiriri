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
                        <h1 class="h3 mb-0 text-gray-800">Cadastrar Entidades</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="register-form">
               <form action="../BD/entidadeBD.php" method="post" data-toggle="validator" role="form">
                  <div class="form-group">
                     <input id="entidade" name="entidade" type="text" required class="form-control" placeholder="Informe aqui a entidade">
                  </div>


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

$selecionaEntidade=mysqli_query($conexao, "select * from entidade where id_entidade>1");

if(isset($selecionaEntidade)){
    
    ?>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Entidade</th>
      <th scope="col">Valor</th>
      <th scope="col">Vagas</th>
      <th scope="col">Ativa/Desativa</th>
      <th scope="col">Excluir</th>

    </tr>
    </thead>
    <tbody>
        <?php while($entidades=mysqli_fetch_array($selecionaEntidade)){ ?>
    <tr>
      <th scope="row"><?php echo $entidades['id_entidade'];?></th>
      <td><?php echo $entidades['entidade']; ?></td>
            <td>
          
          <form action="../BD/editarValorEntidade.php" method="post">
              <input type="hidden" name="identidade" value="<?php echo $entidades['id_entidade']; ?>"/>
              <input type="text" name="valor" value="<?php echo $entidades['valor']; ?>"/>
              <button style="background-color: green !important;" type="submit" class="btn btn-primary">Atualizar Valor</button>
              </form>
          
      </td>
                  <td>
          
          <form action="../BD/editarVagasEntidade.php" method="post">
              <input type="hidden" name="identidade" value="<?php echo $entidades['id_entidade']; ?>"/>
              <input type="text" name="vagas" value="<?php echo $entidades['vagas']; ?>"/>
              <button style="background-color: green !important;" type="submit" class="btn btn-primary">Atualizar Vagas</button>
              </form>
          
      </td>
            <td>
          <?php if($entidades['ativo']==1){ ?>
          <form action="../BD/ativaEntidade.php" method="post">
              <input type="hidden" name="identidade" value="<?php echo $entidades['id_entidade']; ?>"/>
              <input type="hidden" name="ativo" value="<?php echo $entidades['ativo']; ?>"/>
              <button style="background-color: red !important;" type="submit" class="btn btn-primary">DESATIVAR</button>
              </form>
          <?php }else{ ?>
                    <form action="../BD/ativaEntidade.php" method="post">
              <input type="hidden" name="identidade" value="<?php echo $entidades['id_entidade']; ?>"/>
              <input type="hidden" name="ativo" value="<?php echo $entidades['ativo']; ?>"/>
              <button style="background-color: green !important;" type="submit" class="btn btn-primary">ATIVAR</button>
              </form>
          <?php } ?>
          
      </td>

      
      <td>
          
          <form action="../BD/excluirEntidade.php" method="post">
              <input type="hidden" name="identidade" value="<?php echo $entidades['id_entidade']; ?>"/>
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
    
		<h3>Nenhuma entidade cadastrada no momento</h3>
		
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