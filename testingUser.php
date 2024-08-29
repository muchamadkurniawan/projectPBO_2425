<?php
session_start();
include 'Models/modelUser.php';
//include "Models/modelRole.php";

$users = new modelUser();

//testing get all user
$datas = $users->getAllUsers();
foreach ($datas as $data){
    echo $data->userId."<br>";
    echo $data->username."<br>";
    echo "role name : ".$data->role->role_name."<br>";
}
echo "======================================"."<br>";


//testing for insert new users
$role1 = $_SESSION['roles'][1];
echo $role1->role_name;
//
//$users->addUser($role1,"username","password","kurniawan");
////testing get all user
//foreach ($users->getAllUsers() as $data){
//    echo $data->userId."<br>";
//    echo $data->username."<br>";
//    echo $data->role->role_name."<br>";
//}
?>
