<?php 
    session_start();
    include '../conexao.php';

    $sql = "SELECT Nome, Historia1, Historia2, Motor, Potencia, Maxima, Aceleracao, Transmissao, Historia3, Imagem, Imagem2 FROM carros WHERE ID = '11'";
    $result = $conn->query($sql);

    if ($row = $result->fetch_assoc()) {
        $nome = $row['Nome'];
        $historia1 = $row['Historia1'];
        $historia2 = $row['Historia2'];
        $motor = $row['Motor'];
        $potencia = $row['Potencia'];
        $maxima = $row['Maxima'];
        $aceleracao = $row['Aceleracao'];
        $transmissao = $row['Transmissao'];
        $historia3 = $row['Historia3'];
        $imagePath = $row['Imagem'];
        $imagePath2 = $row['Imagem2'];
    } else {
        echo "No data found for the given ID.";
    }

    mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="../../img/Logo.png">
    <link rel="stylesheet" href="../../css/Header.css">
    <link rel="stylesheet" href="../../css/Lamborghini/Aventador.css">
    <link rel="stylesheet" href="../../css/Footer.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/themes/odometer-theme-default.css"
      integrity="sha512-kMPqFnKueEwgQFzXLEEl671aHhQqrZLS5IP3HzqdfozaST/EgU+/wkM07JCmXFAt9GO810I//8DBonsJUzGQsQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title><?php echo $nome?></title>
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

                                <details>
                                    <summary>Bugatti</summary>
                                    <a href="../Bugatti/Chiron.php">Bugatti Chiron</a>
                                </details>
                                <details>
                                    <summary>Ferrari</summary>
                                    <a class="cars" href="../Ferrari/458.php">458 Italia</a>
                                    <a class="cars" href="../Ferrari/Enzo.php">Enzo</a>
                                    <a class="cars" href="../Ferrari/LaFerrari.php">LaFerrari</a>
                                    <a class="cars" href="../Ferrari/Roma.php">Roma</a>
                                    <a class="cars" href="../Ferrari/SF90.php">SF90</a>         
                                </details>
                                <details>
                                    <summary>Koenigsegg</summary>
                                    <a class="cars" href="../Koenigsegg/Absolut.php">Jesko Absolut</a>
                                </details>
                                <details>
                                    <summary>Lamborghini</summary>
                                    <a class="cars" href="../Lamborghini/Aventador.php">Aventador </a>
                                    <a class="cars" href="../Lamborghini/Gallardo.php">Gallardo</a>
                                    <a class="cars" href="../Lamborghini/Huracan.php">Huracán</a>
                                    <a class="cars" href="../Lamborghini/Revuelto.php">Revuelto</a>
                                    <a class="cars" href="../Lamborghini/SestoElemento.php">Sesto Elemento</a>
                                </details>
                                <details>
                                    <summary>McLaren</summary>
                                    <a class="cars" href="../McLaren/720S.php">720S</a>
                                    <a class="cars" href="../McLaren/P1.php">P1</a>
                                    <a class="cars" href="../McLaren/Senna.php">Senna</a>
                                </details>
                                <details>
                                    <summary>Porsche</summary>
                                    <a class="cars" href="../Porsche/911.php">911 GT3 RS</a>
                                </details>
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
                        <li>
                            <a href="">Marcas</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-center">
                    <span>
                        <a href="../../Index.php"><img src="../../img/Logo.png" id="logo" alt="Logo"></a>
                    </span>
                </div>

                <div class="nav-right">
                    <a href="../Cadastro.php" id="iconlogin"><img src="../../img/Login.svg" alt="" id="Login" ></a>
                </div>
            </nav>  
            

        </header>
    
<!-- SECTION -->
    <div class="wrapper">
        <main>
            <section class="module parallax" style="background-image: url('../../<?php echo $imagePath; ?>');">
                <h1><?php echo $nome?></h1>
            </section>

            <section class="module content">
                <div class="container">
                    <h2>História</h2>
                    <p><?php echo $historia1?></p>
                    <p><?php echo $historia2?></p>
                </div>
            
            </section>
            
            <section class="module parallax" style="background-image: url('../../<?php echo $imagePath2; ?>');">
               <h2><?php echo $aceleracao?> Segundos</h2><h1 class="odometro odometer">0</h1><h2>Km/H</h2>
            </section>

            <section class="module content">
                <div class="container2">
                        <div class="quadrante">
                            <h2>Dados Técnicos</h2>
                            <ul>
                                <li class="Dados">Motor: <?php echo $motor?></li>
                                <li class="Dados">Potência: <?php echo $potencia?></li>
                                <li class="Dados">Aceleração (0-100 km/h): <?php echo $aceleracao?> segundos</li>
                                <li class="Dados">Velocidade máxima: <?php echo $maxima?> km/h.</li>
                                <li class="Dados">Transmissão:  <?php echo $transmissao?></li>
                            </ul>
                        </div> 
                        <div class="quadrante">
                            <h2>Informações</h2>
                            <ul>
                                <li><?php echo $historia3?></li>
                            </ul>
                            
                        </div> 
                </div>
            </section>
        </main>
    </div>
<!-------------------------FOOTER------------------------------------>
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
                                        <img src="../../img/Insta_Logo.png" alt="Instagram Logo" height="30px" width="30px" class="Logos">
                                    </div>
                                    @AutoHiper
                                </li>
                                <li>
                                    <div class="Social-container">
                                        <h3>Facebook</h3>
                                        <img src="../../img/Face_Logo.png" alt="Facebook Logo" height="30px" width="30px" class="Logos">
                                    </div>
                                    AutoHiper
                                </li>
                            </ul>
                            <img src="../../img/Logo.png" class="logo" alt="Logo">
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

        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js"
            integrity="sha512-v3fZyWIk7kh9yGNQZf1SnSjIxjAKsYbg6UQ+B+QxAZqJQLrN3jMjrdNwcxV6tis6S0s1xyVDZrDz9UoRLfRpWw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        ></script>

        <script>
            const createOdometer = (el, value) => {
            const odometerInstance = new Odometer({
                el: el,
                value: 0,
            });

            let hasRun = false;

            const options = {
                threshold: [0.5],
            };

            const callback = (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        if (!hasRun) {
                            odometerInstance.update(value);
                            hasRun = true;
                        }
                    }
                });
            };

            const observer = new IntersectionObserver(callback, options);
            observer.observe(el,);
            };

            // Example usage
            const odometerElement = document.querySelector(".odometer");
            createOdometer(odometerElement, 100);
        </script>
    </body>
</html>