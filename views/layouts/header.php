<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda de camisetas</title>

    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css">
</head>
<body>
    <!-- CONTAINER -->
    <div id="container">

        <!-- HEADER -->
        <header id="header">
            <div id="logo">
                <img src="<?= BASE_URL ?>assets/img/camiseta.png" alt="Camiseta Logo">
                <a href="<?= BASE_URL ?>index.php">
                    <h1>Tienda de camisetas</h1>
                </a>
            </div>
        </header>

        <!-- MENU -->
        <?php $categorias = Utils::showCategories(); ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="<?= BASE_URL ?>index.php">Inicio</a>
                </li>
                <?php while($categoria = $categorias->fetch_object()): ?>

                    <li>
                        <a href=""><?= $categoria->nombre; ?></a>                    
                    </li>

                <?php endwhile; ?>
            </ul>
        </nav>

        <div id="content">