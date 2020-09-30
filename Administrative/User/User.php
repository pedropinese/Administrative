<?php
require_once './class/Crud.php';

class User extends Crud {

    protected $table = 'user';
    private $userName;
    private $password;

    //GET e SET
    //<editor-fold desc="UserName">
    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function getUserName() {
        return $this->userName;
    }

    //</editor-fold>
    //<editor-fold desc="Password">
    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }

    //</editor-fold>
    
    
    public function checkUser($userName, $password) {
        $sql = "SELECT ID, USER_NAME FROM USER WHERE USER_NAME = :userName "
                . "AND PASSWORD = md5(:password)";
        $sttmt = DB::prepare($sql);
        $sttmt->bindParam(':userName', $userName);
        $sttmt->bindParam(':password', $password);
        $sttmt->execute();
        
        if($sttmt->rowCount() > 0){
            $result = $sttmt->fetch();
            $_SESSION['userId'] = $result->ID;
            return true;
        }
        else
            return false;
        
    }
    
    
    public function userLogged($id) {
        $sql = "SELECT USER_NAME FROM USER WHERE ID = :id";
        $sttmt = DB::prepare($sql);
        $sttmt->bindParam(':id', $id);
        $sttmt->execute();
        return $sttmt->fetch();
    }

    
    public function create() {
        
    }

    public function update($id) {
        
    }

}
