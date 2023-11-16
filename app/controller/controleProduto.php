<?php
require_once '../model/classProduto.php';
require_once '../model/DAO/classProdutoDAO.php';

$id = isset($_POST['idex']) ? $_POST['idex'] : null; // isset para não ter retorno nulo
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$valorReais = isset($_POST['valorReais']) ? $_POST['valorReais'] : null;
$valorDolar = isset($_POST['valorDolar']) ? $_POST['valorDolar'] : null;
$peso = isset($_POST['peso']) ? $_POST['peso'] : null;
$ACAO = isset($_GET['ACAO']) ? $_GET['ACAO'] : null;

$novoProduto = new ClassProduto();
$novoProduto->setIdProduto($id);
$novoProduto->setNome($nome);
$novoProduto->setValorReais($valorReais);
$novoProduto->setValorDolar($valorDolar);
$novoProduto->setPeso($peso);

$classProdutoDAO = new ClassProdutoDAO();

switch ($ACAO) {
    case "cadastrarProduto":
        $produto = $classProdutoDAO->cadastrar($novoProduto);
        if ($produto) {
            header('Location:../../index.php?MSG=Produto cadastrado realizado com sucesso!');
        } else {
            header('Location:../../index.php?MSG=Não foi possível realizar o cadastro do produto!');
        }
        break;
    case 'alterarProduto':
        $produto = $classProdutoDAO->alterarProduto($novoProduto);

        if ($produto == 1) {
            header('Location:../../index.php?&MSG= Produto atualizado com sucesso!');
        } else {
            header('Location:../../index.php?&MSG= Não foi possivel realizar a atualização!');
        }
        break;

    case "excluirProduto":
        if (isset($_GET['idex'])) {
            $idProduto = $_GET['idex'];
            $classProdutoDAO = new ClassProdutoDAO();
            $us = $classProdutoDAO->excluirProdutos($idProduto);
            if ($us == TRUE) {
                header('Location:../../index.php?PAGINA=listarProduto&MSG= Produto foi excluido com sucesso!');
            } else {
                header('Location:../../index.php?PAGINA=listarProduto&MSG= Não foi possivel realizar a exclusão do produto!');
            }
        }
        break;

    default:
        header('Location:../../index.php?MSG= Ação não reconhecida!');
        break;
}