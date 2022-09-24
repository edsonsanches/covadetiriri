    <!-- Footer Start -->
    
                <?php
                				  include("BD/conecta.php");

$selecionaInsta=mysqli_query($conexao, "select * from config where id_config=1");
    $campoInsta=mysqli_fetch_assoc($selecionaInsta);
    
    $selecionaEndereco=mysqli_query($conexao, "select * from config where id_config=2");
    $campoEndereco=mysqli_fetch_assoc($selecionaEndereco);
    
    $selecionaEmail=mysqli_query($conexao, "select * from config where id_config=3");
    $campoEmail=mysqli_fetch_assoc($selecionaEmail);
    
    $selecionaFacebook=mysqli_query($conexao, "select * from config where id_config=4");
    $campoFacebook=mysqli_fetch_assoc($selecionaFacebook);
    
    $selecionaYoutube=mysqli_query($conexao, "select * from config where id_config=5");
    $campoYoutube=mysqli_fetch_assoc($selecionaYoutube);
    
    $selecionaBotaoWhats=mysqli_query($conexao, "select * from config where id_config=6");
    $campoBotaoWhats=mysqli_fetch_assoc($selecionaBotaoWhats);
    
    
            ?>
    
    <section id="contato">
    <div class="container-fluid bg-secondary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-4 col-md-6">
                    <h4 class="text-uppercase mb-4">Contato</h4>
                    <div class="d-flex align-items-center mb-2">
                        <div class="btn-square bg-dark flex-shrink-0 me-3">
                            <span class="fa fa-map-marker-alt text-primary"></span>
                        </div>
                        <span><?php echo  $campoEndereco['config'];?></span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <div class="btn-square bg-dark flex-shrink-0 me-3">
                            <span class="fab fa-instagram" style="color: red !important"></span>
                        </div>
                        <span>@<?php echo  $campoInsta['config'];?></span>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="btn-square bg-dark flex-shrink-0 me-3">
                            <span class="fa fa-envelope-open text-primary"></span>
                        </div>
                        <span><?php echo  $campoEmail['config'];?></span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">

                </div>
                <div class="col-lg-4 col-md-6">
                    <h1>Redes Sociais</h1>
                    <div class="d-flex pt-1 m-n1">
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href="https://www.facebook.com/<?php echo  $campoFacebook['config'];?>"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href="https://www.youtube.com/c/<?php echo  $campoYoutube['config'];?>"><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-lg-square btn-dark text-primary m-1" href="https://www.instagram.com/<?php echo  $campoInsta['config'];?>/"><i class="fab fa-instagram"></i></a>
                    </div>
                    <a href="<?php echo  $campoBotaoWhats['config'];?>"><img src="img/whats.png" alt="WHATSAPP" style="padding: 15px; width: 100px"></a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Cova de Tiriri</a>, Todos direitos reservados. <a  href="/login/index.php">(R)</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. 
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                        <br>Distributed By: <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>***/-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

<script>

function load() {
  apply2('none');
}


  
function apply2(type) {
  $('.type[data-type="com"]').hide().removeAttr('required'); // Esconde todos os campos.
  $('.type[data-type="sem"]').hide().removeAttr('required');
  
  $(`.type[data-type="${type}"]`).show().attr('required', 'req');
   // Mostra somentes aqueles que possuem o atributo `data-type` com o valor selecionado.
 
}

// Esconde todos os campos, mostrando somente a `div` de fallback.
apply2('none');

$('#valor').on('change', function() {
  // Faz com que o campo mostrado seja o do valor do select:

  apply2($(this).val());
      
  
});

</script>

<script>

function load() {
  apply('none');
}


  
function apply(type) {
  $('.type[data-type="consulta"]').hide().removeAttr('required'); // Esconde todos os campos.
  $('.type[data-type="presenca"]').hide().removeAttr('required');
  
  $(`.type[data-type="${type}"]`).show().attr('required', 'req');
   // Mostra somentes aqueles que possuem o atributo `data-type` com o valor selecionado.
 
}

// Esconde todos os campos, mostrando somente a `div` de fallback.
apply('none');

$('#valor').on('change', function() {
  // Faz com que o campo mostrado seja o do valor do select:

  apply($(this).val());
      
  
});

</script>
                                                    <?php 
									if(isset($_SESSION['ErroAgendamento'])){
									                ?>
									<script>
alert('<?php echo $_SESSION['ErroAgendamento']; ?>')
</script>
									                <?php
									unset($_SESSION['ErroAgendamento']);
									}
									                ?>
									                
									                <?php 
									if(isset($_SESSION['AvisoHome'])){
									                ?>
									<script>
alert('<?php echo $_SESSION['AvisoHome']; ?>')
</script>
									                <?php
									unset($_SESSION['AvisoHome']);
									}
									                ?>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>