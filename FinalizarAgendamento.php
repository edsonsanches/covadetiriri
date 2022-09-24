<?php
include 'topo.php';

                
                				  include("BD/conecta.php");

$selecionaPrecoRitual=mysqli_query($conexao, "select * from config where id_config=10");
    $campoRitual=mysqli_fetch_assoc($selecionaPrecoRitual);
    
    
    $idgira=mysqli_real_escape_string($conexao, $_POST["idgira"]);
            
?>
  

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">Agendamento</h1>
            <nav aria-label="breadcrumb animated slideInDown">
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
<center>
<div style="padding: 20px">
				   <?php
    				  include("BD/conecta.php");

    ?>
    <br>
    
               <form style="padding: 20px" action="BD/agendamentoBD.php" method="post" data-toggle="validator" role="form">
                   
                   <input type="hidden" name="idgira" value="<?php echo $idgira;?>"/>

                   
                  <div class="form-group">
                     <label for="nome" class="control-label">Nome</label>
                     <input id="nome" class="form-control" placeholder="Nome" name="nome" type="text" required>
                  </div>
                  
                  
                 <div class="form-group">
                     <label for="inputValor" class="control-label">Presença ou Consulta?</label>
                    <select id="valor" name="valor" class="custom-select" onchange="apply($(this).val())" required>
                    <option value="">Escolha Consulta ou Presença</option>
                    <option value="consulta">Consulta</option>
                    <option value="presenca">Presença</option>
                    </select>
                        <div class="invalid-feedback">Informe uma opção</div>
                  </div>


<!-- Note que o atributo `data-type` deve ser o mesmo do `value` do select. -->



                 <div>
                     
                      <?php 
                          
                      include("BD/conecta.php");
    				  $diaatual=date('d');
    				  $mesatual=date('m');
    				  $anoatual=date('Y');

                    $selecionaEntidade=mysqli_query($conexao, "select * from entidade where id_entidade>1 and ativo=1 and vagas>0");
                    ?>
                     
                     <label for="inputValor" class="control-label"></label>
                    <select data-type="consulta" id="entidade" name="entidade" class="type">
                    <option value="">Escolha a entidade da sua consulta</option>
<?php
                          
                          while($entidades=mysqli_fetch_array($selecionaEntidade)){ 
                            $identidadesoma=$entidades["id_entidade"];
                            $vagasentidadesoma=$entidades["vagas"];
                          $selecionavagasentidade=mysqli_query($conexao, "select count(*) from agendamento where id_entidade=$identidadesoma");
                          $vagasentidade=mysqli_fetch_array($selecionavagasentidade);
                          
                          
                          
                          $vagasfimentidade=$vagasentidadesoma-$vagasentidade["count(*)"];
                         if($vagasfimentidade>0){
                          ?>

                          <option value="<?php echo $entidades["id_entidade"];?>">
                            <?php echo $entidades['entidade']." - R$".$entidades['valor'];?>
                          </option>

      <?php }} ?>
                    </select>
                        <div class="invalid-feedback">Informe uma entidade</div>
                  </div>
                  
                  

<div class="type" data-type="presenca">

    <a style="color:red">Nesta opção, você poderá participar, porem, não poderá se consultar, valor de R$<?php echo  $campoRitual['config'];?>,00.</a>
    </div>
                  
                  <br>
                  
				  <div class="form-group">
                     <label for="inputEmail" class="control-label">Telefone (ddd+numero) Somente numeros</label>
                     <input id="inputEmail" class="form-control" placeholder="Digite seu Telefone" name="inputEmail" type="number" required>
                  </div>
				  <div class="form-group">
                     <label for="inputEmailConfirm" class="control-label">Confirme o Telefone</label>
                     <input id="inputEmailConfirm" class="form-control" placeholder="Confirme seu Telefone" type="number" data-match="#inputEmail" data-error="Atenção! Os telefones não estão iguais!" required>
					 <div class="help-block with-errors" style="color: red;"></div>
                  </div>
                  				  <div class="form-group">
                     <label for="inputEmail2" class="control-label">E-mail</label>
                     <input id="inputEmail2" class="form-control" placeholder="Digite seu E-mail" name="inputEmail2" type="email" required>
                  </div>
				  <div class="form-group">
                     <label for="inputEmailConfirm2" class="control-label">Confirme o e-mail</label>
                     <input id="inputEmailConfirm2" class="form-control" placeholder="Confirme seu E-mail" type="email" data-match="#inputEmail2" data-error="Atenção! Os e-mails não estão iguais ou não é um e-mail valido!" required>
					 <div class="help-block with-errors" style="color: red;"></div>
                  </div>
                                    				  <div class="form-group">
                     <label for="inputSimnao" class="control-label">Primeira vez na casa?</label>
                    <select id="simnao" name="simnao" class="custom-select">
                    <option value="nao">Não</option>
                    <option value="sim">Sim</option>
                    </select>
                        <div class="invalid-feedback">Informe uma opção valida</div>
                  </div>
                  
    <br>
    <p style="color: green">Verifique seu e-mail (não esqueça da caixa de SPAM) pois assim que seu agendamento for aceito pelo dirigente da casa será enviado um link para confirmação.</p>
    <br>


				  
				                     
<button type="submit" class="btn btn-primary">Agendar</button><br>

                  

                  <br>
				  
				  
               </form>
</center>

<?php
include 'rodape.php';
?>