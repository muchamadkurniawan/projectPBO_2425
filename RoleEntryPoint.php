<?php
//$action = isset($_GET['action']) ? $_GET['action']: 'list';
if (isset($_GET['action'])){
    $action = $_GET['action'];
} else {
    $action = 'list';
}
$id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($action){
    case 'list':
        include 'Views/role_list.php';
        break;
}