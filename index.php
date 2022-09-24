<?php
include 'topo.php';
?>


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

    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">Venha conhecer a Quimbanda</h1>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown">Espiritualidade levada a sério</h4>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i class="fa fa-map-marker-alt text-primary me-3"></i>São Paulo/SP</h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">CABALA DE EXU</h1>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown">Atendimento com o oráculo de exu à distância</h4>
                        </div>
                    </div>
                </div>
                                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-3.jpg" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">Kimbanda Zelawapanzu</h1>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown">Atendimento com Exu Tiriri da Calunga, individual</h4>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i class="fa fa-map-marker-alt text-primary me-3"></i>São Paulo/SP</h4>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <section id="sobretemplo">
        <br><br><br>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid w-75 align-self-end" src="img/about2.jpg" alt="">
                                            <div class="w-50 bg-secondary p-5" style="margin-top: -25%;">
                            <h1 class="text-uppercase text-primary mb-3">Templo de Quimbanda</h1>
                            <h2 class="text-uppercase mb-0">Cova de Tiriri</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block bg-secondary text-primary py-1 px-4">Sobre</p>
                    <h1 class="text-uppercase mb-4">O Templo</h1>

                <p>O Templo de Quimbanda Cova de Tiriri se situa na <?php echo  $campoEndereco['config'];?>. Fazemos toques para atendimento com rituais temáticos todo mês.</p>
                    <p class="mb-4">O Templo é dirigido pelo Sacerdote de Quimbanda Nàgô Kimbanda Zelawapanzu e o mestre Exu Tiriri da Calunga.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3">Em sua banda</h3>
                            <p class="mb-0">Trabalham seu Exu Tiriri da Calunga, seu Exu Tranca Rua das Almas e dona Maria Padilha da Praia.</p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3">A Quimbanda</h3>
                            <p class="mb-0">A Quimbanda é um método de feitiçaria brasileira que objetiva trazer conforto físico, emocional e espiritual a todos que a procuram.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--  About End -->

    <!-- About Start -->
    <section id="sobremim">
        <br><br><br>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">

                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block bg-secondary text-primary py-1 px-4">Sobre</p>
                    <h1 class="text-uppercase mb-4">O Kimbanda Zelawapanzu</h1>
                    <p>Kimbanda Zelawapanzu é o nome iniciático de Douglas Rainho, dirigente do Templo de Quimbanda Cova de Tiriri.</p>
                    <p class="mb-4">Professor, Oraculista, Espiritualista, Feiticeiro, Dirigente de Umbanda e Sacerdote de Quimbanda com experiência no campo da espiritualidade há mais de 30 anos.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3">Linhagem</h3>
                            <p class="mb-0">Sacerdote de Quimbanda Nàgô iniciado pelo Tata Nganga Kimbanda Kamuxinzela do Exu Pantera Negra e Mameto Mwanajinganga de Dama da Noite, aprontados por Tata Nganga Kimbanda Malembu Mikunga do Exu Sete Catacumbas, por sua vez aprontado pelo Tata Nganga Kimbanda Kilumbu do Exu Marabô.</p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3">Agendamentos</h3>
                            <p class="mb-0">Agendamentos para consultas individuais e leitura oracular podem ser feitas diretamente pelo site.</p>
                        </div>
                    </div>
                </div>
                                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid w-75 align-self-end" src="img/about.jpg" alt="">
                        <div class="w-50 bg-secondary p-5" style="margin-top: -25%;">
                            <h1 class="text-uppercase text-primary mb-3">+30 anos</h1>
                            <h2 class="text-uppercase mb-0">de experiência</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--  About End -->


<?php
include 'rodape.php';
?>