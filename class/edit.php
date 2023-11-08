<?php

class edit extends config {
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function editShoes() {
        $con = $this->con();
        $sql = "UPDATE `inventory_tbl` SET `status` = 'sold', `date_sold` = NOW() WHERE `id` = '$this->id'";
        $data = $con->prepare($sql);
        
        if ($data->execute()) {
            return true;
        } else {
            return false;
        }
    }
}



?>
