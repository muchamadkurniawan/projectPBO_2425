<?php

use Models\modelRole;

include 'Models/modelRole.php';

$roles = new modelRole();

// testing for addRole and getAllRoles
foreach ($roles->getAllRoles() as $role) {
    echo ($role->role_id) . " - " . ($role->role_name). " - " .$role->role_description. " - " .$role->role_status;
    echo "<br>";
}
echo "=============================". "<br>";

// testing for updateRole
$result = $roles->updateRole(1, "Admin", "admin tok", 1);
if ($result) {
    echo "Data berhasil diupdate";
} else {
    echo "Data gagal diupdate";
}
echo "<br>";
foreach ($roles->getAllRoles() as $role) {
    echo ($role->role_id) . " - " . ($role->role_name). " - " .$role->role_description. " - " .$role->role_status;
    echo "<br>";
}
echo "=============================". "<br>";

// testing for getRoleById
$result = $roles->getRoleById(9);
if ($result) {
    echo "Data ditemukan";
    echo "<br>";
    echo $result->role_id . " - " . $result->role_name . " - " . $result->role_description . " - " . $result->role_status;
} else {
    echo "Data tidak ditemukan";
}
echo "<br>";
echo "=============================". "<br>";

//testing for deleteRole
$result = $roles->deleteRole(1);
if ($result) {
    echo "Data berhasil dihapus";
} else {
    echo "Data gagal dihapus";
}
echo "<br>";
foreach ($roles->getAllRoles() as $role) {
    echo ($role->role_id) . " - " . ($role->role_name). " - " .$role->role_description. " - " .$role->role_status;
    echo "<br>";
}
echo "=============================". "<br>";

//add new role
$roles->addRole("admin gudang", "admin gudang", 0);

//show all roles
foreach ($roles->getAllRoles() as $role) {
    echo ($role->role_id) . " - " . ($role->role_name). " - " .$role->role_description. " - " .$role->role_status;
    echo "<br>";
}
?>