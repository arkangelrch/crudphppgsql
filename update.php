<?php
require_once "User.php";
if (empty($_POST['submit'])){
      header("Location: list.php");
      exit;
}

$args = array(
    'id'        => FILTER_VALIDATE_INT,
    'username'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);
if( $post->id === false ){
    header("Location: list.php");
}

update($post);

header("Location: list.php");
