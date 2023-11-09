<?php
require_once 'resource/php/init.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="resource/css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Agbalumo&family=Montserrat&family=Lobster&family=Pacifico&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="resource/img/logo-transp.png">
    <title>Ballers Club</title>
</head>

<body>
    <nav class="navbar navbar-light bg-custom shadow">
        <a class="navbar-brand">
            <img src="resource/img/logo-transp.png" width="75" height="75" class="d-inline-block align-top" alt="">
        </a>
        <h1 class="mr-auto text-light page-title">Ballers Club</h1>
        <form class="form-inline mr-3" action="" method="POST">
            <button class="btn btn-light " name="home">Home</button>
        </form>
        <form class="form-inline" method='POST'>
            <input type="text" name="search_keyword" class="form-control" placeholder="Search for a Product" aria-label="Search" required>
            <button class="btn btn-outline-light my-2 my-sm-0" name="search-btn" type="submit">Search</button>
        </form>
    </nav>

    <!-- <form method="POST" action="">
        <div class="form-group">
            <label for="search_keyword">Enter Search Keyword:</label>
            <input type="text" name="search_keyword" class="form-control" placeholder="Search for a Product" aria-label="Search" value="<?= isset($_POST['search_keyword']) ? $_POST['search_keyword'] : '' ?>" />
        </div>
    </form> -->


    <div class="container-fluid mt-5 mb-2">
        <?php
        insertSh();
        deleteSh();
        ?>
        <h3 class="add-shoe text-light">Add shoe</h3>
        <form class="mt-2 form-group" action="" method="POST">
            <div class="row">
                <!-- Brand -->
                <div class="col-md-2 form-group">
                    <select class="form-control" name="brands" required>
                        <option value="" disabled selected>Brand</option>
                        <option value="Adidas">Adidas</option>
                        <option value="Fila">Fila</option>
                        <option value="New Balance">New Balance</option>
                        <option value="Nike">Nike</option>
                        <option value="Puma">Puma</option>
                        <option value="Reebok">Reebok</option>
                        <option value="Skechers">Skechers</option>
                        <option value="Under Armour">Under Armour</option>
                    </select>
                </div>

                <!-- Prod Name -->
                <div class="col-md-2 form-group">
                    <input class="form-control" type="text" name="product_names" placeholder="Shoe Model" required />
                </div>

                <!-- Size -->
                <div class="col-md- form-group">
                    <select class="form-control" name="sizes" required>
                        <option value="" disabled selected>Size</option>
                        <option value="34.0">EU 34.0</option>
                        <option value="34.5">EU 34.5</option>
                        <option value="35.0">EU 35.0</option>
                        <option value="35.5">EU 35.5</option>
                        <option value="36.0">EU 36.0</option>
                        <option value="36.5">EU 36.5</option>
                        <option value="37.0">EU 37.0</option>
                        <option value="37.5">EU 37.5</option>
                        <option value="38.0">EU 38.0</option>
                        <option value="38.5">EU 38.5</option>
                        <option value="39.0">EU 39.0</option>
                        <option value="39.5">EU 39.5</option>
                        <option value="40.0">EU 40.0</option>
                        <option value="40.5">EU 40.5</option>
                        <option value="41.0">EU 41.0</option>
                        <option value="41.5">EU 41.5</option>
                        <option value="42.0">EU 42.0</option>
                        <option value="42.5">EU 42.5</option>
                        <option value="43.0">EU 43.0</option>
                        <option value="43.5">EU 43.5</option>
                        <option value="44.0">EU 44.0</option>
                        <option value="44.5">EU 44.5</option>
                        <option value="45.0">EU 45.0</option>
                        <option value="45.5">EU 45.5</option>
                        <option value="46.0">EU 46.0</option>
                        <option value="46.5">EU 46.5</option>
                        <option value="47.0">EU 47.0</option>
                        <option value="47.5">EU 47.5</option>
                        <option value="48.0">EU 48.0</option>
                        <option value="48.5">EU 48.5</option>
                        <option value="49.0">EU 49.0</option>
                        <option value="49.5">EU 49.5</option>
                        <option value="50.0">EU 50.0</option>

                    </select>
                </div>

                <!-- Color -->
                <div class="col-md-1 form-group">
                    <input class="form-control" type="text" name="colors" placeholder="Color" required />
                </div>

                <!--Price-->
                <div class="col-md-1 form-group">
                    <input class="form-control" type="text" name="prices" placeholder="Price" required />
                </div>

                <!--Quantity-->
                <div class="col-md-2 form-group">
                    <input class="form-control" type="text" name="quantity" placeholder="Quantity" required />
                </div>

                <!-- Insert Image -->
                <!-- <div class="col-md form-group">
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" class="form-control-file" id="image" name="image">
                        </div>
                    </form>
                </div> -->

                <!-- Button -->
                <div class="col-md form-group">
                    <input class="btn btn-light" type="submit" value="Add Product" id="add-product-btn">
                </div>

            </div>
        </form>
    </div>


    <div class="container-fluid">
        <?php
        $view = new view();
        if (isset($_POST['search-btn'])) {
            $view->viewSpecificProduct();
        } else if ($_POST['home']) {
            $view->viewAvailShoes();
            $view->viewUnavailShoes();
        } else {
            $view->viewAvailShoes();
            $view->viewUnavailShoes();
        }
        // $view->viewAvailShoes();
        // $view->viewSpecificProduct();
        ?>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
