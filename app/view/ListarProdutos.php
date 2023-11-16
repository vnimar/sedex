<?php
require_once 'app/model/classProduto.php';
require_once 'app/model/DAO/classProdutoDAO.php';

$classProdutoDAO = new ClassProdutoDAO();
$produtos = $classProdutoDAO->listarProdutos();
?>
<div class="conteiner conteiner-tabela">
    <table class="tabela">
        <thead class="tabela-cabecalho">
            <th scope="col"><p>Nome</p></th>
            <th scope="col"><p>Valor em Reais</p></th>
            <th scope="col"><p>Valor em Dolar</p></th>
            <th scope="col"><p>Peso</p></th>
            <th scope="col"><p>Imposto de 60%</p></th>
            <th scope="col"><p>Icms</p></th>
            <th scope="col"><p>Valor com Imposto</p></th>
            <th scope="col"><p>Diferença</p></th>
            <th scope="col"><p>Resultado</p></th>
            <th scope="col"><p>Excluir</p></th>
            <th scope="col"><p>Alterar</p></th>
        </thead>

        <?php foreach ($produtos as $produto): ?>
            <tr>
                <td scope="col"><p><?= $produto['nome'] ?></p></td>
                <td scope="col"><p><?= $produto['valorReais'] ?>R$</p></td>
                <td scope="col"><p><?= $produto['valorDolar'] ?>U$</p></td>
                <td scope="col"><p><?= $produto['peso'] ?>KG</p></td>
                <td scope="col"><p><?= $produto['imposto60'] ?>U$</p></td>
                <td scope="col"><p><?= $produto['icms'] ?>U$</p></td>
                <td scope="col"><p><?= $produto['valorComImposto'] ?>R$</p></td>
                <td scope="col"><p><?= $produto['diferenca'] ?>R$</p></td>
                <td scope="col"><p><?= $produto['resultado'] ?></p></td>
                <td scope="col" class="text-center">
                    <a href="app/controller/ControleProduto.php?ACAO=excluirProduto&idex=<?= $produto['idProduto'] ?>" onclick="return checkDelete()">
                        <input type="button" name="excluir" id="excluir" value="excluir" class="botao botao--excluir">
                    </a>
                </td>
                <td scope="col" class="text-center">
                    <a href="app/view/FormAltProduto.php?idex=<?= $produto['idProduto'] ?>">
                        <input type="button" value="alterar" class="botao botao--alterar">
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
