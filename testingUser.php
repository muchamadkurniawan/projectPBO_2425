<?php
session_start();
include 'Models/modelUser.php';
//include "Models/modelRole.php";

$objUser = new modelUser();

// End the session
$_SESSION = array();        // Unset all session variables
session_destroy();          // Destroy the session
session_write_close();      // Close the session
//testing get all user
$datas = $objUser->getAllUsers();
foreach ($datas as $data){
    echo $data->userId."<br>";
    echo $data->username."<br>";
    echo "role name : ".$data->role->role_name."<br>";
}
echo "======================================"."<br>";


//testing for insert new users
//get role cara 1
//$roles = unserialize($_SESSION['roles']);
//$roles1 = $roles[0];
//echo $roles1->role_id;

//get role cara 2
$objRoles = new modelRole();
$roles = $objRoles->getAllRoles();
//echo $roles[2]->role_name;

//insert add new user
echo "TESTING ADD USER";
$objUser->addUser($roles[1],"user3","pass3","kurniawan3");
foreach ($objUser->getAllUsers() as $data){
    echo $data->userId."<br>";
    echo $data->username."<br>";
    echo "role name : ".$data->role->role_name."<br>";
    echo "---------------------------"."<br>";
}
echo "======================================"."<br>";




//testing update
echo "TESTING UPDATE"."<br>";
$objUser->updateUser(1,$roles[2],"userupdate","passwordupdate","nama update");
foreach ($objUser->getAllUsers() as $user){
    echo $user->nama."<br>";
    echo $user->role->role_name."<br>";
    echo "------------------"."<br>";
}
echo "======================================"."<br>";

?>
