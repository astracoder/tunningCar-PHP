<?php
    include '../Database/connection.php';
    session_start();

    $id = $_GET['id'];

    $sql = "SELECT * FROM mechanics WHERE id = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $mechanic = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Editar Mecânico</title>
</head>
<body>
    <?php
        include '../Components/menu.php';
    ?>
    <div class="container">
        <h1 class="mt-5">Editar Mecânico</h1>
        <form action="../Database/dbMechanics/updateMechanic.php" method="post">
            <input type="hidden" name="id" value="<?php echo $mechanic['id']; ?>">
            <div class="mb-3">
                <label for="firstName" class="form-label">Nome</label>
                <input type="text" class="form-control" name="firstName" value="<?php echo $mechanic['firstName']; ?>">
                <?php 
                    session_start();
                    if(isset($_SESSION['errorFirstName'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorFirstName'] . '</p>'; 
                    unset($_SESSION['errorFirstName']);
                ?>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Sobrenome</label>
                <input type="text" class="form-control" name="lastName" value="<?php echo $mechanic['lastName']; ?>">
                <?php 
                    session_start();
                    if(isset($_SESSION['errorLastName'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorLastName'] . '</p>'; 
                    unset($_SESSION['errorLastName']);
                ?>
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">Idade</label>
                <input type="text" class="form-control" name="age" value="<?php echo $mechanic['age']; ?>">
                <?php 
                    session_start();
                    if(isset($_SESSION['errorAge'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorAge'] . '</p>'; 
                    unset($_SESSION['errorAge']);
                ?>
            </div>
            <div class="mb-3">
                <label for="emailMechanic" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="emailMechanic" value="<?php echo $mechanic['emailMechanic']; ?>">
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="M" <?php echo $mechanic['gender'] == 'M' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="gender">Masculino</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" value="F" <?php echo $mechanic['gender'] == 'F' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="gender">Feminino</label>
            </div>
            <div class="mb-3">
                <label for="specialty" class="form-label">Especialidade</label>
                <select class="form-select" name="specialty">
                    <option value="Motor" <?php echo $mechanic['specialty'] == 'Motor' ? 'selected' : ''; ?>>Motor</option>
                    <option value="Injecao eletronica" <?php echo $mechanic['specialty'] == 'Injecao eletronica' ? 'selected' : ''; ?>>Injeção eletrônica</option>
                    <option value="Carburador" <?php echo $mechanic['specialty'] == 'Carburador' ? 'selected' : ''; ?>>Carburador</option>
                    <option value="Funilaria" <?php echo $mechanic['specialty'] == 'Funilaria' ? 'selected' : ''; ?>>Funilaria</option>
                    <option value="Estetica automotiva" <?php echo $mechanic['specialty'] == 'Estetica automotiva' ? 'selected' : ''; ?>>Estética automotiva</option>
                </select>
            </div>
            <?php 
                session_start();
                if(isset($_SESSION['errorFields'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorFields'] . '</p>'; 
                unset($_SESSION['errorFields']);
            ?>
            <a href="./mechanics.php" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-success">Editar informações</button>
        </form>
    </div>
</body>
</html>