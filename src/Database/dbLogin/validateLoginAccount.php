<?php
    include '../connection.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['email'] && $_POST['password']) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $validateAccount = "SELECT * FROM register WHERE email = '$email' AND password = '$password'";
            $resultValidateAccount = $database->query($validateAccount);

            if($resultValidateAccount->num_rows > 0) {
                header('location: ../../App/index.php');
                exit();
            } else {
                session_start();
                $_SESSION['errorLogin'] = "E-mail ou senha inválidos.";

                header('location: ../../loginAccount.php');
                exit();
            }
        } else {
            //Campos vazios
            session_start();
            $_SESSION['errorFields'] = "Existem campos vazios, digite algo.";

            header('location: ../../loginAccount.php');
            exit();
        }
    } else {
        echo "A sua conexão não foi pré-estabelecida com o POST!";
    }
?>