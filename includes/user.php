<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $username;


    public function userExists($user, $pass){
        $query = $this->connect()->prepare('SELECT * FROM Aspirante WHERE CorreoElec = :user AND Contra = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM Aspirante WHERE CorreoElec = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['Nombre'];
            $this->username = $currentUser['CorreoElec'];
        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getCorreo(){
        return $this->username;
    }
}

?>