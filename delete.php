<?php
require_once "User.php";
$id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
if( $id ){
    delete($id);
}
header("Location: list.php");
