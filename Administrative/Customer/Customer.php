<?php
require_once '../class/Crud.php';

class Customer extends Crud {

    protected $table = 'customer';
    private $name;
    private $phone;
    private $birthday;
    private $cpf;
    private $rg;

    //GET e SET
    //<editor-fold desc="Name">
    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    //</editor-fold>
    //<editor-fold desc="Phone">
    public function setPhone($phone) {
        $this->phone = $phone;
    }

    public function getPhone() {
        return $this->phone;
    }

    //</editor-fold>
    //<editor-fold desc="Birthday">
    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    //</editor-fold>
    //<editor-fold desc="CPF">
    public function setCPF($cpf) {
        $this->cpf = $cpf;
    }

    public function getCPF() {
        return $this->cpf;
    }

    //</editor-fold>
    //<editor-fold desc="RG">
    public function setRG($rg) {
        $this->rg = $rg;
    }

    public function getRG() {
        return $this->rg;
    }
    

    //</editor-fold>
    //
    //Implementar funções abstratas
    public function create() {
        $sql = "INSERT INTO CUSTOMER (NAME, PHONE, BIRTHDAY, CPF, RG)"
                . " VALUES (:name, :phone, :birthday, :cpf, :rg)";
        $sttmt = DB::prepare($sql);
        $sttmt->bindParam(':name', $this->name);
        $sttmt->bindParam(':phone', $this->phone);
        $sttmt->bindParam(':birthday', $this->birthday);
        $sttmt->bindParam(':cpf', $this->cpf);
        $sttmt->bindParam(':rg', $this->rg);
        $sttmt->execute();
        $this->backToList();
    }

    public function update($id) {
        $sql = "UPDATE CUSTOMER SET NAME=:name, PHONE=:phone,"
                . " BIRTHDAY=:birthday, CPF=:cpf, RG=:rg WHERE ID=:id";
        $sttmt = DB::prepare($sql);
        $sttmt->bindParam(':name', $this->name);
        $sttmt->bindParam(':phone', $this->phone);
        $sttmt->bindParam(':birthday', $this->birthday);
        $sttmt->bindParam(':cpf', $this->cpf);
        $sttmt->bindParam(':rg', $this->rg);
        $sttmt->bindParam(':id', $id);
        $sttmt->execute();
        $this->backToList();
    }


}
