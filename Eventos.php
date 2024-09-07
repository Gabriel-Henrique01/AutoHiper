
<?php

    session_start();

    include 'php/conexao.php';

    $sql = "SELECT Marca, Nome, ID FROM carros";
    $result = mysqli_query($conn, $sql);
    $rows = array();

?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Heade.css">
    <link rel="stylesheet" href="css/Eventos.css">
    <link rel="stylesheet" href="css/Carrossel.css">
    <link rel="stylesheet" href="css/Footer.css">
    
    <title>Eventos</title>
</head>
<body>
<header>
            <nav>
                <div class="nav-left">
                    <ul>
                        <li class="dropdown">
                            <a href="">Garagem</a>
                            <div class="dropdown-menu">

                                <?php 
                                    $carros = [];
                                    while($r = mysqli_fetch_assoc($result)) {
                                        $carros[$r['Marca']][] = $r['Nome'];
                                    }
                                    
                                    foreach($carros as $marca => $nomes) {
                                        echo '<details>';
                                        echo '<summary>' . $marca . '</summary>';
                                        foreach($nomes as $nome) {
                                            echo '<a href="Carros.php?nome=' . $nome. '">' . $nome . '</a>';
                                        }
                                        echo '</details>';
                                    }
                                    
                                ?>

                            </div>
                        </li>
                        <li class="dropdown2">
                            <a href="">SUV</a>
                            <div class="dropdown-suv">
                                <a href="">Lamborghini Urus</a>
                                <a href="">Mercedes G63</a>
                                <a href="">BMW X5</a>
                                <a href="">Audi Q7</a>
                            </div>
                        </li>
                        <li>
                            <a href="">Eventos</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-center">
                    <span>
                        <a href="Index.php"><img src="img/Logo.png" id="logo" alt="Logo"></a>
                    </span>
                </div>
                
                <?php 
                     if(!isset($_SESSION["Nome"]) && !isset($_SESSION["Cargo"])){
                        echo '<div class="nav-right">';
                        echo '<a href="php/Login.php" id="iconlogin"><img src="img/Login.svg" alt="" id="Login" ></a>';
                        echo '</div>';
                     } elseif($_SESSION['Cargo'] == 'Cliente') {
                        echo '<div class="nav-right">';
                        echo '<button class="ButtonAccount"><a href="php/Perfil.php" id="iconlogin"><img src="img/Usuario.svg" alt="" id="Login" >' . $_SESSION['Nome'] . '</a></button>';
                        echo '</div>';
                     } else {
                        echo '<div class="nav-right">';
                        echo '<button class="ButtonAccount"><a href="php/Admin/Admin.php" id="iconlogin"><img src="img/Usuario.svg" alt="" id="Login" >' . $_SESSION['Nome'] . '</a></button>';
                        echo '</div>';
                     }
                    
                    
                ?>
                
            </nav>  
                    
        </header>

        <article>
        <div class="buttonview">
            <button class="scrolltop" onclick="Topo()"><img src="img/Seta.svg" alt=""></button>
        </div>
            <section class="slider">
                <div class="slider-content">
                    <input type="radio" name="btn-radio" id="radio1" checked>
                    <input type="radio" name="btn-radio" id="radio2">
                    <input type="radio" name="btn-radio" id="radio3">

                    <div class="slide-box primeiro">
                        <img class="img-carrossel" src="img/Interlago.webp" alt="">
                        <h1>Interlagos</h1>
                    </div>
                    <div class="slide-box">
                        <img class="img-carrossel" src="img/Le_Man.webp" alt="">
                        <h1>Le Mans</h1>
                    </div>
                    <div class="slide-box">
                        <img class="img-carrossel" src="img/Formula_1.webp" alt="">
                        <h1>Formula 1</h1>
                    </div>

                    <div class="nav-auto">
                        <div class="auto-btn1"></div>
                        <div class="auto-btn2"></div>
                        <div class="auto-btn3"></div>
                    </div>

                    <div class="nav-manual">
                        <label for="radio1" class="manual-btn"></label>
                        <label for="radio2" class="manual-btn"></label>
                        <label for="radio3" class="manual-btn"></label>
                    </div>
                </div>
            </section>

            
            
            <main>
                <section class="module-content">
                    <div class="sectioncard">
                        <div class="cards">
                            <img src="img/Interlago.webp" alt="">
                            <h1>InterHiper</h1>
                            <p>A AutoHiper organiza anualmente um evento exclusivo no Autódromo de Interlagos, onde assinantes podem dirigir os mais recentes modelos de superesportivos e interagir com engenheiros e pilotos profissionais. O evento celebra a paixão pelos carros de alta performance e reforça o compromisso da AutoHiper em proporcionar experiências inesquecíveis aos seus clientes.</p> 
                            <button class="InterHiper" onclick="InterHiper()">Conheça Mais</button>
                        </div>
                        <div class="cards">
                            <img src="img/Le_Man.webp" alt="">
                            <h1>Le Auto</h1>
                            <p>Em uma ocasião especial, a AutoHiper ofereceu a oportunidade única de pilotar os icônicos carros das 24 Horas de Le Mans. Dirigir essas máquinas lendárias, conhecidas por sua resistência e velocidade, foi uma experiência inesquecível. Sentir a potência e a história de cada veículo enquanto percorria a pista trouxe uma nova dimensão à paixão pelo automobilismo, tornando o evento um marco na trajetória dos entusiastas presentes.</p> 
                            <button class="Le_Auto" onclick="Le_Auto()">Conheça Mais</button>
                        </div>
                        <div class="cards">
                            <img src="img/Formula_1.webp" alt="">
                            <h1>Formula Cars</h1>   
                            <p>Em uma ocasião especial e extremamente rara, a AutoHiper oferece aos participantes a oportunidade de conhecer pilotos de Fórmula 1 e adquirir um exemplar autêntico de um carro de Fórmula 1. Este evento único permite que os entusiastas de automobilismo não apenas encontrem suas ídolos, mas também explorem de perto as máquinas que definem o ápice da engenharia automotiva. Conhecer os pilotos e adquirir um carro de Fórmula 1 transforma o evento em uma experiência inigualável, marcando um momento memorável para os verdadeiros apaixonados pelo esporte.</p> 
                            <button class="Formula_Cars" onclick="Formula_Cars()">Conheça Mais</button>
                        </div>
                    </div>
                </section>
            </main>
            
            <main>
                <section class="module-content2" style="background-image: url('img/Revuelto_3.webp');">
                    <div class="InterContent">
                        <div class="conteudo">
                            <h1>InterHiper</h1>
                            <p>A AutoHiper organiza um evento anual exclusivo no Autódromo de Interlagos, onde assinantes têm a oportunidade de dirigir os mais recentes modelos de superesportivos. Este evento permite que os participantes sintam a adrenalina e a potência dessas máquinas de alta performance em uma das pistas mais icônicas do Brasil. Além da experiência de pilotagem, os assinantes têm acesso a palestras e workshops com engenheiros e pilotos profissionais, que compartilham conhecimentos sobre a tecnologia e o desempenho dos veículos, enriquecendo ainda mais a vivência no evento.</p>
                        </div>
                    </div>
                </section>  
            </main>

            <section class="module content">
                    
            </section>



            <script src="js/carrossel.js"></script>





            <main>
                    <section class="module content2">
                        <div class="container3">
                            <div class="quadrante2">
                                <h2>Contato</h2>
                                <ul>
                                    <li>
                                        <h3>Endereço</h3>
                                        Av. das Hortênsias, 4635- Bairro carniel, Gramado, RS, 95670760
                                    </li>
                                    <li>
                                        <h3>Telefone</h3>
                                        (15)99102-6694
                                    </li>
                                    <li>
                                        <h3>E-mail</h3>
                                        Autohiper@hipercar.com.br
                                    </li>
                                    <li>
                                        <div class="Social-container">
                                            <h3>Instagram</h3>
                                            <img src="img/Insta_Logo.png" alt="Instagram Logo" height="30px" width="30px" class="Logos">
                                        </div>
                                        @AutoHiper
                                    </li>
                                    <li>
                                        <div class="Social-container">
                                            <h3>Facebook</h3>
                                            <img src="img/Face_Logo.png" alt="Facebook Logo" height="30px" width="30px" class="Logos">
                                        </div>
                                        AutoHiper
                                    </li>
                                </ul>
                                <img src="img/Logo.png" class="logo" alt="Logo">
                            </div>
                        
                            <div class="quadrante2">
                                <h2>Informações relevantes</h2>
                                <ul>
                                    <li>
                                        Política de privacidade
                                    </li>
                                    <li>
                                        Termos de uso
                                    </li>
                                    <li>
                                        FAQs
                                    </li>
                                    <li>
                                        <button class="Button_Footer">Suporte</button> 
                                    </li>
                                </ul>
                            </div>

                        </div>            
                    </section>
                </main>

        </article>




        
            <script>
            window.addEventListener('scroll', function(Topo){
                let scroll = document.querySelector('.scrolltop')
                    scroll.classList.toggle('active', window.scrollY > 600)
            })

            window.addEventListener('scroll', function(InterHiper){
                let scroll = document.querySelector('.InterHiper')
                    scroll.classList.toggle('active', window.scrollY > 60)
            })

            window.addEventListener('scroll', function(Le_Auto){
                let scroll = document.querySelector('.Le_Auto')
                    scroll.classList.toggle('active', window.scrollY > 400 && window.scrollY < 1600)
            })

            window.addEventListener('scroll', function(Formula_Cars){
                let scroll = document.querySelector('.Formula_Cars')
                scroll.classList.toggle('active', window.scrollY > 2200 || window.scrollY == 2630)
            })

            function Topo(){
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                })
            }

            function InterHiper(){
                window.scrollTo({
                    top: 2160,
                    behavior: 'smooth'
                })
            }

            function Le_Auto(){
                window.scrollTo({
                    top: 3240,
                    behavior: 'smooth'
                })
            }

            function Formula_Cars(){
                window.scrollTo({
                    top: 4320,
                    behavior: 'smooth'
                })
            }

        </script>
</body>
</html>