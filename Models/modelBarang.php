<?php
require_once 'Nodes/nodeBarang.php';
class modelBarang
{
    private $barangs = [];
    private $nextId = 1;
    private $objBarang;


    public function __construct(){
        if(isset($_SESSION['barangs'])){
            $this->barangs = unserialize($_SESSION['barangs']);
            $this->nextId = count($this->barangs)+1;
        }else{
            $this->initiliazeDefaultBarang();
        }
    }

    public function addBarang($barangName, $hargaBarang)
    {
//        echo $this->nextId;
        $this->objBarang = new nodeBarang($this->nextId++, $barangName, $hargaBarang);
        $this->barangs[] = $this->objBarang;
        $this->saveToSession();
    }

    private function saveToSession(){
        $_SESSION['barangs'] = serialize($this->barangs);
    }

    public function getAllBarangs(){
        return $this->barangs;
    }

    public function getListBarang()
    {
        $listBarang = [];
        foreach ($this->barangs as $barang){
            $listBarang[] = $this->barangs->namaBarang;
        }
        return $listBarang;
    }

    public function initiliazeDefaultBarang(){
        $this->addBarang("sapu",4000);
        $this->addBarang("cikrak",3000);
        $this->addBarang("kemucing",2000);
        $this->addBarang("tongkat pel",9000);
    }

    public function getBarangById($id){
        foreach ($this->barangs as $barang){
            if ($barang->idBarang == $id){
                return $barang;
            }
        }
        return null;
    }
}