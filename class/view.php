<?php
class view extends config
{

  public function viewAvailShoes()
  {
    $con = $this->con();
    ob_start();

    // Check if a column for sorting is specified
    $sortBy = isset($_GET['sort_by']) ? $_GET['sort_by'] : 'id';
    // Initialize the sorting order
    $sortOrder = isset($_GET['order']) ? $_GET['order'] : 'asc';

    $sql = "SELECT * FROM `inventory_tbl` WHERE `status` = ('Available') ORDER BY $sortBy $sortOrder";
    $data = $con->prepare($sql);
    $data->execute();
    $result = $data->fetchAll(PDO::FETCH_ASSOC);

    echo "<h1 class='title-available mb-3 ml-2 text-light' style='color: white;'>Available Shoes</h1>";
    echo "<table class='table table-dark table-striped rounded-table'>
              <thead>
                  <tr class='bg-custom text-light'>
                      <th><a class='text-light' href='?sort_by=brand&amp;order=" . ($sortBy === 'brand' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Brand " . ($sortBy === 'brand' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                      <th><a class='text-light' href='?sort_by=product_name&amp;order=" . ($sortBy === 'product_name' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Shoe Model " . ($sortBy === 'product_name' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                      <th class='text-center'><a class='text-light' href='?sort_by=size&amp;order=" . ($sortBy === 'size' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Size " . ($sortBy === 'size' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                      <th class='text-center'><a class='text-light' href='?sort_by=color&amp;order=" . ($sortBy === 'color' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Color " . ($sortBy === 'color' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                      <th class='text-center'><a class='text-light' href='?sort_by=price&amp;order=" . ($sortBy === 'price' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Price " . ($sortBy === 'price' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                      <th class='text-center'><a class='text-light' href='?sort_by=quantity&amp;order=" . ($sortBy === 'quantity' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Quantity " . ($sortBy === 'quantity' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                      <th class='text-center'><a class='text-light' href='?sort_by=date_added&amp;order=" . ($sortBy === 'date_added' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Date Added " . ($sortBy === 'date_added' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                      <th class='text-center'>Actions</th>
                    </tr>
                </thead>
                <tbody>";

    foreach ($result as $row) {
      echo "<tr class='text-light'>";
      echo "<td>$row[brand]</td>";
      echo "<td>$row[product_name]</td>";
      echo "<td class='text-center'>$row[size] EU</td>";
      echo "<td class='text-center'>$row[color]</td>";
      $price = $row['price'];
      $formattedPrice = number_format($price, 2, '.', ',');
      echo "<td class='text-center'>₱$formattedPrice</td>";
      echo "<td class='text-center'>$row[quantity]</td>";
      $originalDate = $row['date_added'];
      $formattedDate = date("Y-m-d", strtotime($originalDate));
      echo "<td class='text-center'>$formattedDate</td>";
      echo "<form method='post'>";
      echo "<td>";
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
        echo "<h1 class='title-available mb-3 ml-2 text-light'>Search Result</h1>";
        echo
          "<table class='table table-dark table-striped rounded-table'>
                <thead>
                    <tr class='bg-custom text-light'>
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

  // Check if a column for sorting is specified
  $sortBy = isset($_GET['unavail_sort_by']) ? $_GET['unavail_sort_by'] : 'id';
  // Initialize the sorting order
  $sortOrder = isset($_GET['unavail_order']) ? $_GET['unavail_order'] : 'asc';

  $sql = "SELECT * FROM `inventory_tbl` WHERE `status` = ('Out of Stock') ORDER BY $sortBy $sortOrder";
  $data = $con->prepare($sql);
  $data->execute();
  $result = $data->fetchAll(PDO::FETCH_ASSOC);

  echo "<h1 class='title-available mb-3 ml-2 text-light' style='color: white;'>Available Shoes</h1>";
  echo "<table class='table table-dark table-striped rounded-table'>
            <thead>
                <tr class='bg-custom text-light'>
                    <th><a class='text-light' href='?unavail_sort_by=brand&amp;unavail_order=" . ($sortBy === 'brand' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Brand " . ($sortBy === 'brand' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                    <th><a class='text-light' href='?unavail_sort_by=product_name&amp;unavail_order=" . ($sortBy === 'product_name' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Shoe Model " . ($sortBy === 'product_name' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                    <th class='text-center'><a class='text-light' href='?unavail_sort_by=size&amp;unavail_order=" . ($sortBy === 'size' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Size " . ($sortBy === 'size' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                    <th class='text-center'><a class='text-light' href='?unavail_sort_by=color&amp;unavail_order=" . ($sortBy === 'color' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Color " . ($sortBy === 'color' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                    <th class='text-center'><a class='text-light' href='?unavail_sort_by=price&amp;unavail_order=" . ($sortBy === 'price' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Price " . ($sortBy === 'price' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                    <th class='text-center'><a class='text-light' href='?unavail_sort_by=quantity&amp;unavail_order=" . ($sortBy === 'quantity' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Quantity " . ($sortBy === 'quantity' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                    <th class='text-center'><a class='text-light' href='?unavail_sort_by=date_added&amp;unavail_order=" . ($sortBy === 'date_added' && $sortOrder === 'asc' ? 'desc' : 'asc') . "'>Last Re-stock " . ($sortBy === 'date_added' ? ($sortOrder === 'asc' ? '▲' : '▼') : '') . "</a></th>
                    <th class='text-center'>Actions</th>
                </tr>
            </thead>
          <tbody>";

  foreach ($result as $row) {
    echo "<tr class='text-light'>";
    echo "<td>$row[brand]</td>";
    echo "<td>$row[product_name]</td>";
    echo "<td class='text-center'>$row[size] EU</td>";
    echo "<td class='text-center'>$row[color]</td>";
    $price = $row['price'];
    $formattedPrice = number_format($price, 2, '.', ',');
    echo "<td class='text-center'>₱$formattedPrice</td>";
    echo "<td class='text-center'>$row[quantity]</td>";
    $originalDate = $row['date_added'];
    $formattedDate = date("Y-m-d", strtotime($originalDate));
    echo "<td class='text-center'>$formattedDate</td>";
    echo "<form method='post'>";
    echo "<td>";
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

}
}
?>