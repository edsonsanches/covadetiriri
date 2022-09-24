<?php
include 'topo.php';

                
                				  include("BD/conecta.php");

$selecionaPrecoSemLinhagem=mysqli_query($conexao, "select * from config where id_config=13");
    $campoPrecoSem=mysqli_fetch_assoc($selecionaPrecoSemLinhagem);
    
    $selecionaPrecoComLinhagem=mysqli_query($conexao, "select * from config where id_config=12");
    $campoPrecoCom=mysqli_fetch_assoc($selecionaPrecoComLinhagem);
    
    
    $idoraculo=mysqli_real_escape_string($conexao, $_POST["idoraculo"]);
            
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
    
               <form style="padding: 20px" action="BD/agendamentoOraculoBD.php" method="post" data-toggle="validator" role="form">
                   
                   <input type="hidden" name="idoraculo" value="<?php echo $idoraculo;?>"/>

                   
                  <div class="form-group">
                     <label for="nome" class="control-label">Nome</label>
                     <input id="nome" class="form-control" placeholder="Nome" name="nome" type="text" required>
                  </div>
                  
                  
                 <div class="form-group">
                     <label for="inputValor" class="control-label">Linhagem?</label>
                    <select id="valor" name="valor" class="custom-select" onchange="apply2($(this).val())" required>
                    <option value="">Escolha com ou sem Linhagem</option>
                    <option value="com">c/Linhagem</option>
                    <option value="sem">s/Linhagem</option>
                    </select>
                        <div class="invalid-feedback">Informe uma opção</div>
                  </div>


<!-- Note que o atributo `data-type` deve ser o mesmo do `value` do select. -->



                  
<div class="type" data-type="com">

    <a style="color:green">Nessa opção você poderá perguntar sobre a sua linhagem (Exus) - R$<?php echo  $campoPrecoCom['config'];?>,00.</a>
    </div>
    
<div class="type" data-type="sem">

    <a style="color:red">Não inclui a possibilidade de perguntar sobre seus Exus - R$<?php echo  $campoPrecoSem['config'];?>,00.</a>
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