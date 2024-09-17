<?php
//create object modelRole
//include 'Controllers/controllerRole.php';
session_start();

//object role dari controllerRole
$roleObject = new controllerRole();

//$action = isset($_GET['action']) ? $_GET['action']: 'list';
if (isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = 'list';
}
//$id = isset($_GET['id']) ? $_GET['id'] : null;
switch ($action){
    default:
        $roleObject->listRoles();
//        include 'Views/role_list.php';
}
?>