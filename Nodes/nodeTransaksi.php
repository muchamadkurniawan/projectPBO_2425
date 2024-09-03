<?php

class nodeTransaksi
{
    public $idTransaksi;
    public $barangs=[];
    public $jumlahs=[];
    public $total;
    public $customer;
    public $kasir;

//    /**
//     * @param $idTransaksi
//     * @param $barang
//     * @param $customer
//     * @param $kasir
//     */
    public function __construct($idTransaksi, $barang, $jumlah, $customer, $kasir)
    {
        $this->idTransaksi = $idTransaksi;
        $this->barangs = $barang;
        $this->customer = $customer;
        $this->kasir = $kasir;
        $this->jumlahs = $jumlah;
    }
}