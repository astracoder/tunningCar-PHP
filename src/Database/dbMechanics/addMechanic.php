<?php
    include '../connection.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['firstName'] && $_POST['lastName'] && $_POST['age'] && $_POST['emailMechanic'] && $_POST['gender'] && $_POST['specialty']) {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $age = $_POST['age'];
            $emailMechanic = $_POST['emailMechanic'];
            $gender = $_POST['gender'];
            $specialty = $_POST['specialty'];

            if(strlen($firstName) < 2) {
                session_start();
                $_SESSION['errorFirstName'] = "Nome inválido, digite novamente.";
            }

            if(strlen($lastName) < 2) {
                session_start();
                $_SESSION['errorLastName'] = "Sobrenome inválido, digite novamente.";
            }

            if($age < 16) {
                session_start();
                $_SESSION['errorAge'] = "Idade inválida, digite novamente.";
            }

            if(!isset($_SESSION['errorFirstName']) OR !isset($_SESSION['errorLastName']) OR !isset($_SESSION['errorAge'])) {
                $sql = "INSERT INTO mechanics (firstName, lastName, age, emailMechanic, gender, specialty) VALUES ('$firstName', '$lastName', '$age', '$emailMechanic', '$gender', '$specialty')";
        
                $database->query($sql);
                $database->close();

                header('location: ../../App/mechanics.php');
                exit();
            }
        } else {
            //Campos vazios
            session_start();
            $_SESSION['errorFields'] = "Todos os campos estão vazios, digite algo.";

            header('location: ../../App/mechanics.php');
            exit();
        }
    } else {
        //Método errado
        echo "A sua conexão não foi pré-estabelecida com o POST!";
    } 
?>