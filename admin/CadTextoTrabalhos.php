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
                        <h1 class="h3 mb-0 text-gray-800">Cadastrar Texto Pagina TRABALHOS</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="register-form">
               <form action="../BD/textoBD.php" method="post" data-toggle="validator" role="form">
                   <input type="hidden" name="tipo" value="3"/>
                  <div class="form-group">
                     <input id="titulo" name="titulo" type="text" required class="form-control" placeholder="Informe aqui o titulo">
                  </div>
                  <div class="form-group">
                     <input id="texto" name="texto" type="text" required class="form-control" placeholder="Informe aqui o texto">
                  </div>


				  <center>
                  <button type="submit" class="btn btn-primary">Cadastrar</button><br>
				  
				  </center>
				  </form>
				  <br>
				   <?php
    				  include("../BD/conecta.php");

$selecionaTexto=mysqli_query($conexao, "select * from texto where tipo=3");

if(isset($selecionaTexto)){
    
    ?>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Titulo</th>
      <th scope="col">Texto</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>

    </tr>
    </thead>
    <tbody>
        <?php while($texto=mysqli_fetch_array($selecionaTexto)){ ?>
    <tr>
        <form action="../BD/editarTexto.php" method="post">
            <input type="hidden" name="tipo" value="3"/>
      <th scope="row"><input type="text" name="titulo" style="width: 200px" value="<?php echo $texto['titulo'];?>"/></th>
      <td><input type="text" name="texto" style="width: 400px" value="<?php echo $texto['texto'];?>"/></td>
            <td>
                    
              <input type="hidden" name="idtexto" value="<?php echo $texto['id_texto']; ?>"/>
              <button style="background-color: green !important;" type="submit" class="btn btn-primary">EDITAR</button>
              </form>
          
      </td>
            <td>
          <form action="../BD/excluirTexto.php" method="post">
              <input type="hidden" name="tipo" value="3"/>
              <input type="hidden" name="idtexto" value="<?php echo $texto['id_texto']; ?>"/>
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