<?php
include 'topo.php';
?>


    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white text-uppercase mb-3 animated slideInDown">Oraculo de Exu</h1>
            <nav aria-label="breadcrumb animated slideInDown">
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


<center>
<div style="padding: 20px">
				   <?php
    				  include("BD/conecta.php");

$selecionaTexto=mysqli_query($conexao, "select * from texto where tipo=2");
    while($textos=mysqli_fetch_array($selecionaTexto)){ 
        echo $textos['titulo'];
        echo $textos['texto'];
    }

$selecionaWhats=mysqli_query($conexao, "select * from config where id_config=6");
    $campoBotaoWhats=mysqli_fetch_assoc($selecionaWhats);
    
    ?>
<br>
<iframe width="400" height="315" src="https://www.youtube.com/embed/Nn3RehS4utI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<br>
<a href="<?php echo  $campoBotaoWhats['config'];?>"><img src="img/whats.png" alt="WHATSAPP" style="padding: 15px; width: 100px"></a>

<br>

</div>

<!-- Google Calendar Appointment Scheduling begin -->
<link href="https://calendar.google.com/calendar/scheduling-button-script.css" rel="stylesheet">
<script src="https://calendar.google.com/calendar/scheduling-button-script.js" async></script>
<script>
(function() {
  var target = document.currentScript;
  window.addEventListener('load', function() {
    calendar.schedulingButton.load({
      url: 'https://calendar.google.com/calendar/appointments/schedules/AcZssZ1QZ23ue26pADN3tVtnOlCZremITRQJa202wbXefRLjh_k9PRZzReoFpvGef6dpDPIKQY7e-kOs?gv=true',
      color: '#039BE5',
      label: 'Agendar um compromisso',
      target,
    });
  });
})();
</script>
<!-- end Google Calendar Appointment Scheduling -->


</center>

<?php
include 'rodape.php';
?>