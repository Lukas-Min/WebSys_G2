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

    
//view specific product
public function viewSpecificProduct()
{
    $con = new config();
    $pdo = $con->con();

    $searchKeyword = isset($_POST['search_keyword']) ? strtolower($_POST['search_keyword']) : "";

    // Display the search form
    echo "<h3 class='mb-4 mt-5'>Search for a Product</h3>";
    echo "<form method='POST'>";
    echo "<div class='form-group'>";
    echo "<label for='search_keyword'>Enter Search Keyword:</label>";
    echo "<input type='text' name='search_keyword' class='form-control' placeholder='Enter Keyword' value='$searchKeyword' />";
    echo "</div>";
    echo "<button type='submit' class='btn btn-primary'>Search</button>";
    echo "</form>";

    if (!empty($searchKeyword)) {
        // Build a SQL query to search for an exact match on the ID field
        $sql = "SELECT * FROM `inventory_tbl` WHERE 
                id = :keyword";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':keyword', $searchKeyword, PDO::PARAM_INT);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($results)) {
            echo "<h3 class='mb-4 mt-5'>Search Results</h3>";
            echo "<table class='table'>";
            echo "<thead><tr>";
            echo "<th>ID</th>";
            echo "<th>Brand</th>";
            echo "<th>Gender</th>";
            echo "<th>Product Name</th>";
            echo "<th>Color</th>";
            echo "<th>Price</th>";
            echo "<th>Date Sold</th>";
            echo "<th>Status</th>";
            echo "</tr></thead><tbody>";

            foreach ($results as $product) {
                echo "<tr>";
                echo "<td>{$product['id']}</td>"; 
                echo "<td>{$product['brand']}</td>"; 
                echo "<td>{$product['gender']}</td>"; 
                echo "<td>{$product['product_name']}</td>";
                echo "<td>{$product['color']}</td>"; 
                echo "<td>{$product['price']}</td>";
                echo "<td>{$product['date_sold']}</td>";
                echo "<td>{$product['status']}</td>";
                echo "</tr>";
            }

            echo "</tbody></table>";
        } else {
            echo "No results found for the provided ID.";
        }
    
        } else {
           
            echo "<h3 class='mb-4 mt-5'>Search for a Product</h3>";
            echo "<form method='POST'>";
            echo "<div class='form-group'>";
            echo "<label for='search_id'>Enter Product ID:</label>";
            echo "<input type='text' name='search_id' class='form-control' placeholder='Enter Product ID' />";
            echo "</div>";
            echo "<button type='submit' class='btn btn-primary'>Search</button>";
            echo "</form>";
        }
    }
}







?>