<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Drazic Tunning Car - Registro</title>
</head>
<body>
    <?php
        include './Components/menuRegister.php';
    ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 m-3 p-3">
            <h1 class="text-center">Registre a sua conta</h1>
            <form action="Database/dbRegister/addRegisterAccount.php" method="post">
            <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" type="email" name="email" placeholder="Digite o seu melhor e-mail...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorEmail'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorEmail'] . '</p>'; 
                        unset($_SESSION['errorEmail']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="user">Usuário</label>
                    <input class="form-control" id="user" type="text" name="user" placeholder="Digite o seu usuário...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorUser'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorUser'] . '</p>'; 
                        unset($_SESSION['errorUser']);
                    ?>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Senha</label>
                    <input class="form-control" id="password" type="password" name="password" placeholder="Digite a sua melhor senha...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorPassword'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorPassword'] . '</p>'; 
                        unset($_SESSION['errorPassword']);
                    ?>
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorFields'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorFields'] . '</p>'; 
                        unset($_SESSION['errorFields']);
                    ?>
                </div>

                <input onclick="" id="clean" class="btn btn-outline-dark" type="button" value="Limpar">
                <input class="btn btn-danger" type="submit" value="Registrar">
            </form>
        </div>
        <div class="col-md-3"></div><!-- Div vazia -->
        </div>
    </div>

    <script src="Scripts/cleanFields.js"></script>
</body>
</html>