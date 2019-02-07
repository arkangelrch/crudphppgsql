<?php
require_once "User.php";
if (empty($_POST['submit']))
{
      header("Location: list.php");
      exit;
}

$args = array(
    'username'  => FILTER_SANITIZE_STRING,
    'password'  => FILTER_SANITIZE_STRING,
);

$post = (object)filter_input_array(INPUT_POST, $args);

save($post);
header("Location: list.php");
