<?php

     $servername = "localhost";
     $username = "root";
     $password = "";
     $database = "autohiper";

     $conn = mysqli_connect($servername, $username, $password, $database);

     if (!$conn) {
         die("Falha na Conexão: " . mysqli_connect_error());
     }

?>