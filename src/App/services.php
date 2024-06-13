<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Drazic Tunning Car - Cadastro de serviços</title>
</head>
<body>
    <?php
        include '../Components/menu.php';
    ?>

    <?php
        include '../Database/connection.php'; // Certifique-se de que a conexão com o banco de dados está correta

        $sql = "SELECT id, firstName, lastName FROM mechanics";
        $resultMechanics = $database->query($sql);

        $mechanics = []; // Array de mecânicos

        // Colocando todos os registros de mecânicos no array
        if ($resultMechanics->num_rows > 0) {
            while($row = $resultMechanics->fetch_assoc()) {
                $mechanics[] = $row;
            }
        }

        $sql = "SELECT id, partBrand, partModel FROM parts";
        $resultParts = $database->query($sql);

        $parts = []; // Array de mecânicos

        // Colocando todos os registros de mecânicos no array
        if ($resultParts->num_rows > 0) {
            while($row = $resultParts->fetch_assoc()) {
                $parts[] = $row;
            }
        }
    ?>

    <div class="container-fluid">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 m-3 p-3">
            <h1 class="text-center mb-3 pb-3 border-bottom border-2">Cadastro de serviços</h1>

            <form action="../../src/Database/dbServices/addService.php" method="post">
                <div class="mb-3">
                    <label class="form-label" for="title">Título</label>
                    <input class="form-control" id="title" type="text" name="title" placeholder="Digite o título...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorTitle'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorTitle'] . '</p>'; 
                        unset($_SESSION['errorTitle']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="description">Solicitação ou descrição do problema</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Descreva a solicitação ou problema..."></textarea>
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorDescription'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorDescription'] . '</p>'; 
                        unset($_SESSION['errorDescription']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="nameMechanic">Mecânicos</label>
                    <select class="form-select" id="nameMechanic" name="nameMechanic">
                        <option disabled selected>Selecionar mecânico</option>
                        <?php foreach($mechanics as $mechanic): ?>
                            <option value="<?php echo $mechanic['firstName']; ?>"><?php echo $mechanic['firstName'] . ' ' . $mechanic['lastName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                <div>
                <div class="mb-3 mt-3">
                    <label class="form-label" for="nameClient">Nome do cliente</label>
                    <input class="form-control" id="nameClient" type="text" name="nameClient" placeholder="Digite o nome do cliente...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorNameClient'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorNameClient'] . '</p>'; 
                        unset($_SESSION['errorNameClient']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="brandCarClient">Marca do carro do cliente</label>
                    <input class="form-control" id="brandCarClient" type="text" name="brandCarClient" placeholder="Digite a marca do carro ex: Ford">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorBrandCarClient'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorBrandCarClient'] . '</p>'; 
                        unset($_SESSION['errorBrandCarClient']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="modelCarClient">Modelo do carro do cliente</label>
                    <input class="form-control" id="modelCarClient" type="text" name="modelCarClient" placeholder="Digite o modelo do carro ex: Maverick">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorModelCarClient'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorModelCarClient'] . '</p>'; 
                        unset($_SESSION['errorModelCarClient']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="plateCarClient">Placa do carro do cliente</label>
                    <input class="form-control" id="plateCarClient" type="text" name="plateCarClient" placeholder="Digite a placa do carro do cliente ex: ABC1D23">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorPlateCarClient'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorPlateCarClient'] . '</p>'; 
                        unset($_SESSION['errorPlateCarClient']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="namePart">Peças e itens</label>
                    <select class="form-select" id="namePart" name="namePart">
                        <option disabled selected>Selecionar peça</option>
                        <?php foreach($parts as $part): ?>
                            <option value="<?php echo $part['partBrand']; ?>"><?php echo $part['partBrand'] . ' ' . $part['partModel']; ?></option>
                        <?php endforeach; ?>
                    </select>
                <div>

                <p class="text-secondary mt-1">*Apenas uma peça por serviço</p>

                <?php 
                    session_start();
                    if(isset($_SESSION['errorFields'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorFields'] . '</p>'; 
                    unset($_SESSION['errorFields']);
                ?>

                <input id="cleanBtn" class="btn btn-outline-dark" type="button" value="Limpar campos">
                <input class="btn btn-success" type="submit" value="Cadastrar serviço">
            </form>
        </div>
    </div>

    <h4 class="text-white bg-secondary text-left mt-5 border-bottom border-1 rounded p-3">Gerenciamento de serviços</h4>

    <?php
        include '../Database/connection.php';

        $sql = "SELECT id, title, description, nameMechanic, nameClient, brandCarClient, modelCarClient, plateCarClient, namePart FROM services";
        $resultServices = $database->query($sql);

        $services = []; //Array de serviços

        //Colocando todos os registros de serviços no array
        if ($resultServices->num_rows > 0) {
            while($row = $resultServices->fetch_assoc()) {
                $services[] = $row;
            }
        }

        //Se houver
        if (!empty($services)) {
            echo '<table class="table table-striped">';
            echo '<thead><tr><th>ID</th><th>Título</th><th>Descrição</th><th>Mecânico</th><th>Cliente</th><th>Marca</th><th>Modelo</th><th>Placa</th><th>Peça</th>';
            echo '<tbody>';
            foreach ($services as $service) { //Loop no array e pegando registro por registro e colcando nas tabelas
                echo '<tr>';
                echo '<td>' . $service['id'] . '</td>';
                echo '<td>' . $service['title'] . '</td>';
                echo '<td>' . $service['description'] . '</td>';
                echo '<td>' . $service['nameMechanic'] . '</td>';
                echo '<td>' . $service['nameClient'] . '</td>';
                echo '<td>' . $service['brandCarClient'] . '</td>';
                echo '<td>' . $service['modelCarClient'] . '</td>';
                echo '<td>' . $service['plateCarClient'] . '</td>';
                echo '<td>' . $service['namePart'] . '</td>';
                echo '<td>
                    <a href="deleteService.php?id=' . $service['id'] . '"class="btn btn-danger btn-sm">Cancelar serviço</a>
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

</body>
</html>