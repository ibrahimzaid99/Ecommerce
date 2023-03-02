<?php

include("connect.php");
$id = $_GET['id'];


$delete = "DELETE FROM products WHERE id = '$id'";

$conn->query($delete);

header("location:../products.php");