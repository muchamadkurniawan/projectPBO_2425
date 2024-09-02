<?php

class nodeTransaksi
{
    public $idTransaksi;
    public $barang=[];
    public $jumlah=[];
    public $total;
    public $customer;
    public $kasir;

    /**
     * @param $idTransaksi
     * @param $barang
     * @param $customer
     * @param $kasir
     */
    public function __construct($idTransaksi, $barang, $customer, $kasir)
    {
        $this->idTransaksi = $idTransaksi;
        $this->barang = $barang;
        $this->customer = $customer;
        $this->kasir = $kasir;
    }
}