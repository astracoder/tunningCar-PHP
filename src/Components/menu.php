<div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><span class="fw-bold text-danger">DTC</span> - O melhor tunning do Brasil</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="index.php">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="cars.php">Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="mechanics.php">Mecanicos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active text-danger" aria-current="page" href="parts.php">Peças</a>
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                <?php 
                    session_start();
                    if(isset($_SESSION['email'])) echo '<span class="m-3 text-light">' . $_SESSION['email'] . '</span>'; 
                ?>
                <a class="btn btn-danger" href="../loginAccount.php">Logout</a>
            </div>
        </div>
    </nav>
</div>