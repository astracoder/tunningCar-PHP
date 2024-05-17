<?php
    $database = new mysqli("localhost", "root", "", "drazictunningcar", "3306");

    if($database->connect_errno) {
        echo "Falha na conexão do banco de dados!";
    }

    // $database->close();
?>;