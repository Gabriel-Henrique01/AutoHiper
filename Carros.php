<?php 
    session_start();
    include 'php/conexao.php';

    $nomee = isset($_GET['nome']) ? $_GET['nome'] : '';
    $carroSelecionado = null;

    if ($nomee) {
        $sql = "SELECT Nome, Historia1, Historia2, Motor, Potencia, Maxima, Aceleracao, Transmissao, Historia3, Imagem, Imagem2 FROM carros WHERE Nome = '$nomee'";
        $result = $conn->query($sql);

        if ($row = $result->fetch_assoc()) {
            $carroSelecionado = $row;
        } else {
            echo "No data found for the given ID.";
        }
    }

    $sql = "SELECT Marca, Nome FROM carros ORDER BY Marca";
    $result = $conn->query($sql);

    $carros = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $carros[$row['Marca']][] = $row['Nome'];
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="png" href="img/Logo.png">
    <link rel="stylesheet" href="css/Heade.css">
    <link rel="stylesheet" href="css/Carros.css">
    <link rel="stylesheet" href="css/Footer.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/themes/odometer-theme-default.css"
      integrity="sha512-kMPqFnKueEwgQFzXLEEl671aHhQqrZLS5IP3HzqdfozaST/EgU+/wkM07JCmXFAt9GO810I//8DBonsJUzGQsQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title><?php echo $carroSelecionado ? $carroSelecionado['Nome'] : 'Carros'; ?></title>
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
                            foreach ($carros as $marca => $nomes) {
                                echo '<details>';
                                echo '<summary>' . htmlspecialchars($marca) . '</summary>';
                                foreach ($nomes as $nome) {
                                    echo '<a href="Carros.php?nome=' . urlencode($nome) . '">' . htmlspecialchars($nome) . '</a>';
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
            <div class="nav-right">
                <a href="../Cadastro.php" id="iconlogin"><img src="img/Login.svg" alt="" id="Login" ></a>
            </div>
        </nav>  
    </header>
    
    <!-- SECTION -->
    <article>
        <div class="buttonview">
            <button class="viewsection" onclick="Historia()">Historia</button>
            <button class="viewsection2" onclick="Dados()">Dados técnicos</button>
            <button class="scrolltop" onclick="topo()"><img src="img/Seta.svg" alt=""></button>
        </div>
        <div class="wrapper">
            <main>
                <?php if ($carroSelecionado): ?>
                <section class="module parallax" style="background-image: url('<?php echo htmlspecialchars($carroSelecionado['Imagem']); ?>');">
                    <h1><?php echo htmlspecialchars($carroSelecionado['Nome']); ?></h1>
                </section>

                <section class="module content">
                    <div class="container">
                        <h2>História</h2>
                        <p><?php echo htmlspecialchars($carroSelecionado['Historia1']); ?></p>
                        <p><?php echo htmlspecialchars($carroSelecionado['Historia2']); ?></p>
                    </div>
                </section>
                
                <section class="module parallax" style="background-image: url('<?php echo htmlspecialchars($carroSelecionado['Imagem2']); ?>');">
                    <h2><?php echo htmlspecialchars($carroSelecionado['Aceleracao']); ?> Segundos</h2>
                    <h1 class="odometro odometer">0</h1>
                    <h2>Km/H</h2>
                </section>

                <section class="module content">
                    <div class="container2">
                        <div class="quadrante">
                            <h2>Dados Técnicos</h2>
                            <ul>
                                <li class="Dados">Motor: <?php echo htmlspecialchars($carroSelecionado['Motor']); ?></li>
                                <li class="Dados">Potência: <?php echo htmlspecialchars($carroSelecionado['Potencia']); ?></li>
                                <li class="Dados">Aceleração (0-100 km/h): <?php echo htmlspecialchars($carroSelecionado['Aceleracao']); ?> segundos</li>
                                <li class="Dados">Velocidade máxima: <?php echo htmlspecialchars($carroSelecionado['Maxima']); ?> km/h.</li>
                                <li class="Dados">Transmissão: <?php echo htmlspecialchars($carroSelecionado['Transmissao']); ?></li>
                            </ul>
                        </div> 
                        <div class="quadrante">
                            <h2>Informações</h2>
                            <ul>
                                <li><?php echo htmlspecialchars($carroSelecionado['Historia3']); ?></li>
                            </ul>
                        </div> 
                    </div>
                </section>
                <?php else: ?>
                <section class="module content">
                    <div class="container">
                        <h2>Selecione um carro para ver os detalhes</h2>
                    </div>
                </section>
                <?php endif; ?>
            </main>
        </div>
        
        <!-- FOOTER -->
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
                            <li>Política de privacidade</li>
                            <li>Termos de uso</li>
                            <li>FAQs</li>
                            <li><button class="Button_Footer">Suporte</button></li>
                        </ul>
                    </div>
                </div>            
            </section>
        </main>
    </article>
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

        <script>
            window.addEventListener('scroll', function(topo){
                let scroll = document.querySelector('.scrolltop')
                    scroll.classList.toggle('active', window.scrollY > 600)
            })

            window.addEventListener('scroll', function(Historia){
                let scroll = document.querySelector('.viewsection')
                    scroll.classList.toggle('active', window.scrollY > 400 && window.scrollY < 1600)
            })

            window.addEventListener('scroll', function(Dados){
                let scroll = document.querySelector('.viewsection2')
                scroll.classList.toggle('active', window.scrollY > 2200 || window.scrollY == 2630)
            })

            function topo(){
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                })
            }

            function Historia(){
                window.scrollTo({
                    top: 969,
                    behavior: 'smooth'
                })
            }

            function Dados(){
                window.scrollTo({
                    top: 2860,
                    behavior: 'smooth'
                })
            }

        </script>
    </body>
</html>