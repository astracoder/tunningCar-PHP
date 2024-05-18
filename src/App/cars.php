<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Drazic Tunning Car</title>
</head>
<body>
    <?php
        include '../Components/menu.php';
    ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 m-3 p-3">
            <h1 class="text-center mb-3">Cadastro de serviço</h1>
            <form action="Database/dbLogin/validateLoginAccount.php" method="post">
            <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Digite o seu e-mail...">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Senha</label>
                    <input class="form-control" type="password" name="password" placeholder="Digite a sua senha...">
                </div>
                <input class="btn btn-outline-dark" type="button" value="Limpar">
                <input class="btn btn-danger" type="submit" value="Login">
            </form>
        </div>
    </div>
</body>
</html>