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
        <link rel="website icon" type="png" href="img/Logo.png">
        <link rel="stylesheet" href="css/Heade.css">
        <link rel="stylesheet" href="css/Estrutura.css">
        <link rel="stylesheet" href="css/Footer.css">
        <title>AutoHiper</title>
    </head>
    <body>
        
           <!-- Header -->
     
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
                            <a href="Eventos.php">Eventos</a>
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
    
<!-- SECTION -->


        <!-- Section -->

            <div class="wrapper">
                <main>
                    <section class="module parallax parallax-1">
                        <h1>AutoHiper</h1>
                    </section>

                    <section class="module content">
                        <div class="container">
                            <h2>Sobre Nos</h2>
                            <p>A AutoHiper nasceu de uma paixão insaciável por velocidade e excelência automotiva. Fundada em 2010 por um grupo de entusiastas de carros esportivos, a concessionária rapidamente se destacou no mercado por sua dedicação exclusiva a hiperesportivos. Localizada no coração de uma das cidades mais vibrantes do país, a AutoHiper se tornou um santuário para aqueles que buscavam mais do que apenas um carro – queriam uma obra de arte em movimento. Com um showroom repleto de modelos icônicos como Bugatti Chiron, Porsche 911 GT3 RS e Lamborghini Sesto Elemento, a AutoHiper não apenas oferecia veículos, mas também uma experiência única que combinava luxo, potência e inovação.</p>
                            <p>Ao longo dos anos, a AutoHiper construiu uma reputação sólida baseada na confiança e na qualidade de seus serviços. A concessionária não se limitou a vender carros; criou uma comunidade de aficionados por hiperesportivos, organizando eventos exclusivos e test drives emocionantes em pistas renomadas. Com um atendimento personalizado e uma equipe de especialistas sempre à disposição, a AutoHiper garantiu que cada cliente encontrasse o carro dos seus sonhos, consolidando-se como referência no mercado de hiperesportivos. Hoje, a AutoHiper continua a redefinir padrões, impulsionada pelo mesmo espírito visionário que marcou seu início, oferecendo aos amantes de velocidade a chance de possuir um pedaço da história automotiva.</p>
                        </div>
                    
                    </section>
                    
                    <section class="module parallax parallax-2">
                        <h1>Serviços</h1>
                    </section>

                    <section class="module content">
                        <div class="container">
                            <h2>Serviços</h2>
                            <p>Na AutoHiper, nossa coleção de hiperesportivos é cuidadosamente selecionada para oferecer aos nossos clientes o melhor em desempenho, design e tecnologia. Entre os destaques do nosso showroom, você encontrará o Bugatti Chiron, um ícone de velocidade e engenharia avançada, e o Porsche 911 GT3 RS, que combina precisão alemã com uma experiência de condução emocionante. Também apresentamos o Aston Martin Valhalla, um verdadeiro símbolo de luxo e inovação, e o Lamborghini Sesto Elemento, conhecido por sua construção ultraleve e potência impressionante. Cada veículo em nossa coleção é mais do que um carro; é uma obra-prima destinada a proporcionar uma experiência de condução inigualável.</p>
                            <p>Além de nossa impressionante linha de hiperesportivos, na AutoHiper oferecemos uma gama de serviços personalizados para garantir que cada cliente tenha uma experiência excepcional. Nossos especialistas estão sempre à disposição para fornecer consultoria detalhada e assistência técnica, ajudando você a escolher o modelo que melhor se adapta ao seu estilo de vida e preferências. Também organizamos eventos exclusivos, como test drives em pistas renomadas e encontros de entusiastas, proporcionando uma comunidade vibrante para os amantes de hiperesportivos. Na AutoHiper, nos dedicamos a superar suas expectativas, oferecendo não apenas veículos extraordinários, mas também um serviço incomparável.</p>
                        </div>
                    
                    </section>

                    <section class="module parallax parallax-3">
                        <h1>Eventos</h1>
                    </section>
                    
                    <section class="module content">
                        <div class="container">
                            <h2>Experiência Unica</h2>
                            <p>A AutoHiper, uma renomada concessionária de hiperesportivos, tem se destacado na organização de eventos exclusivos que atraem aficionados por automóveis de alta performance de todo o mundo. Recentemente, a AutoHiper realizou um evento de lançamento para o seu mais novo modelo de hiperesportivo, que aconteceu em um circuito de corrida icônico. Os convidados puderam testemunhar de perto a potência e a engenharia de ponta do novo veículo, com demonstrações dinâmicas na pista que exibiram sua aceleração impressionante e manobrabilidade superior. Além disso, os participantes tiveram a oportunidade de interagir com os engenheiros e designers por trás do projeto, ganhando uma compreensão mais profunda das inovações tecnológicas que tornam os hiperesportivos da AutoHiper verdadeiras obras de arte automotiva.</p>
                            <p>Outro destaque no calendário de eventos da AutoHiper foi o exclusivo Track Day para clientes VIP. Realizado em uma pista de corrida de classe mundial, o evento permitiu que os proprietários de hiperesportivos da AutoHiper testassem os limites de seus veículos em um ambiente seguro e controlado. Com a orientação de pilotos profissionais, os participantes puderam aprimorar suas habilidades de condução e experimentar a emoção de dirigir ao máximo. Além das sessões de pista, o evento contou com uma área de exposição onde os mais recentes acessórios e tecnologias automotivas foram apresentados, oferecendo aos clientes uma visão abrangente das possibilidades de personalização e aprimoramento de seus veículos. Esses eventos não só reforçam a posição da AutoHiper como líder no mercado de hiperesportivos, mas também fortalecem o vínculo entre a marca e seus clientes apaixonados.</p>
                        </div>
                    </section>
                </main>





                
            <!-- Footer -->
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
    </body>
</html>