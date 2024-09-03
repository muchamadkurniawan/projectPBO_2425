<?php
require_once 'Nodes/nodeTransaksi.php';
class modelTransaksi{
    private $transaksis=[];
    private $nextId = 1;
    private $objModelTransaksi;

    public function addTransaksi($barang,$jumlah,$customer,$kasir){
        $transaksi = new nodeTransaksi($this->nextId++,$barang,$jumlah,$customer,$kasir);
        $this->transaksis[]=$transaksi;
        $this->saveToSession();
    }
    private function saveToSession(){
        $_SESSION['transaksis']=serialize($this->transaksis);
    }
    public function getAllTransaksi(){
        return $this->transaksis;
    }

    public function initDefaultTransaksi(){
        $this->addTransaksi();
    }

    public function getBarangInTransaksi($id){
        foreach ($this->transaksis as $transaksi){
            if ($transaksi->idTransaksi == $id){
                return $transaksi;
            }
        }
        return null;
    }
}
?>