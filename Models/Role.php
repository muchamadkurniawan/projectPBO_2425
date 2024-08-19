<?php
namespace Models;
// include 'Models/Role.php';
use MongoDB\BSON\PackedArray;

include '../Nodes/Role.php';
class ModelRole
{
    private $roles = [];
    private $nextId = 1;

    public function __construct(){
        session_start();
        if(isset($_SESSION['roles'])){
            $this->roles = unserialize($_SESSION['roles']);
            $this->nextId = count($this->roles) + 1;
        }else{
            $this->initiliazeDefaultRole();
        }
    }

    public function initiliazeDefaultRole(){
        $this->addRole("Admin","Administrator",1);
        $this->addRole("User","Costomer/member",1);
        $this->addRole("kasir","Pembayaran",1);
    }

    public function addRole($role_name, $role_description, $role_status){
        $peran = new \Role($this->nextId++, $role_name, $role_description, $role_status);
        $this->roles[] = $peran;
        $this->saveToSession();
    }

    private function saveToSession(){
        $_SESSION['roles'] = serialize($this->roles);
    }

    public function getAllRoles(){
        return $this->roles;
    }

    public function clearSession(){
// Check if the session is already started
    if (session_status() === PHP_SESSION_ACTIVE) {
        // Unset all session variables
        $_SESSION = [];

        // If it's desired to kill the session, also delete the session cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destroy the session
        session_destroy();
    }
    }
    public function getRoleById($role_id){
        foreach($this->roles as $role){
            if($role->role_id == $role_id){
                return $role;
            }
        }
        return null;
    }

    public function updateRole($role_id, $role_name, $role_description, $role_status){
        foreach($this->roles as $role){
            if ($role->role_id == $role_id){
                $role->role_name = $role_name;
                $role->role_description = $role_description;
                $role->role_status = $role_status;
                $this->saveToSession();
                return true;
                break;
            }
        }
        return false;
    }

    public function deleteRole($role_id){
        foreach($this->roles as $key => $role){
            if($role->role_id == $role_id) {
                unset($this->roles[$key]);
                $this->roles = array_values($this->roles); // Reindex array
                $this->saveToSession();
                return true;
            }
        }
        return false;
    }
}

?>