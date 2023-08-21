<?php

use Eclesiaste\TesteTecnicoDevPhp\services\UserManagement;
 if (isset($_POST['moreClients'])) {
    $service = new UserManagement();
    $service->getClients();
    header("location:index.php");
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Lista de clientes</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <a class="navbar-brand" href="index.php">
                <img src="https://www.nicepng.com/png/detail/63-633652_how-to-set-use-blue-person-symbol-svg.png" alt="Agenda">
            </a>
            <div class="d-flex align-items-center flex-column justify-content-center">
                <div class="navbar-nav">
                    <h1 class="m-0"><a class="nav-link text-white active" id="home-link" href="index.php">Lista de clientes</a></h1>
                </div>
                <form action="" method="post">
                    <button type="submit" name="moreClients" class="btn btn-sm btn-light" id="mais-clientes-button">Mais clientes...</button>
                </form>
            </div>
        </nav>
    </header>
