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
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#DC3545" class="bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                    </svg>
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" type="email" name="email" placeholder="Digite o seu melhor e-mail...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorEmail'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorEmail'] . '</p>'; 
                        unset($_SESSION['errorEmail']);
                    ?>
                </div>
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#DC3545" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                    </svg>
                    <label class="form-label" for="user">Usuário</label>
                    <input class="form-control" id="user" type="text" name="user" placeholder="Digite o seu usuário...">
                    <?php 
                        session_start();
                        if(isset($_SESSION['errorUser'])) echo '<p class="alert alert-danger mt-2">' . $_SESSION['errorUser'] . '</p>'; 
                        unset($_SESSION['errorUser']);
                    ?>
                </div>
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#DC3545" class="bi bi-key" viewBox="0 0 16 16">
                        <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
                        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                    </svg>
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

                <input id="cleanBtn" class="btn btn-outline-dark" type="button" value="Limpar">
                <input class="btn btn-danger" type="submit" value="Registrar">
            </form>
        </div>
        <div class="col-md-3"></div><!-- Div vazia -->
        </div>
    </div>

    <script src="Scripts/cleanFieldsRegister.js"></script>
</body>
</html>