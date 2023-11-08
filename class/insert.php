<?php

class insert extends config {
    public $brand, $product_name, $size, $color, $price, $quantity;

    public function __construct($brand, $product_name, $size, $color, $price, $quantity) {
        $this->brand = $brand;
        $this->product_name = $product_name;
        $this->size = $size;
        $this->color = $color;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function insertShoes() {
    $con = $this->con();

    // Check if a record with the same data already exists
    $checkSql = "SELECT COUNT(*) FROM `inventory_tbl` WHERE
        `brand` = '$this->brand' AND
        `product_name` = '$this->product_name' AND
        `size` = '$this->size' AND
        `color` = '$this->color'";
    $checkData = $con->prepare($checkSql);
    $checkData->execute();
    $count = $checkData->fetchColumn();

    if ($count > 0) {
        return false; // Data already exists, decline the insert
    }

    // Data is not a duplicate, proceed with the insert
    $sql = "INSERT INTO `inventory_tbl` (`brand`, `product_name`, `size`, `color`, `price`, `quantity`) VALUES('$this->brand', '$this->product_name', '$this->size', '$this->color', '$this->price', '$this->quantity')";
    $data = $con->prepare($sql);
    if ($data->execute()) {
        return true; // Successfully inserted
    } else {
        return false; // Failed to insert
    }
}

}
?>
