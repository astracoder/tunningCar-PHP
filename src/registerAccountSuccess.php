<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Drazic Tunning Car - Parabêns!</title>
</head>
<body>
    <?php
        include './Components/menuRegister.php';
    ?>
    <div class="container-fluid">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 m-3 p-3">
            <h1 class="text-danger text-center mb-5">Parabêns por se registrar!</h1>
            <div class="bg-dark p-4 border border-1 rounded-5 mb-5">
                <h5 class="text-light text-center">
                    Olá <span class="text-warning"><?php session_start(); if(isset($_SESSION['username'])) echo $_SESSION['username']; ?></span>,
                    sua conta foi criada com <span class="text-warning">sucesso</span> e agora você 
                    pode aproveitar todos os recursos que oferecemos. Se precisar de ajuda ou tiver alguma dúvida, nossa equipe está 
                    à disposição para ajudar.
                    <p class="pt-3 mt-3 border-top">E-mail e suporte: <span class="text-danger">system@suporte.com.br<span></p>
                </h5>
            </div>
        </div>
    </div>
</body>
</html>