<?php
require_once 'Models/modelTransaksi.php';
class controllerTransaksi
{
    private $transaksiModel;

    public function __construct(){
        $this->transaksiModel = new modelTransaksi();
    }

    public function listTransaksi(){
        $transaksis = $this->transaksiModel->getAllTransaksi();
        include 'Views/transaksi_list.php';
    }
}