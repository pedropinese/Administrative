<?php

require_once '../class/Crud.php';

class Address extends Crud {

    protected $table = 'address';
    private $street;
    private $number;
    private $postalCode;
    private $district;
    private $city;
    private $state;
    private $country;
    private $customerId;

    //GET e SET
    //<editor-fold desc="Street">
    public function setStreet($street) {
        $this->street = $street;
    }

    public function getStreet() {
        return $this->street;
    }

    //</editor-fold>
    //<editor-fold desc="Number">
    public function setNumber($number) {
        $this->number = $number;
    }

    public function getNumber() {
        return $this->number;
    }

    //</editor-fold>
    //<editor-fold desc="Postal Code">
    public function setPostalCode($postalCode) {
        $this->postalCode = $postalCode;
    }

    public function getPostalCode() {
        return $this->postalCode;
    }

    //</editor-fold>
    //<editor-fold desc="District">
    public function setDistrict($district) {
        $this->district = $district;
    }

    public function getDistrict() {
        return $this->district;
    }

    //</editor-fold>
    //<editor-fold desc="City">
    public function setCity($city) {
        $this->city = $city;
    }

    public function getCity() {
        return $this->city;
    }

    //</editor-fold>
    //<editor-fold desc="State">
    public function setState($state) {
        $this->state = $state;
    }

    public function getState() {
        return $this->state;
    }

    //</editor-fold>
    //<editor-fold desc="Country">
    public function setCountry($country) {
        $this->country = $country;
    }

    public function getCountry() {
        return $this->country;
    }

    //</editor-fold>
    //<editor-fold desc="CustomerId">
    public function setCustomerId($customerId) {
        $this->customerId = $customerId;
    }

    public function getCustomerId() {
        return $this->customerId;
    }

    //</editor-fold>
    //Implementar funções abstratas
    public function create() {
        $sql = "INSERT INTO ADDRESS (STREET, NUMBER, POSTAL_CODE, DISTRICT, CITY, STATE, COUNTRY, CUSTOMER_ID)"
                . " VALUES (:street, :number, :postalCode, :district, :city, :state, :country, :customerId)";
        $sttmt = DB::prepare($sql);
        $sttmt->bindParam(':street', $this->street);
        $sttmt->bindParam(':number', $this->number);
        $sttmt->bindParam(':postalCode', $this->postalCode);
        $sttmt->bindParam(':district', $this->district);
        $sttmt->bindParam(':city', $this->city);
        $sttmt->bindParam(':state', $this->state);
        $sttmt->bindParam(':country', $this->country);
        $sttmt->bindParam(':customerId', $this->customerId);
        $sttmt->execute();
        return true;
    }

    public function update($id) {
        $sql = "UPDATE ADDRESS SET STREET= :street, NUMBER= :number, POSTAL_CODE= :postalCode, "
                . "DISTRICT= :district, CITY= :city, STATE= :state, COUNTRY= :country "
                . "WHERE ID = :id";
        $sttmt = DB::prepare($sql);
        $sttmt->bindParam(':street', $this->street);
        $sttmt->bindParam(':number', $this->number);
        $sttmt->bindParam(':postalCode', $this->postalCode);
        $sttmt->bindParam(':district', $this->district);
        $sttmt->bindParam(':city', $this->city);
        $sttmt->bindParam(':state', $this->state);
        $sttmt->bindParam(':country', $this->country);
        $sttmt->bindParam(':id', $id);
        $sttmt->execute();
        return true;
    }
    
    public function deleteAddress($id) {
        $sql = "DELETE FROM $this->table WHERE ID = :id";
        $sttmt = DB::prepare($sql);
        $sttmt->bindParam(':id', $id);
        $sttmt->execute();
        return true;
    }

    //função especifica do endereço
    public function getByCustomerId($customerId) {
        $sql = "SELECT * FROM ADDRESS WHERE CUSTOMER_ID = :id";
        $sttmt = DB::prepare($sql);
        $sttmt->bindParam(':id', $customerId);
        $sttmt->execute();
        return $sttmt->fetchAll();
    }

}
