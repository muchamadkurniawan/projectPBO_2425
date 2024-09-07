<?php

class nodeBarang
{
    public $idBarang;
    public $nameBarang;
    public $hargaBarang;

    public function __construct($idBarang, $namaBarang, $harga){
        $this->idBarang = $idBarang;
        $this->nameBarang = $namaBarang;
        $this->hargaBarang = $harga;
    }
}
?>