<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Drazic Tunning Car - Cadastro de mecânicos</title>
</head>
<body>
    <?php
        include '../Components/menu.php';
    ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 m-3 p-3">
            <h1 class="text-center mb-3 pb-3 border-bottom border-2">Cadastro de mecânicos</h1>
            <form action="../../src/Database/dbMechanics/addMechanic.php" method="post">
                <div class="mb-3">
                    <label class="form-label" for="firstName">Nome</label>
                    <input class="form-control" id="firstName" type="text" name="firstName" placeholder="Digite o nome...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorFirstName'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorFirstName'] . '</p>'; 
                        unset($_SESSION['errorFirstName']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="lastName">Sobrenome</label>
                    <input class="form-control" id="lastName" type="text" name="lastName" placeholder="Digite o sobrenome...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorLastName'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorLastName'] . '</p>'; 
                        unset($_SESSION['errorLastName']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="age">Idade</label>
                    <input class="form-control" id="age" type="text" name="age" placeholder="Digite a idade...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorAge'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorAge'] . '</p>'; 
                        unset($_SESSION['errorAge']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="emailMechanic">E-mail</label>
                    <input class="form-control" id="emailMechanic" type="email" name="emailMechanic" placeholder="Digite o e-mail...">
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="M" required checked>
                    <label class="form-check-label" for="gender">Masculino</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" value="F">
                    <label class="form-check-label" for="gender">Feminino</label>
                </div>
                <div class="mt-3 mb-3">
                    <label class="form-label" for="specialty">Especialidade</label>
                    <select class="form-select" name="specialty" required>
                        <option disabled selected>Selecione uma especialidade</option>
                        <option value="Motor">Motor</option>
                        <option value="Injecao eletronica">Injeção eletrônica</option>
                        <option value="Carburador">Carburador</option>
                        <option value="Funilaria">Funilaria</option>
                        <option value="Estetica automotiva">Estética automotiva</option>
                    </select>
                </div>
                <?php 
                    session_start();
                    if(isset($_SESSION['errorFields'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorFields'] . '</p>'; 
                    unset($_SESSION['errorFields']);
                ?>
                <input id="cleanBtn" class="btn btn-outline-dark" type="button" value="Limpar campos">
                <input class="btn btn-success" type="submit" value="Cadastrar mecânico">
            </form>
        </div>
    </div>
    <div class="container">
    <h4 class="text-white bg-secondary text-left mt-5 mb-3 border-bottom border-1 rounded p-3">Gerenciamento de mecânicos</h4>
        <?php
            include '../Database/connection.php';

            $sql = "SELECT id, firstName, lastName, age, emailMechanic, gender, specialty FROM mechanics";
            $resultMechanics = $database->query($sql);

            $mechanics = []; //Array de mecanicos

            //Colocando todos os registros de mecanicos no array
            if ($resultMechanics->num_rows > 0) {
                while($row = $resultMechanics->fetch_assoc()) {
                    $mechanics[] = $row;
                }
            }

            //Se houver
            if (!empty($mechanics)) {
                echo '<table class="table table-striped">';
                echo '<thead><tr><th>ID</th><th>Nome</th><th>Sobrenome</th><th>Idade</th><th>E-mail</th><th>Gênero</th><th>Especialidade</th></tr></thead>';
                echo '<tbody>';
                foreach ($mechanics as $mechanic) { //Loop no array e pegando registro por registro e colcando nas tabelas
                    echo '<tr>';
                    echo '<td>' . $mechanic['id'] . '</td>';
                    echo '<td>' . $mechanic['firstName'] . '</td>';
                    echo '<td>' . $mechanic['lastName'] . '</td>';
                    echo '<td>' . $mechanic['age'] . '</td>';
                    echo '<td>' . $mechanic['emailMechanic'] . '</td>';
                    echo '<td>' . ($mechanic['gender'] == 'M' ? 'Masculino' : 'Feminino') . '</td>';
                    echo '<td>' . $mechanic['specialty'] . '</td>';
                    echo '<td>
                            <a href="editMechanic.php?id=' . $mechanic['id'] . '"class="btn btn-primary btn-sm">Editar</a>
                            <a href="deleteMechanic.php?id=' . $mechanic['id'] . '"class="btn btn-danger btn-sm">Excluir</a>
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

    <script src="../Scripts/cleanFieldsMechanic.js"></script>
</body>
</html>