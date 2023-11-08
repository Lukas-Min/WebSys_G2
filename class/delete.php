<?php

class delete extends config {
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function deleteShoes() {
        $con = $this->con();
        $sql = "DELETE FROM `inventory_tbl` WHERE `id` = :id";
        $data = $con->prepare($sql);
        
        if ($data->execute([':id' => $this->id])) {
            return true;
        } else {
            return false;
        }
    }
}


?>
