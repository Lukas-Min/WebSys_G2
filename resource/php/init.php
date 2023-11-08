<?php
require_once 'functions.php';

spl_autoload_register(function ($class) {
    require_once $_SERVER['DOCUMENT_ROOT'].'/WebSys_G2/class/'.$class.'.php';
});

?>