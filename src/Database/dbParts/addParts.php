<?php
    include '../connection.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['partBrand'] && $_POST['partModel'] && $_POST['fabricationDate']) {
            $partBrand = $_POST['partBrand'];
            $partModel = $_POST['partModel'];
            $fabricationDate = $_POST['fabricationDate'];

            if(strlen($partBrand) < 2) {
                session_start();
                $_SESSION['errorPartBrand'] = "Marca inválida, digite novamente.";
            }

            if(strlen($partModel) < 2) {
                session_start();
                $_SESSION['errorPartModel'] = "Modelo inválido, digite novamente.";
            }

            if(!isset($_SESSION['errorPartBrand']) OR !isset($_SESSION['partModel'])) {
                $sql = "INSERT INTO parts (partBrand, partModel, fabricationDate) VALUES ('$partBrand', '$partModel', '$fabricationDate')";
        
                $database->query($sql);
                $database->close();

                header('location: ../../App/parts.php');
                exit();
            }
        } else {
            //Campos vazios
            session_start();
            $_SESSION['errorFields'] = "Todos os campos estão vazios, digite algo.";

            header('location: ../../App/parts.php');
            exit();
        }
    } else {
        //Método errado
        echo "A sua conexão não foi pré-estabelecida com o POST!";
    } 
?>