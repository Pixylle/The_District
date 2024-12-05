<?php session_start(); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gourmango</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style3.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <section id="promocat">
        <div class="adress d-flex justify-content-between">
            <div>+4733378901  Email: food@restan.com</div>
            <div>175 10h Street, Office 375 Berlin, De 21562</div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Переключатель навигации">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="plats.php">TOUS LES PLATS</a>
                        </li>
                        <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="categories.php">CATéGORIES</a>
                                </li>
                                
                    </ul>
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Recherche" aria-label="Recherche">
                        <button class="btn btn-outline-success " type="submit">
                            Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>
        
        <div id="content">
        <div id="logo" class="d-flex">
            <img src="/src/img/logonoir-removebg-preview.png" alt="Logo">
        </div>
    </section>
</head>