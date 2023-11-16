<?php
class ClassProduto
{
    private $idProduto;
    private $nome; //nome do produto
    private $valorReais; //preco do produto em reais que não recebe imposto
    private $valorDolar; //preco do produto em dolar que vai receber o imposto e ser convertido em reais no final
    private $peso; // peso do produto que vai influenciar no frete
    private $imposto60; // imposto de 60% sobre o total 
    private $icms; //icms do produto    
    private $frete; //frete do produto
    private $servico; //preco do servido do produto
    private $valorComImposto; // preco em dolar com imposto convertido para reais
    private $diferenca;
    private $resultado;

    public function getIdProduto()
    {
        return $this->idProduto;
    }

    public function setIdProduto($idProduto): self
    {
        $this->idProduto = $idProduto;
        return $this;
    }
    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;
        return $this;
    }
    public function getValorReais()
    {
        return $this->valorReais;
    }

    public function setValorReais($valorReais): self
    {
        $this->valorReais = $valorReais;
        return $this;
    }

    public function getValorDolar()
    {
        return $this->valorDolar;
    }

    public function setValorDolar($valorDolar): self
    {
        $this->valorDolar = $valorDolar;
        return $this;
    }


    public function getPeso()
    {
        return $this->peso;
    }

    public function setPeso($peso): self
    {
        $this->peso = $peso;
        return $this;
    }

    public function getImposto60()
    {
        return $this->imposto60;
    }

    public function setImposto60(): self
    {
        $this->imposto60 = $this->valorDolar * 0.6;
        return $this;
    }
    public function getIcms()
    {
        return $this->icms;
    }

    public function setIcms(): self
    {
        $this->icms = $this->valorDolar * 0.12;
        return $this;
    }

    public function getFrete()
    {
        return $this->frete;
    }

    public function setFrete(): self
    {
        if ($this->peso == 1) {
            $this->frete = 15;
        } elseif ($this->peso == 2) {
            $this->frete = 25;
        } elseif ($this->peso == 3) {
            $this->frete = 35;
        } elseif ($this->peso == 4) {
            $this->frete = 45;
        } elseif ($this->peso == 5) {
            $this->frete = 55;
        } elseif ($this->peso == 6) {
            $this->frete = 70;
        } elseif ($this->peso == 7) {
            $this->frete = 80;
        } elseif ($this->peso == 8) {
            $this->frete = 90;
        } elseif ($this->peso == 9) {
            $this->frete = 100;
        } elseif ($this->peso == 10) {
            $this->frete = 110;
        }
        return $this;
    }

    public function getServico()
    {
        return $this->servico;
    }

    public function setServico(): self
    {
        if ($this->peso <= 4) {
            $this->servico = 3.99;
        } elseif ($this->peso <= 10) {
            $this->servico = 7.99;
        } elseif ($this->peso > 10) {
            $this->servico = 12.99;
        }
        return $this;
    }

    public function getValorComImposto()
    {
        return $this->valorComImposto;
    }

    public function setValorComImposto(): self
    {
        $conversao = 5.0; // dolar para real
        $this->valorComImposto = ($this->valorDolar + $this->servico + $this->imposto60 + $this->frete + $this->icms) * $conversao;
        return $this;
    }

    public function getDiferenca()
    {
        return $this->diferenca;
    }

    public function setDiferenca(): self
    {
        if ($this->valorReais > $this->valorComImposto) {
            $this->diferenca = $this->valorReais - $this->valorComImposto;
            return $this;
        } else {
            $this->diferenca = $this->valorComImposto - $this->valorReais;
            return $this;
        }
    }

    public function getResultado()
    {
        return $this->resultado;
    }

    public function setResultado(): self
    {
        if ($this->valorComImposto < $this->valorReais) {
            $this->resultado = 'Compensa comprar em dolar!';
            return $this;
        } else {
            $this->resultado = 'Não compensa comprar em dolar!';
            return $this;
        }
    }
}
