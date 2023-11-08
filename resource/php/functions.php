<?php
function insertSh()
{
    if (!empty($_POST['brands']) && !empty($_POST['product_names']) && !empty($_POST['sizes']) && !empty($_POST['colors']) && !empty($_POST['genders']) && !empty($_POST['prices'])) {
        $insert = new insert($_POST['brands'], $_POST['product_names'], $_POST['sizes'], $_POST['colors'], $_POST['genders'], $_POST['prices']);
        if ($insert->insertShoes()) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You have inserted the shoes successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Failed to insert the shoes. Please check if it\'s valid.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    }
}

function deleteSh()
{
    if (!empty($_POST['delete'])){
        $delete = new delete($_POST['delete']);
        if ($delete->deleteShoes()) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You have deleted the shoes successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Failed to delete the shoes. Please check if it\'s valid.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    }
}

function editSh()
{
    if (!empty($_POST['edit'])){
        $edit = new edit($_POST['edit']);
        if ($edit->editShoes()) {
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Success!</strong> You have deleted the shoes successfully.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Failed to delete the shoes. Please check if it\'s valid.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>';
        }
    }
}


function viewAll(){
    $view = new view();
    $view->viewItem();
    $view->viewCompletedItem();
       
    //viewspecific product function
    $view->viewSpecificProduct();

}

function commandShoes(){
    insertSh();
    deleteSh();
    editSh();
}


?>



