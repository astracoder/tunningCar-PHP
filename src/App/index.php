<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Drazic Tunning Car - Dashboard</title>
</head>
<body>
    <?php
        include '../Components/menu.php';
    ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 m-3 p-3">
            <h1 class="text-center mb-3 pb-3 border-bottom border-2">Dashboard</h1>

        <div class="container">
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
    </div>
</body>
</html>