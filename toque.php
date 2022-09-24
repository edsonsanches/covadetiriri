<?php
include 'topo.php';

                
                				  include("BD/conecta.php");

$selecionaPrecoRitual=mysqli_query($conexao, "select * from config where id_config=10");
    $campoRitual=mysqli_fetch_assoc($selecionaPrecoRitual);

?>
  

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">Toque de Quimbanda</h1>
            <nav aria-label="breadcrumb animated slideInDown">
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
<center>
<div style="padding: 20px">
				   <?php
    				  include("BD/conecta.php");

$selecionaTexto=mysqli_query($conexao, "select * from texto where tipo=1");
    while($textos=mysqli_fetch_array($selecionaTexto)){ 
        echo $textos['titulo'];
        echo $textos['texto'];
    }
    ?>
    <br>
    
               <form style="padding: 20px" action="FinalizarAgendamento.php" method="post" data-toggle="validator" role="form">
                   
                   <div class="form-group">
                          <?php 
                          
                      include("BD/conecta.php");
    				  $diaatual=date('d');
    				  $mesatual=date('m');
    				  $anoatual=date('Y');

                    $selecionaGiras=mysqli_query($conexao, "select * from gira where mes>=$mesatual and ano>=$anoatual");
                          
                         ?> <label class="control-label">Giras validas no nosso calendario:</label> 
                         
                             <select id="idgira" name="idgira" class="custom-select" required>
        <option value="">Escolha uma gira com vagas</option>
                         
                         <?php
                          
while($giras=mysqli_fetch_array($selecionaGiras)){ 
                              $id=$giras["id_gira"];
                              $giravagas=$giras["vagas"];
                          $selecionavagas=mysqli_query($conexao, "select count(*) from agendamento where id_gira=$id");
                          $vagas=mysqli_fetch_array($selecionavagas);
                          
                          $vagasfim=$giravagas-$vagas["count(*)"];
                          
                                 if($anoatual>$giras['ano']){
        continue;   
      }if($mesatual>$giras['mes'] && $anoatual==$giras['ano']){
        continue; 
      }
      if($mesatual==$giras['mes'] && $diaatual>$giras['dia']){
        continue;  
      }
                          
                          if($vagasfim>0){
                          ?>

                          <option value="<?php echo $giras["id_gira"];?>">
                            <?php echo $giras['hora']." - ".$giras['dia']."/".$giras['mes']."/".$giras['ano']." - ".$vagasfim." Vagas";?>
                          </option>

      <?php }} ?>
      
    </select>
    <div class="invalid-feedback">Informe uma gira valida (com vagas)</div>
    </div>
    <br>
                   

				                     
<button type="submit" class="btn btn-primary">Agendar</button><br>

                  

                  <br>
				  
				  
               </form>
</center>

<?php
include 'rodape.php';
?>