<?php
    include '../connection.php';
    session_start();
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['title'] && $_POST['description'] && $_POST['nameMechanic'] && $_POST['nameClient'] && $_POST['brandCarClient'] && $_POST['modelCarClient'] && $_POST['plateCarClient'] && $_POST['namePart']) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $nameMechanic = $_POST['nameMechanic'];
            $nameClient = $_POST['nameClient'];
            $brandCarClient = $_POST['brandCarClient'];
            $modelCarClient = $_POST['modelCarClient'];
            $plateCarClient = $_POST['plateCarClient'];
            $namePart = $_POST['namePart'];

            if(strlen($title) < 2) {
                $_SESSION['errorTitle'] = "Título inválido, digite novamente.";
            }

            if(strlen($description) < 11) {
                $_SESSION['errorDescription'] = "Descrição inválida, digite novamente.";
            }

            if(strlen($nameClient) < 2) {
                $_SESSION['errorNameClient'] = "Nome inválido, digite novamente.";
            }

            if(strlen($brandCarClient) < 2) {
                $_SESSION['errorBrandCarClient'] = "Marca inválida, digite novamente.";
            }

            if(strlen($modelCarClient) < 2) {
                $_SESSION['errorModelCarClient'] = "Modelo inválido, digite novamente.";
            }

            if(strlen($plateCarClient) < 7) {
                $_SESSION['errorPlateCarClient'] = "Placa inválida, digite novamente.";
            }

            if(!isset($_SESSION['errorTitle']) OR !isset($_SESSION['errorDescription']) OR !isset($_SESSION['errorNameClient']) OR !isset($_SESSION['errorBrandCarClient']) OR !isset($_SESSION['errorModelCarClient']) OR !isset($_SESSION['errorPlateCarClient'])) {
                $sql = "INSERT INTO services (title, description, nameMechanic, nameClient, brandCarClient, modelCarClient, plateCarClient, namePart) VALUES ('$title', '$description', '$nameMechanic', '$nameClient', '$brandCarClient', '$modelCarClient', '$plateCarClient', '$namePart')";
        
                $database->query($sql);
                $database->close();

                header('location: ../../App/services.php');
                exit();
            }

        } else {
            //Campos vazios
            $_SESSION['errorFields'] = "Todos os campos estão vazios, digite algo.";

            header('location: ../../App/services.php');
            exit();
        }
    } else {
        //Método errado
        echo "A sua conexão não foi pré-estabelecida com o POST!";
    } 
?>