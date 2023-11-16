<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sedex</title>
    <link rel="stylesheet" href="./public/css/reset.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="./public/css/style.css">
</head>

<body class="bg-dark-subtle">
    <header class="cabecalho">
        <h1 class="cabecalho__titulo">Sedex</h1>
    </header>
    <?php
    $msg = $_GET['MSG'] ?? ''; //  usando o operador de coalescência nula; 
    if ($msg != null || $msg != '') {
        echo "<script>alert('" . htmlspecialchars($msg, ENT_QUOTES) . "')</script>"; // htmlspecialchars para segurança
    }
    ?>
    <main class="principal">
        <?php
        include './app/view/FormCadProduto.php';
        include './app/view/ListarProdutos.php';
        ?>
    </main>
    <footer class="rodape">
        <p class="rodape__texto">&copy; 2023 - todos os direitos reservados</p>
    </footer>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="public/js/main.js"></script>
</body>

</html>