<?php
function insertSh()
{
    if (!empty($_POST['brands']) && !empty($_POST['product_names']) && !empty($_POST['sizes']) && !empty($_POST['colors']) && !empty($_POST['prices']) && isset($_POST['quantity'])) {
        if ($_POST['quantity'] === 0 || $_POST['prices'] === 0){
            echo '<script>';
            echo 'document.addEventListener("DOMContentLoaded", function() {';
            echo '    var modalEqualZero = new bootstrap.Modal(document.getElementById("modalEqualZero"));';
            echo '    modalEqualZero.show();';
            echo '});';
            echo '</script>';
        } else {
            $insert = new insert($_POST['brands'], $_POST['product_names'], $_POST['sizes'], $_POST['colors'],$_POST['prices'], $_POST['quantity']);

            if ($insert->insertShoes()) {
                echo '<script>';
                echo 'document.addEventListener("DOMContentLoaded", function() {';
                echo '    var modalSuccess = new bootstrap.Modal(document.getElementById("modalSuccess"));';
                echo '    modalSuccess.show();';
                echo '});';
                echo '</script>';
            } else {
                echo '<script>';
                echo 'document.addEventListener("DOMContentLoaded", function() {';
                echo '    var modalFail = new bootstrap.Modal(document.getElementById("modalFail"));';
                echo '    modalFail.show();';
                echo '});';
                echo '</script>';
            }
        }
    }
}
function deleteSh()
{
    if (!empty($_POST['delete'])) {
        $edit = new delete($_POST['delete']);
        if ($edit->deleteTask()) {
            echo '<script>';
            echo 'document.addEventListener("DOMContentLoaded", function() {';
            echo '    var modalDelete = new bootstrap.Modal(document.getElementById("modalDelete"));';
            echo '    modalDelete.show();';
            echo '});';
            echo '</script>';
        } else {
            echo "Fail!";
        }
    }
}
function searchBarNotif()
{
    echo '<script>';
    echo 'document.addEventListener("DOMContentLoaded", function() {';
    echo '    var modalSearchFail = new bootstrap.Modal(document.getElementById("modalSearchFail"));';
    echo '    modalSearchFail.show();';
    echo '});';
    echo 
    '</script>';
}
?>

<!-- Insert Success Modal -->
<!-- <div class="modal" id="modalSuccess" tabindex="-1">\
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="resource/img/success.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
                <h5 class="modal-title">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Nice! The shoe has been successfully inserted in the system!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Insert Fail Modal -->
<!-- <div class="modal" id="modalFail" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="resource/img/error.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
                <h5 class="modal-title">Error!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>The shoe you entered already exist.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Delete Success Modal -->
<!-- <div class="modal" id="modalDelete" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="resource/img/success.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
                <h5 class="modal-title">Success!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Nice! Successfully deleted!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Search Failed Shoe Modal -->
<!-- <div class="modal" id="modalSearchFail" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="resource/img/error.png" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
                <h5 class="modal-title">Error!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>No results found for the provided keyword!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->