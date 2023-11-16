<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sedex - alterar produto</title>
    <link rel="stylesheet" href="../../public/css/reset.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../../public/css/style.css">
</head>

<body>
    <header class="cabecalho">
        <h1 class="cabecalho__titulo">Sedex</h1>
    </header>
    <main class="principal">
        <h2 class="titulo-formulario">Formulario de atualização de Produtos</h2>
        <div class="conteiner-form">
            <?php
            require '../model/ClassProduto.php';
            require '../model/DAO/ClassprodutoDAO.php';

            $id = @$_GET['idex'];
            $novoProduto = new ClassProduto();
            $produtoDAO = new ClassProdutoDAO();
            $novoProduto = $produtoDAO->buscarProduto($id);
            ?>
            <form method="post" action="../controller/ControleProduto.php?ACAO=alterarProduto">
                <div class="grupoFormulario">
                    <input type="hidden" name="idex" value="<?php echo $novoProduto->getIdProduto(); ?>">
                    <label for="nome" class="legenda-form">Nome:</label>
                    <input class="input-form" type="text" name="nome" size="50"
                        value="<?php echo $novoProduto->getNome(); ?>" required />
                </div>
                <div class="grupoFormulario">
                    <label for="valorReais" class="legenda-form">Valor em Reais:</label>
                    <input class="input-form" type="number" id="valorReais" name="valorReais" size="40"
                        placeholder="Digite o valor do produto em reais (R$)"
                        value="<?php echo $novoProduto->getValorReais(); ?>" step="0.01" required />
                </div>
                <div class="grupoFormulario">
                    <label for="valorDolar" class="legenda-form">Valor em Dolar:</label>
                    <input class="input-form" type="number" id="valorDolar" name="valorDolar" size="40"
                        placeholder="Digite o valor do produto em dolar (U$)"
                        value="<?php echo $novoProduto->getValorDolar(); ?>" step="0.01" required />
                </div>
                <div class="grupoFormulario">
                    <label for="Peso" class="legenda-form">Valor em Peso:</label>
                    <input class="input-form" type="number" id="peso" name="peso" size="40"
                        placeholder="Digite o peso do produto" value="<?php echo $novoProduto->getPeso(); ?>"
                        step="0.01" required />
                </div>
                <div class="grupoFormulario">
                    <button class="botao botao--registrar" type="submit" value="Alterar">Alterar</button>
                    <button class="botao botao--limpar" type="reset" value="Limpar">Limpar</button>
                </div>
        </div>
        </form>
    </main>
    <footer class="rodape">
        <p class="rodape__texto">&copy; 2023 - todos os direitos reservados</p>
    </footer>
</body>

</html>