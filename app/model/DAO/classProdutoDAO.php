<?php
require_once 'conexao.php';
class ClassProdutoDAO
{
    public function cadastrar(ClassProduto $cadastrarProduto)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO produto (nome, valorReais, valorDolar, peso, imposto60, icms, valorComImposto, diferenca, resultado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);

            $nome = $cadastrarProduto->getNome();
            $valorReais = $cadastrarProduto->getValorReais();
            $valorDolar = $cadastrarProduto->getValorDolar();
            $peso = $cadastrarProduto->getPeso();
            $imposto60 = $cadastrarProduto->setImposto60()->getImposto60();
            $icms = $cadastrarProduto->setIcms()->getIcms();
            $valorComImposto = $cadastrarProduto->setValorComImposto()->getValorComImposto();
            $diferenca = $cadastrarProduto->setDiferenca()->getDiferenca();
            $resultado = $cadastrarProduto->setResultado()->getResultado();

            $stmt->bindValue(1, $nome);
            $stmt->bindValue(2, $valorReais);
            $stmt->bindValue(3, $valorDolar);
            $stmt->bindValue(4, $peso);
            $stmt->bindValue(5, $imposto60);
            $stmt->bindValue(6, $icms);
            $stmt->bindValue(7, $valorComImposto);
            $stmt->bindValue(8, $diferenca);
            $stmt->bindValue(9, $resultado);
            $stmt->execute();

            return true;
        } catch (PDOException $exc) {
            throw new Exception($exc->getMessage());
        }
    }
    public function buscarProduto($idProduto)
    {
        try {
            $produto = new ClassProduto();
            $pdo = Conexao::getInstance();
            $sql = "SELECT idProduto, nome, valorReais, valorDolar, peso, imposto60, icms, valorComImposto, diferenca, resultado FROM produto WHERE idProduto = :id LIMIT 1";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $idProduto);

            $stmt->execute();
            $produtoAssoc = $stmt->fetch(PDO::FETCH_ASSOC);

            $produto->setIdProduto($produtoAssoc['idProduto']);
            $produto->setNome($produtoAssoc['nome']);
            $produto->setValorReais($produtoAssoc['valorReais']);
            $produto->setValorDolar($produtoAssoc['valorDolar']);
            $produto->setPeso($produtoAssoc['peso']);
            $produto->setImposto60();
            $produto->setIcms();
            $produto->setValorComImposto();
            $produto->setDiferenca();
            $produto->setResultado();

            return $produto;
        } catch (PDOException $exc) {
            throw new Exception($exc->getMessage());
        }
    }

    public function listarProdutos()
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM produto";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $produtos;
        } catch (PDOException $exc) {
            throw new Exception($exc->getMessage());
        }
    }

    public function alterarProduto(ClassProduto $alterarProduto)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE produto SET nome=?, valorReais=?, valorDolar=?, peso=?, imposto60=?, icms=?, valorComImposto=?, diferenca=?, resultado=? WHERE idProduto=? ";
            $stmt = $pdo->prepare($sql);

            $stmt->bindValue(1, $alterarProduto->getNome());
            $stmt->bindValue(2, $alterarProduto->getValorReais());
            $stmt->bindValue(3, $alterarProduto->getValorDolar());
            $stmt->bindValue(4, $alterarProduto->getPeso());
            $stmt->bindValue(5, $alterarProduto->setImposto60()->getImposto60());
            $stmt->bindValue(6, $alterarProduto->setIcms()->getIcms());
            $stmt->bindValue(7, $alterarProduto->setValorComImposto()->getValorComImposto());
            $stmt->bindValue(8, $alterarProduto->setDiferenca()->getDiferenca());
            $stmt->bindValue(9, $alterarProduto->setResultado()->getResultado());
            $stmt->bindValue(10, $alterarProduto->getIdProduto());
            $stmt->execute();
            return $stmt->rowCount();
        } catch (PDOException $exc) {
            throw new Exception($exc->getMessage());
        }
    }

    public function excluirProdutos($idProduto)
    {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM produto WHERE idProduto =:idProduto";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':idProduto', $idProduto);
            $stmt->execute();
            return TRUE;
        } catch (PDOException $exc) {
            throw new Exception($exc->getMessage());
        }
    }


}