<?php

require_once 'DB.php';

abstract class Crud extends DB {

    protected $table;

    //<editor-fold desc="CREATE">

    abstract public function create();

    //</editor-fold>
    //<editor-fold desc="READ">
    public function getById($id) {
        $sql = "SELECT * FROM $this->table WHERE ID = :id";
        $sttmt = DB::prepare($sql);
        $sttmt->bindParam(':id', $id);
        $sttmt->execute();
        return $sttmt->fetch();
    }

    public function getAll() {
        $sql = "SELECT * FROM $this->table";
        $sttmt = DB::prepare($sql);
        $sttmt->execute();
        return $sttmt->fetchAll();
    }

    //</editor-fold>
    //<editor-fold desc="UPDATE">
    abstract public function update($id);

    //</editor-fold>
    //<editor-fold desc="DELETE">
    public function delete($id) {
        $sql = "DELETE FROM $this->table WHERE ID = :id";
        $sttmt = DB::prepare($sql);
        $sttmt->bindParam(':id', $id);
        $sttmt->execute();
        $this->backToList();
    }
    
    public function backToList(){
        header("location:list.php");
    }


    //</editor-fold>
}
