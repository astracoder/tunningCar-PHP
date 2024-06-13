<?php
    include '../connection.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['id']) {
            $id = $_POST['id'];

            $sql = "DELETE FROM parts WHERE id = '$id'";
        
            $database->query($sql);
            $database->close();

            header('location: ../../App/parts.php');
            exit();
        } else {
            //Método errado
            echo $id;
            echo "A sua conexão não foi pré-estabelecida com o POST!";
        } 
    }
?>
