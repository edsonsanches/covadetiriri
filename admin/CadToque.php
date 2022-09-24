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
                        <h1 class="h3 mb-0 text-gray-800">Cadastrar Toques</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

            <div class="register-form">
               <form action="../BD/giraBD.php" method="post" data-toggle="validator" role="form">
                  <div class="form-group">
                     <label for="input1Parte" class="control-label">1° parte</label>
                     <input id="1parte" name="1parte" type="text" required class="form-control" placeholder="Informe aqui a linha que irá estar na 1° parte">
                  </div>
                  <div class="form-group">
                     <label for="input2Parte" class="control-label">2° parte</label>
                     <input id="2parte" name="2parte" type="text" required class="form-control" placeholder="Informe aqui a linha que irá estar na 2° parte">
                  </div>

				  <div class="form-group">
                     <label for="inputResponsavel" class="control-label">Responsavel pelo toque</label>
                    <select id="responsavel" name="responsavel" class="custom-select" required>
                    <option value="">Escolha um responsavel pela toque</option>
                    <option value="Kimbanda Zelawapanzu">Kimbanda Zelawapanzu</option>
                    </select>
                        <div class="invalid-feedback">Informe um Kimbanda</div>
                  </div>
				  <div class="form-group">
                     <label for="dia" class="control-label">Dia</label>
                    <select id="dia" name="dia" class="custom-select" required>
                    <option value="">Escolha um dia valido</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                    <option value="13">13</option>
                    <option value="14">14</option>
                    <option value="15">15</option>
                    <option value="16">16</option>
                    <option value="17">17</option>
                    <option value="18">18</option>
                    <option value="19">19</option>
                    <option value="20">20</option>
                    <option value="21">21</option>
                    <option value="22">22</option>
                    <option value="23">23</option>
                    <option value="24">24</option>
                    <option value="25">25</option>
                    <option value="26">26</option>
                    <option value="27">27</option>
                    <option value="28">28</option>
                    <option value="29">29</option>
                    <option value="30">30</option>
                    <option value="31">31</option>
                    </select>
                    <div class="invalid-feedback">Informe um dia valido</div>
                  </div>
                  <div class="form-group">
                     <label for="mes" class="control-label">Mes</label>
                    <select id="mes" name="mes" class="custom-select" required>
                    <option value="">Escolha um mes valido</option>
                    <option value="1">Janeiro</option>
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option>
                    <option value="4">Abril</option>
                    <option value="5">Maio</option>
                    <option value="6">Junho</option>
                    <option value="7">Julho</option>
                    <option value="8">Agosto</option>
                    <option value="9">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                    </select>
                    <div class="invalid-feedback">Informe um mes valido</div>
                  </div>
                  <div class="form-group">
                     <label for="ano" class="control-label">Ano</label>
                    <select id="ano" name="ano" class="custom-select" required>
                    <option value="">Escolha um ano valido</option>
                    <option value="2022">2022</option>
                    </select>
                    <div class="invalid-feedback">Informe um ano valido</div>
                  </div>
                  <div class="form-group">
                     <label for="hora" class="control-label">Hora</label>
                    <select id="hora" name="hora" class="custom-select" required>
                    <option value="">Escolha uma hora valida</option>
                    <option value="08:00">08:00</option>
                    <option value="09:30">09:30</option>
                    <option value="12:00">12:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="18:00">18:00</option>
                    <option value="18:30">18:30</option>
                    <option value="19:00">19:00</option>
                    <option value="19:30">19:30</option>
                    <option value="20:00">20:00</option>
                    </select>
                    <div class="invalid-feedback">Informe um horario valido</div>
                  </div>
                                    <div class="form-group">
                     <label for="vagas" class="control-label">Vagas</label>
                    <select id="vagas" name="vagas" class="custom-select" required>
                    <option value="">Escolha um numero de vagas valido</option>
                    <option value="0">0</option>
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                    <option value="25">25</option>
                    <option value="30">30</option>
                    <option value="50">50</option>
                    <option value="70">70</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                    </select>
                    <div class="invalid-feedback">Informe uma quantidade de vagas valido</div>
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
    				  $selecionaGiras=mysqli_query($conexao, "select * from gira where  mes>=$mesatual and ano>=$anoatual order by mes");

$selecionaGiras=mysqli_query($conexao, "select * from gira where  mes>=$mesatual and ano>=$anoatual order by mes");

if(isset($selecionaGiras)){
    
    ?>
    
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Data</th>
      <th scope="col">1° parte</th>
      <th scope="col">2° parte</th>
      <th scope="col">Responsavel</th>
      <th scope="col">Excluir</th>
      <th scope="col">Vagas</th>
    </tr>
    </thead>
    <tbody>
        <?php while($giras=mysqli_fetch_array($selecionaGiras)){
        if($giras['mes']==$mesatual && $giras['dia']>= $diaatual){
        ?>
    <tr>
      <th scope="row"><?php echo $giras['hora']." - ".$giras['dia']."/".$giras['mes']."/".$giras['ano'];?></th>
      <td><?php echo $giras['1parte']; ?></td>
      <td><?php echo $giras['2parte']; ?></td>
      <td><?php echo $giras['responsavel']; ?></td>
      
      <td>
          
          <form action="../BD/excluirGira.php" method="post">
              <input type="hidden" name="idgira" value="<?php echo $giras['id_gira']; ?>"/>
              <button style="background-color: red !important;" type="submit" class="btn btn-primary" onclick='return pergunta();'>X</button>
              </form>
          
      </td>
            <td>
          
          <form action="../BD/editarVagas.php" method="post">
              <input type="hidden" name="idgira" value="<?php echo $giras['id_gira']; ?>"/>
              <input type="text" name="vagas" value="<?php echo $giras['vagas']; ?>"/>
              <button style="background-color: green !important;" type="submit" class="btn btn-primary">Atualizar vagas</button>
              </form>
          
      </td>
      <td><?php echo $giras['tipo']; ?></td>
    </tr>
      <?php }elseif($giras['mes']>$mesatual){
      ?>
              <tr>
      <th scope="row"><?php echo $giras['hora']." - ".$giras['dia']."/".$giras['mes']."/".$giras['ano'];?></th>
      <td><?php echo $giras['1parte']; ?></td>
      <td><?php echo $giras['2parte']; ?></td>
      <td><?php echo $giras['responsavel']; ?></td>
      

      
      <td>
          
          <form action="../BD/excluirGira.php" method="post">
              <input type="hidden" name="idgira" value="<?php echo $giras['id_gira']; ?>"/>
              <button style="background-color: red !important;" type="submit" class="btn btn-primary" onclick='return pergunta();'>X</button>
              </form>
          
      </td>
            <td>
          
          <form action="../BD/editarVagas.php" method="post">
              <input type="hidden" name="idgira" value="<?php echo $giras['id_gira']; ?>"/>
              <input type="text" name="vagas" value="<?php echo $giras['vagas']; ?>"/>
              <button style="background-color: green !important;" type="submit" class="btn btn-primary">Atualizar vagas</button>
              </form>
          
      </td>
    </tr>
    <?php  }
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