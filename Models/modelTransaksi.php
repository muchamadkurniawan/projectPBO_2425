<?php
require_once 'Nodes/nodeTransaksi.php';
require_once 'Nodes/nodeBarang.php';
require_once 'Nodes/nodeUser.php';

class modelTransaksi{
    private $transaksis=[];
    private $nextId = 1;
    private $objModelTransaksi;

    public function __construct(){
        if(isset($_SESSION['transaksis'])){
            $this->transaksis = unserialize($_SESSION['transaksis']);
            $this->nextId = count($this->transaksis) + 1;
        }else{
            $this->initializeDefaultTransaksi();
        }
    }
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

    private function initializeDefaultTransaksi(){
        //create object
        $objUser = new modelUser();
        $objBarang = new modelBarang();
        //create data transaksi-1
        $barang1 = $objBarang->getBarangById(1);
        $jumlah1 = 2;
        $barang2 = $objBarang->getBarangById(2);
        $jumlah2 = 3;

        //add barang dan jumlah jadi satu variable
        $barangsA[] = $barang1;
        $barangsA[] = $barang2;
        $barangsB[] = $barang1;

        $jumlahsA[] = 2;
        $jumlahsA[] = 6;

        $jumlahsB[] = 2;

        $this->addTransaksi($barangsA, $jumlahsA, $objUser->getUserById(1), $objUser->getUserById(2));
        $this->addTransaksi($barangsB, $jumlahsB, $objUser->getUserById(1), $objUser->getUserById(2));
    }
}
?>