<?php
    include '../connection.php';

    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $age = $_POST['age'];
    $email = $_POST['emailMechanic'];
    $gender = $_POST['gender'];
    $specialty = $_POST['specialty'];

    echo $id;
    echo $id, $firstName, $lastName;

    // $sql = "UPDATE mechanics SET firstName = ?, lastName = ?, age = ?, emailMechanic = ?, gender = ?, specialty = ? WHERE id = ?";
    // $stmt = $database->prepare($sql);
    // $stmt->bind_param('ssisssi', $firstName, $lastName, $age, $email, $gender, $specialty, $id);

    // if ($stmt->execute()) {
    //     header("Location: ../path/to/your/main/page.php");
    // } else {
    //     echo "Erro ao atualizar mecânico: " . $stmt->error;
    // }
?>