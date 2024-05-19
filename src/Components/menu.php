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
                        <a class="nav-link active text-danger" aria-current="page" href="services.php">Serviços</a>
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
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
                <?php 
                    session_start();
                    if(isset($_SESSION['email'])) echo '<span class="text-light">' . $_SESSION['email'] . '</span>'; 
                ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                </svg>
                <a class="btn btn-danger" href="../loginAccount.php">Logout</a>
            </div>
        </div>
    </nav>
</div>