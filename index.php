<?php
require_once 'resource/php/init.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Shoes Inventory System</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark shadow">
        <span class="navbar-brand mb-0 h1">Shoes Inventory System</span>
    </nav>
    <div class="container mt-5">
        <?php
            insertSh();
            commandShoes();
        ?>

        <form action="" method="POST"> 
            <div class="row">
                <!-- Brand -->
                <div class="col-md-6 form-group">
                    <select class="form-control" name="brands" required>
                        <option value="" disabled selected>Brand</option>
                        <option value="Adidas">Adidas</option>
                        <option value="Converse">Converse</option>
                        <option value="Fila">Fila</option>
                        <option value="New Balance">New Balance</option>
                        <option value="Nike">Nike</option>
                        <option value="Puma">Puma</option>
                        <option value="Reebok">Reebok</option>
                        <option value="Skechers">Skechers</option>
                        <option value="Under Armour">Under Armour</option>
                        <option value="Vans">Vans</option>
                    </select>
                </div>
                
                <!-- Prod Name -->
                <div class="col-md-6 form-group">
                    <input class="form-control" type="text" name="product_names" placeholder="Insert a product name" required />
                </div>

                <!-- Size -->
                <div class="col-md-6 form-group">
                    <select class="form-control" name="sizes" required>
                        <option value="" disabled selected>Size</option>
                            <option value="36">36 EU</option>
                            <option value="37">37 EU</option>
                            <option value="38">38 EU</option>
                            <option value="39">39 EU</option>
                            <option value="40">40 EU</option>
                            <option value="41">41 EU</option>
                            <option value="42">42 EU</option>
                            <option value="43">43 EU</option>
                            <option value="44">44 EU</option>
                            <option value="45">45 EU</option>
                    </select>
                </div>

                <!-- Color -->
                <div class="col-md-6 form-group">
                    <input class="form-control" type="text" name="colors" placeholder="Insert a color" required />
                </div>

                <!--Gender-->
                <div class="col-md-6 form-group">
                    <select class="form-control" name="genders" required>
                        <option value="" disabled selected>Gender</option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                    </select>
                </div>

                <!--Price-->
                <div class="col-md-6 form-group">
                    <input class="form-control" type="text" name="prices" placeholder="Insert a price" required />
                </div>


                <!-- Button -->
                <div class="col-md">
                    <input class="btn btn-success" type="submit" value="Add"/>
                </div>




            </div>
        </form>

        <?php
            viewAll();
        ?>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>