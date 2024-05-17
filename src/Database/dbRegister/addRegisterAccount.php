<?php
    include '../connection.php';
    
    //Ocorreu tudo bem
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['email'] && $_POST['user'] && $_POST['password']) {
            $email = $_POST['email'];
            $user = $_POST['user'];
            $password = $_POST['password'];

            $validateEmail = "SELECT * FROM register WHERE email = '$email'";
            $validateUser = "SELECT * FROM register WHERE user = '$user'";

            $resultValidateEmail = $database->query($validateEmail);
            $resultValidateUser = $database->query($validateUser);

            if($resultValidateEmail->num_rows > 0 && $resultValidateUser->num_rows > 0 && strlen($password) < 6) {
                session_start();
                $_SESSION['errorEmail'] = "E-mail já existente, digite outro.";
                $_SESSION['errorUser'] = "Usuário já existente, digite outro.";
                $_SESSION['errorPassword'] = "Senha deve ter no minímo 6 caracteres.";

                header('location: ../../registerAccount.php');
                exit();
            } else if($resultValidateEmail->num_rows > 0 && strlen($password) < 6) {
                session_start();
                $_SESSION['errorEmail'] = "E-mail já existente, digite outro.";
                $_SESSION['errorPassword'] = "Senha deve ter no minímo 6 caracteres.";

                header('location: ../../registerAccount.php');
                exit();
            } else if($resultValidateUser->num_rows > 0 && strlen($password) < 6) {
                session_start();
                $_SESSION['errorUser'] = "Usuário já existente, digite outro.";
                $_SESSION['errorPassword'] = "Senha deve ter no minímo 6 caracteres.";

                header('location: ../../registerAccount.php');
                exit();
            } else if(strlen($password) < 6) {
                session_start();
                $_SESSION['errorPassword'] = "Senha deve ter no minímo 6 caracteres.";

                header('location: ../../registerAccount.php');
                exit();
            }   

            if(!isset($_SESSION['errorEmail']) OR !isset($_SESSION['errorUser']) OR !isset($_SESSION['errorPassword'])) {
                $sql = "INSERT INTO register (email, user, password) VALUES ('$email', '$user', '$password')";
        
                $database->query($sql);
                $database->close();

                header('location: ../../loginAccount.php');
                exit();
            }
        } else {
            //Campos vazios
            session_start();
            $_SESSION['errorFields'] = "Existem campos vazios, digite algo.";

            header('location: ../../registerAccount.php');
            exit();
        }
    } else {
        //Método errado
        echo "A sua conexão não foi pré-estabelecida com o POST!";
    } 
?>