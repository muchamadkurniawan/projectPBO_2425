<?php

session_start();

// dependency
include 'Controllers/controllerRole.php';

//objects
$objectRole = new controllerRole();

if (isset($_GET['modul'])){
    $modul = $_GET['modul'];
}else{
    $modul = 'dashboard';
}

switch ($modul){
    case 'dashboard':
        include 'Views/kosong.php';
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