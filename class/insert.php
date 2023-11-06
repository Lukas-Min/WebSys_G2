<?php

class insert extends config {
    public $brand, $product_name, $size, $color, $gender,  $price;

    public function __construct($brand, $product_name, $size, $color, $gender, $price) {
        $this->brand = $brand;
        $this->product_name = $product_name;
        $this->size = $size;
        $this->color = $color;
        $this->gender = $gender;
        $this->price = $price;
    }

    public function insertShoes() {
        $con = $this->con();
        $sql = "INSERT INTO `inventory_tbl` (`brand`, `product_name`, `size`, `color`, `gender`, `price`)VALUES('$this->brand', '$this->product_name', '$this->size', '$this->color', '$this->gender', '$this->price')";
        $data = $con->prepare($sql);
        // var_dump($data);
        // die();

        if ($data->execute()) {
            return true;
        } 
        else {
            return false;
        }
    }
}
?>
