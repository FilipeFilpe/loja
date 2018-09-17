<?php

class Ebook extends Livro{
    private $waterMark;
    
    public function getWaterMark()
    {
        return $this->waterMark;
    }

    public function setWaterMark($waterMark)
    {
        $this->waterMark = $waterMark;
    }

    public function atualizaBaseadoEm($params) {
        if ($this->temIsbn()) {
            $this->setIsbn($params['isbn']);
        }
        if ($this->temWaterMark()) {
            $this->setWaterMark($params['waterMark']);
        }
    }
}