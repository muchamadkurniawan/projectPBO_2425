<?php

use Models\ModelRole;

include 'Models/Role.php';

//create object
$role = new ModelRole();
echo $role->nextId;

?>