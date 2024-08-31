<?php
//create object modelRole
include 'Controllers/controllerRole.php';

//object role dari controllerRole
$roleObject = new controllerRole();

//$action = isset($_GET['action']) ? $_GET['action']: 'list';
if (isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = 'list';
}
$id = isset($_GET['id']) ? $_GET['id'] : null;
switch ($action){
    case 'add':
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $role_name = $_POST['role_name'];
            $role_description = $_POST['role_description'];
            $role_status = $_POST['role_status'];
            if ($role_status == 1){
                $role_status = 1;
            } else {
                $role_status = 0;
            }
            $roleObject->addRole($role_name,$role_description,$role_status);
        } else {
            include 'Views/role_input.php';
        }
        break;
    case 'list':
        $roleObject->listRoles();
        break;
}