<?php

require "vendor/autoload.php";

use Emanuelaguiar\LoginPhp\Classes\User;

session_start();
if(!isset($_SESSION['user'])){
    header('location: form-login.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Painel Admin</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">

    <!-- Bootstrap JS e Popper.js (requeridos para os componentes JavaScript do Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</head>
<body>

<!-- Navbar preta no topo com botão de logout à direita -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="logout.php" class="btn btn-outline-light my-2 my-sm-0">Sair</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <!-- Barra lateral à esquerda -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            Link 1
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Link 2
                        </a>
                    </li>
                    <!-- Adicione mais links conforme necessário -->
                </ul>
            </div>
        </nav>

        <!-- Conteúdo à direita -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <!-- Adicione seu conteúdo aqui -->
            <h2>Conteúdo da Página</h2>
            <p>Seu conteúdo vai aqui...</p>

            <ul>
            <?php foreach(User::getAll() as $user ): ?>
                <li><?php echo $user->name . " - " . $user->email;  ?></li>
            <?php endforeach ?>
            </ul>
        </main>
    </div>
</div>

</body>
</html>
