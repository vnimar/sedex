<h2 class="titulo-formulario">Formulário de Cadastro de Produtos</h2>
<div class="conteiner-form">
    <form method="post" action="app/controller/controleProduto.php?ACAO=cadastrarProduto">
        <div class="grupoFormulario">
            <label for="nome" class=" legenda-form">Nome:</label>
            <input class="input-form" type="text" name="nome" id="nome" maxlength="40"
                placeholder="Digite o nome do produto" required>
        </div>
        <div class="grupoFormulario">
            <label for="valorReais" class="legenda-form">Valor em reais:</label>
            <input class="input-form" type="number" name="valorReais" id="valorReais" maxlength="40"
                placeholder="Digite o valor do produto em reais (R$)" step="0.01" required>
        </div>
        <div class="grupoFormulario">
            <label for="valorDolar" class="legenda-form">Valor em dolar:</label>
            <input class="input-form" type="number" name="valorDolar" id="valorDolar" maxlength="40"
                placeholder="Digite o valor do produto em dolar (U$)" step="0.01" required>
        </div>
        <div class="grupoFormulario">
            <label for="peso" class="legenda-form">Peso:</label>
            <input class="input-form" type="number" name="peso" id="peso" maxlength="40"
                placeholder="Digite o peso do produto (Kg)" step="0.01" required>
        </div>
        <div class="grupoFormulario">
            <button class="botao botao--registrar" type="submit" value="Registrar">Registrar</button>
            <button class="botao botao--limpar" type="reset" value="Limpar">Limpar</button>
        </div>
    </form>
</div>
</form>
</div>