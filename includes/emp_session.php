<?php
class EmpSession{

    public function __construct(){
        session_start();
    }

    public function setCurrentEmp($user){
        $_SESSION['user'] = $user;
    }

    public function getCurrentEmp(){
        return $_SESSION['user'];
    }

    public function closeSession(){
        session_unset();
        session_destroy();
    }
}

?>