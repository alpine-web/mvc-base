<!doctype html>
<html lang="nl">
    <head>
        <!-- META -->
        <meta charset="UTF-8">

        <!-- CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= URLROOT; ?>/css/main.css">

        <!-- PAGE DATA -->
        <title><?= SITENAME; ?> - <?= $data['pagetitle']; ?></title>
    </head>

    <body>
        <header>
            <div class="container h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-md-12 text-white">
                        <h2>
                            Shop
                        </h2>
                    </div>
                </div>
            </div>
        </header>

<?php require_once APPROOT . "/views/fragments/navbar.php"; ?>
        
        <main class="container">
