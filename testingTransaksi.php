<?php
//testing transksi
//create session
session_start();

//create model user, barang, dan transaksi
require_once 'Models/modelUser.php';
require_once 'Models/modelBarang.php';
require_once 'Models/modelTransaksi.php';

//destroy session();
//session_destroy();

//create object
$objUser = new modelUser();
$objBarang = new modelBarang();
$objTransaksi = new modelTransaksi();

//create data transaksi-1
$barang1 = $objBarang->getBarangById(1);
$jumlah1 = 2;
$barang2 = $objBarang->getBarangById(2);
$jumlah2 = 3;

//add barang dan jumlah jadi satu variable
$barangsA[]=$barang1;
$barangsA[]=$barang2;
$barangsB[]=$barang1;

$jumlahsA[]=2;
$jumlahsA[]=6;

$jumlahsB[]=2;


$objTransaksi->addTransaksi($barangsA,$jumlahsA,$objUser->getUserById(1),$objUser->getUserById(2));
$objTransaksi->addTransaksi($barangsB,$jumlahsB,$objUser->getUserById(1),$objUser->getUserById(2));

//testing get Transaksi
$transaksis = $objTransaksi->getAllTransaksi();
foreach ($transaksis as $transaksi){
    echo "Transaksi ID: " . $transaksi->idTransaksi . "<br>";
    echo "Customer: " . $transaksi->customer->name . "<br>";
    echo "Kasir: " . $transaksi->kasir->name . "<br>";
    echo "Barang: <br>";
    $total = 0;
    foreach ($transaksi->barangs as $index => $barang){
        echo $barang->nameBarang . ":" . $barang->hargaBarang.":".$transaksi->jumlahs[$index]."=".$barang->hargaBarang*$transaksi->jumlahs[$index]."<br>";
        $total += $barang->hargaBarang * $transaksi->jumlahs[$index];
    }
    //nenambah total
    echo "Total: " . $total . "<br>";
    echo "<br>";
}
?>