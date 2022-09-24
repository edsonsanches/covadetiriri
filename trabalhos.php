<?php
include 'topo.php';
?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">Trabalhos Espirituais</h1>
            <nav aria-label="breadcrumb animated slideInDown">
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
<center>
    <div style="padding: 20px">
<p>Fazemos trabalhos espirituais para diversos fins: financeiro, proteção, demanda, para o amor, para saúde e outros. Todos os trabalhos são realizados com ética e integridade, enviando foto do ritual posteriormente para os clientes.</p>

<p>Para fazer um trabalho espiritual, deve-se passar antes pela consulta com o <a href="oraculo.php">Oráculo de Exu</a>. Se o oráculo identificar que há possibilidades de feitura, procedemos com o orçamento, quando aprovado é marcada data para a realização dos trabalhos.</p>

				   <?php
    				  include("BD/conecta.php");

$selecionaTexto=mysqli_query($conexao, "select * from texto where tipo=3");
    while($textos=mysqli_fetch_array($selecionaTexto)){ 
        echo $textos['titulo'];
        echo $textos['texto'];
    }
    ?>

</div>
<h2>PAGAR ORÇAMENTO DE TRABALHO</h2>
          <form action="BD/pagarOrcamento.php" method="post">
              <a>Informe o ID do orçamento</a>
              <input type="text" name="idorcamento"/>
              <button style="background-color: green !important;" type="submit" class="btn btn-primary">PAGAR</button>
              </form>

</center>
<?php
include 'rodape.php';
?>