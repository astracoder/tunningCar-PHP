<?php
    include '../Database/connection.php';
    session_start();

    $id = $_GET['id'];

    $sql = "SELECT * FROM services WHERE id = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $service = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Drazic Tunning Car - Deletar serviço</title>
</head>
<body>
    <?php
        include '../Components/menu.php';
    ?>
    <div class="container">
        <h1 class="mt-5">Excluir registro de serviço</h1>
        <form action="../Database/dbServices/removeService.php" method="post">
            <input type="hidden" name="id" value="<?php echo $service['id']; ?>">

            <div class="mb-3 mt-3">
                    <label class="form-label" for="nameClient">Nome do cliente</label>
                    <input disabled class="form-control" id="nameClient" type="text" name="nameClient" value="<?php echo $service['nameClient']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="plateCarClient">Placa do carro do cliente</label>
                    <input disabled class="form-control" id="plateCarClient" type="text" name="plateCarClient" value="<?php echo $service['plateCarClient']; ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="description">Descrição</label>
                    <input disabled class="form-control" id="description" type="text" name="description" value="<?php echo $service['description']; ?>">
                </div>

            <a href="./services.php" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-danger">Excluir serviço</button>
        </form>
    </div>
</body>
</html>