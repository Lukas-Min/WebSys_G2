<?php
class view extends config
{

    public function viewAvailShoes()
    {
        $con = $this->con();
        ob_start();
        $sql = "SELECT * FROM `inventory_tbl` WHERE `status` = ('Available')";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h1 class='title-available mb-3 ml-2 text-light'>Available Shoes</h1>";
        echo
        "<table class='table table-dark table-striped rounded-table'>
                <thead>
                    <tr class='bg-custom text-light'>
                        <th class='text-center'>Shoe Code</th>
                        <th>Brand</th>
                        <th>Shoe Model</th>
                        <th class='text-center'>Size</th>
                        <th>Color</th>
                        <th class='text-center'>Price</th>
                        <th class='text-center'>Status</th>
                        <th class='text-center'>Quantity</th>
                        <th class='text-center'>Date Added</th>
                        <th class='text-center'>Actions</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($result as $row) {
            echo "<tr class='text-light'>";
            echo "<td class='text-center'>$row[id]</td>";
            echo "<td>$row[brand]</td>";
            echo "<td>$row[product_name]</td>";
            echo "<td class='text-center'>$row[size] EU</td>";
            echo "<td>$row[color]</td>";
            $price = $row['price'];
            $formattedPrice = number_format($price, 2, '.', ',');
            echo "<td class='text-center'>₱$formattedPrice</td>";
            echo "<td class='text-center'>$row[status]</td>";
            echo "<td class='text-center'>$row[quantity]</td>";
            $originalDate = $row['date_added'];
            $formattedDate = date("Y-m-d", strtotime($originalDate));
            echo "<td class='text-center'>$formattedDate</td>";
            echo "<form method='post'>";
            echo "<td>";
            // echo "<button class='btn btn-sm btn-info' name='edit' value='$row[id]'>Edit</button>";
            // echo "<button class='btn btn-sm btn-danger' name='delete' value='$row[id]'>Delete</button>";
            echo "<div class='btn-group'>";
            echo "<button class='btn btn-sm text-custom btn-light mr-2 rounded' name='edit' value='$row[id]'>Edit</button>";
            echo "<button class='btn btn-sm btn-danger rounded' name='delete' value='$row[id]'>Delete</button>";
            echo "</div>";
            echo " </td>";
            echo "</form>";
            echo "</tr>";
        }
        echo " 
                </tbody>
            </table>";
        // foreach($result as $row){
        //     echo " <div class='container mb-5'>
        //     <div class='card'>
        //         <div class='row'>
        //             <div class='col-md-3'>
        //                 <img width='300' height='300' src='https://underarmour.scene7.com/is/image/Underarmour/3026619-101_DEFAULT?rp=standard-30pad|gridTileDesktop&scl=1&fmt=jpg&qlt=50&resMode=sharp2&cache=on,on&bgc=F0F0F0&wid=512&hei=640&size=472,600' alt=''>
        //             </div>
        //             <div class='col-md-9 '>
        //                 <div class='card-body'>
        //                     <strong class='shoe-title h1 ml-3'>Card title</strong>
        //                     <p class='card-text ml-3'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        //                     <p class='card-text ml-3'><small class='text-muted'>Last updated 3 mins ago</small></p>
        //                 </div>
        //             </div>
        //         </div>
        //     </div>
        // </div>";
        // }
    }
    public function viewSpecificProduct()
    {
        $con = new config();
        $pdo = $con->con();

        $searchKeyword = isset($_POST['search_keyword']) ? strtolower($_POST['search_keyword']) : "";


        if (!empty($searchKeyword)) {
            $sql = "SELECT * FROM `inventory_tbl` WHERE 
                LOWER(id) LIKE :keyword OR
                LOWER(brand) LIKE :keyword OR
                LOWER(product_name) LIKE :keyword OR
                LOWER(size) LIKE :keyword OR
                LOWER(color) LIKE :keyword OR
                LOWER(price) LIKE :keyword OR
                LOWER(quantity) LIKE :keyword";
                

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':keyword', "%$searchKeyword%", PDO::PARAM_STR);
            $stmt->execute();
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($results)) {
                echo "<h1 class='title-available mb-3 ml-2'>Search Result</h1>";
                echo
                "<table class='table table-dark table-striped rounded-table'>
                <thead>
                    <tr class='bg-custom text-light'>
                        <th class='text-center'>Shoe Code</th>
                        <th>Brand</th>
                        <th>Shoe Model</th>
                        <th class='text-center'>Size</th>
                        <th>Color</th>
                        <th class='text-center'>Price</th>
                        <th class='text-center'>Status</th>
                        <th class='text-center'>Quantity</th>
                        <th class='text-center'>Date Added</th>
                        <th class='text-center'>Actions</th>
                    </tr>
                </thead>
                <tbody>";
                foreach ($results as $row) {
                    echo "<tr>";
                    echo "<td class='text-center'>$row[id]</td>";
                    echo "<td>$row[brand]</td>";
                    echo "<td>$row[product_name]</td>";
                    echo "<td class='text-center'>$row[size] EU</td>";
                    echo "<td>$row[color]</td>";
                    $price = $row['price'];
                    $formattedPrice = number_format($price, 2, '.', ',');
                    echo "<td class='text-center'>₱$formattedPrice</td>";
                    echo "<td class='text-center'>$row[status]</td>";
                    echo "<td class='text-center'>$row[quantity]</td>";
                    $originalDate = $row['date_added'];
                    $formattedDate = date("Y-m-d", strtotime($originalDate));
                    echo "<td class='text-center'>$formattedDate</td>";
                    echo "<form method='post'>";
                    echo "<td>";
                    // echo "<button class='btn btn-sm btn-info' name='edit' value='$row[id]'>Edit</button>";
                    // echo "<button class='btn btn-sm btn-danger' name='delete' value='$row[id]'>Delete</button>";
                    echo "<div class='btn-group'>";
                    echo "<button class='btn btn-sm text-custom btn-light mr-2 rounded' name='edit' value='$row[id]'>Edit</button>";
                    echo "<button class='btn btn-sm btn-danger rounded' name='delete' value='$row[id]'>Delete</button>";
                    echo "</div>";
                    echo " </td>";
                    echo "</form>";
                    echo "</tr>";
                }
                echo " 
                </tbody>
            </table>";
            } else {
                searchBarNotif();
            }
        }
    }
    public function viewUnavailShoes()
    {
        $con = $this->con();
        ob_start();
        $sql = "SELECT * FROM `inventory_tbl` WHERE `status` = ('Out of Stock')";
        $data = $con->prepare($sql);
        $data->execute();
        $result = $data->fetchAll(PDO::FETCH_ASSOC);
        echo "<h1 class='title-available mb-3 ml-2 mt-5 text-light'>Out of Stocked Shoes</h1>";
        echo
        "<table class='table table-dark table-striped rounded-table'>
                <thead>
                    <tr class='bg-custom text-light'>
                        <th class='text-center'>Shoe Code</th>
                        <th>Brand</th>
                        <th>Shoe Model</th>
                        <th class='text-center'>Size</th>
                        <th>Color</th>
                        <th class='text-center'>Price</th>
                        <th class='text-center'>Status</th>
                        <th class='text-center'>Quantity</th>
                        <th class='text-center'>Last Re-Stock</th>
                        <th class='text-center'>Actions</th>
                    </tr>
                </thead>
                <tbody>";
        foreach ($result as $row) {
            echo "<tr class='text-light'>";
            echo "<td class='text-center'>$row[id]</td>";
            echo "<td>$row[brand]</td>";
            echo "<td>$row[product_name]</td>";
            echo "<td class='text-center'>$row[size] EU</td>";
            echo "<td>$row[color]</td>";
            $price = $row['price'];
            $formattedPrice = number_format($price, 2, '.', ',');
            echo "<td class='text-center'>₱$formattedPrice</td>";
            echo "<td class='text-center'>$row[status]</td>";
            echo "<td class='text-center'>$row[quantity]</td>";
            $originalDate = $row['date_added'];
            $formattedDate = date("Y-m-d", strtotime($originalDate));
            echo "<td class='text-center'>$formattedDate</td>";
            echo "<form method='post'>";
            echo "<td>";
            // echo "<button class='btn btn-sm btn-info' name='edit' value='$row[id]'>Edit</button>";
            // echo "<button class='btn btn-sm btn-danger' name='delete' value='$row[id]'>Delete</button>";
            echo "<div class='btn-group'>";
            echo "<button class='btn text-custom btn-sm btn-light mr-2 rounded' name='edit' value='$row[id]'>Edit</button>";
            echo "<button class='btn btn-sm btn-danger rounded' name='delete' value='$row[id]'>Delete</button>";
            echo "</div>";
            echo " </td>";
            echo "</form>";
            echo "</tr>";
        }
        echo " 
                </tbody>
            </table>";
    }
}
