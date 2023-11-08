<?php

require_once('config.php');

class view extends config
{
    public function viewItem()
    {
        $con = new config();
        $pdo = $con->con();
        $sql = "SELECT * FROM `inventory_tbl` WHERE `status` = 'Available'";
        $avail = $pdo->prepare($sql);
        $avail->execute();
        $available = $avail->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class= 'mb-4 mt-5'>Available Item</h3>";
        echo "<table class='table'>
        <thead>
            <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Gender</th>
            <th>Product Name</th>
            <th>Color</th>
            <th>Price</th>
            <th scope='col'>Status</th>
            </tr>
        </thead><tbody>";
        
        foreach ($available as $avail) {
            echo "<tr>";
            echo "<td>$avail[id]</td>"; 
            echo "<td>$avail[brand]</td>"; 
            echo "<td>$avail[gender]</td>"; 
            echo "<td>$avail[product_name]</td>";
            echo "<td>$avail[color]</td>"; 
            echo "<td>$avail[price]</td>"; 

            echo "<form action='' method='POST'>";
            echo "<td>";
            echo "<button type='submit' name='edit' value='{$avail['id']}' class='btn btn-sm btn-danger mr-1'>Sold</button>";
            echo "<button type='submit' name='delete' value='{$avail['id']}' class='btn btn-sm btn-danger mr-1'>Delete</button>";
            echo "</td>";
            echo "</tr>";

            
        }
        echo "</tbody></table>";
        
    }



    public function viewCompletedItem()
    {
        $con = new config();
        $pdo = $con->con();
        $sql = "SELECT * FROM `inventory_tbl` WHERE `status` = 'sold'";
        $avail = $pdo->prepare($sql);
        $avail->execute();  
        $available = $avail->fetchAll(PDO::FETCH_ASSOC);
        echo "<h3 class= 'mb-4 mt-5'>Sold Item</h3>";
        echo "<table class='table'>
        <thead>
            <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Gender</th>
            <th>Product Name</th>
            <th>Color</th>
            <th>Price</th>
            <th>Date Sold</th>
            <th>Status</th>
            </tr>
        </thead><tbody>";
        foreach ($available as $avail) {
            echo "<tr>";
            echo "<td>$avail[id]</td>"; 
            echo "<td>$avail[brand]</td>"; 
            echo "<td>$avail[gender]</td>"; 
            echo "<td>$avail[product_name]</td>";
            echo "<td>$avail[color]</td>"; 
            echo "<td>$avail[price]</td>";  
            echo "<td>$avail[date_sold]</td>";
            echo "<form action='' method='POST'>";
            echo "<td>";
            echo "<button type='submit' name='delete' value='{$avail['id']}' class='btn btn-sm btn-danger mr-1'>Remove from Inventory</button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
        
    }
}


?>
