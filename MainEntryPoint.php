<?php

session_start();

// dependency
require_once 'Controllers/controllerRole.php';
require_once 'Controllers/controllerUser.php';
require_once 'Models/modelBarang.php';
require_once 'Controllers/controllerTransaksi.php';

//objects
$objectRole = new controllerRole();
$objectUser = new controllerUser();
$objBarang = new modelBarang();
$objTransaksi = new controllerTransaksi();

session_destroy();

if (isset($_GET['modul'])){
    $modul = $_GET['modul'];
}else{
    $modul = 'dashboard';
}

switch ($modul){
    case 'transaksi':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        switch ($fitur){
            case 'add':
                if ($_SERVER['REQUEST_METHOD']=='POST'){
//                    $name = $_POST['name'];
//                    $username = $_POST['username'];
//                    $passowrd = $_POST['password'];
//                    $role_Status = $_POST['role_status'];
//                    $objectUser->addUser($role_Status,$username,$passowrd,$name);
                } else {
//                    $listRoleName = $objectRole->getListRoleName();
                    include 'Views/transaksi_input.php';
                }
                break;
            default:
                $objTransaksi->listTransaksi();
        }
        break;
    case 'dashboard':
//        $objBarang->addBarang("kompor",22000);
//        print_r($objBarang->getAllBarangs());
//        foreach ($objBarang->getAllBarangs() as $barang) {
//            echo $barang->nameBarang . "<br>";
//            echo htmlspecialchars($barang->idBarang) . "<br>";
//            echo $barang->hargaBarang . "<br>";
//            echo "------------------" . "<br>";
//        }
        include 'Views/kosong.php';
        break;
    case 'user':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        switch ($fitur){
            case 'add':
                if ($_SERVER['REQUEST_METHOD']=='POST'){
                    $name = $_POST['name'];
                    $username = $_POST['username'];
                    $passowrd = $_POST['password'];
                    $role_Status = $_POST['role_status'];
                    $objectUser->addUser($role_Status,$username,$passowrd,$name);
                } else {
                    $listRoleName = $objectRole->getListRoleName();
                    include 'Views/user_input.php';
                }
                break;
            default:
                $objectUser->listUser();
        }
        break;
    case 'role':
        $fitur = isset($_GET['fitur']) ? $_GET['fitur'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        switch ($fitur){
            case 'add':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $role_name = $_POST['role_name'];
                    $role_description = $_POST['role_description'];
                    $role_status = $_POST['role_status'];
                    if ($role_status == 1) {
                        $role_status = 1;
                    } else {
                        $role_status = 0;
                    }
                    $objectRole->addRole($role_name,$role_description,$role_status);
                }else{
                    include 'Views/role_input.php';
                }
                break;
            case 'edit':
                $objectRole->editById($id);
                break;
            case 'update':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $role_name = $_POST['role_name'];
                    $role_description = $_POST['role_description'];
                    $role_status = $_POST['role_status'];
                    if ($role_status == 1){
                        $objectRole->updateRole($id, $role_name, $role_description, 1);
                    }else{
                        $objectRole->updateRole($id, $role_name, $role_description, 2);
                    }
                }
                break;
            case 'delete':
                $objectRole->deleteRole($id);
                break;
            default:
               $objectRole->listRoles();
        }
        break;
    default:
        include 'Views/kosong.php';
}

?>