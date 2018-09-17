<?php

class LivroFisico extends Livro{
    private $taxaImpressao;
    
    public function getTaxaImpressao()
    {
        return $this->taxaImpressao;
    }

    public function setTaxaImpressao($taxaImpressao)
    {
        $this->taxaImpressao = $taxaImpressao;
    }

    public function atualizaBaseadoEm($params) {
        if ($this->temIsbn()) {
            $this->setIsbn($params['isbn']);
        }
        if ($this->temTaxaImpressao()) {
            $this->setTaxaImpressao($params['taxaImpressao']);
        }
    }
}