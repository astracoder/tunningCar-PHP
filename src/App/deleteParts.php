<?php
    include '../Database/connection.php';
    session_start();

    $id = $_GET['id'];

    $sql = "SELECT * FROM parts WHERE id = ?";
    $stmt = $database->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $part = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Drazic Tunning Car - Deletar peça</title>
</head>
<body>
    <?php
        include '../Components/menu.php';
    ?>
    <div class="container">
        <h1 class="mt-5">Excluir Peça</h1>
        <form action="../Database/dbParts/removeParts.php" method="post">
            <input type="hidden" name="id" value="<?php echo $part['id']; ?>">
            <div class="mb-3">
                <label for="partBrand" class="form-label">Marca da peça</label>
                <input disabled type="text" class="form-control" name="partBrand" value="<?php echo $part['partBrand']; ?>">
            </div>
            <div class="mb-3">
                <label for="partModel" class="form-label">Modelo da peça</label>
                <input disabled type="text" class="form-control" name="partModel" value="<?php echo $part['partModel']; ?>">
            </div>
            <div class="mb-3">
                <label for="fabricationDate" class="form-label">Data de fabricação</label>
                <input disabled class="form-control" type="date" name="fabricationDate" value="<?php echo $part['fabricationDate']; ?>">
            </div>
            <a href="./parts.php" class="btn btn-primary">Voltar</a>
            <button type="submit" class="btn btn-danger">Excluir peça</button>
        </form>
    </div>
</body>
</html>