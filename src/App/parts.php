<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Drazic Tunning Car - Cadastro de peças</title>
</head>
<body>
<?php
    include '../Components/menu.php';
?>
<div class="container-fluid">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 m-3 p-3">
            <h1 class="text-center mb-3 pb-3 border-bottom border-2">Cadastro de peças</h1>
            <form action="../../src/Database/dbParts/addParts.php" method="post">
                <div class="mb-3">
                    <label class="form-label" for="partBrand">Marca da peça</label>
                    <input class="form-control" id="partBrand" type="text" name="partBrand" placeholder="Digite a marca da peça...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorPartBrand'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorPartBrand'] . '</p>'; 
                        unset($_SESSION['errorPartBrand']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="partModel">Modelo da peça</label>
                    <input class="form-control" id="partModel" type="text" name="partModel" placeholder="Digite o modelo da peça...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorPartModel'])) echo  '<p class="alert alert-danger mt-2">' . $_SESSION['errorPartModel'] . '</p>'; 
                        unset($_SESSION['errorPartModel']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="fabricationDate">Data de fabricação</label>
                    <input class="form-control" id="fabricationDate" type="date" name="fabricationDate"">
                </div>
                <?php 
                    session_start();
                    if(isset($_SESSION['errorFields'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorFields'] . '</p>'; 
                    unset($_SESSION['errorFields']);
                ?>
                <input id="cleanBtn" class="btn btn-outline-dark" type="button" value="Limpar">
                <input class="btn btn-success" type="submit" value="Cadastrar peça">
            </form>
        </div>
    </div>

    <div class="container">
    <h4 class="text-white bg-secondary text-left mt-5 mb-3 border-bottom border-1 rounded p-3">Gerenciamento de peças</h4>

        <?php
            include '../Database/connection.php';

            $sql = "SELECT id, partModel, partBrand, fabricationDate FROM parts";
            $resultParts = $database->query($sql);

            $parts = []; //Array de peças

            //Colocando todos os registros de peças no array
            if ($resultParts->num_rows > 0) {
                while($row = $resultParts->fetch_assoc()) {
                    $parts[] = $row;
                }
            }

            //Se houver
            if (!empty($parts)) {
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>ID</th><th>Marca da peça</th><th>Modelo da peça</th><th>Data de fabricação</th>';
                echo '<tbody>';
                foreach ($parts as $part) { //Loop no array e pegando registro por registro e colcando nas tabelas
                    echo '<tr>';
                    echo '<td>' . $part['id'] . '</td>';
                    echo '<td>' . $part['partBrand'] . '</td>';
                    echo '<td>' . $part['partModel'] . '</td>';
                    echo '<td>' . $part['fabricationDate'] . '</td>';
                    echo '<td>
                        <a href="editParts.php?id=' . $part['id'] . '"class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </a>
                        <a href="deleteParts.php?id=' . $part['id'] . '"class="btn btn-danger btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                            </svg>
                        </a>
                    </td>';
                    echo '</tr>';
                }
                echo '</tbody></table>';
            } else {
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>ID</th><th>Nome</th><th>Sobrenome</th><th>Idade</th><th>E-mail</th><th>Gênero</th><th>Especialidade</th></tr></thead>';
                echo '<tbody>';
                echo '</tbody></table>';
            }
        ?>
    </div>

    <script src="../Scripts/cleanFieldsParts.js"></script>
</body>
</html>