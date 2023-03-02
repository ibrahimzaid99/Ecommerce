<?php
include("connect.php");

// echo "<pre>";
// print_r($_FILES);

$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$descr = $_POST['descr'];
// $image = $_POST['image'];
$category = $_POST['category'];
$brand = $_POST['brand'];

$img_name = $_FILES["image"]["name"];
$img_size = $_FILES["image"]["size"];
$img_tmp = $_FILES["image"]["tmp_name"];

$allow_ext = ["png", "jpg", "jpeg", "gif", "bmb"];

$img_exp = explode(".", $img_name);
$img_ext = end($img_exp);

if(!in_array($img_ext , $allow_ext)){
    echo "Wrong Extension";
    exit();
}

if($img_size > 3000000){
    echo"File is too large";
    exit();
}

$new_img_name = time() . rand(1 , 10000) . $img_name ;

move_uploaded_file($img_tmp, "../images/$new_img_name" );


$insert = "INSERT INTO products( name, price, image, descr, brand, cat, count) VALUES ('$name','$price','$new_img_name','$descr','$brand','$category','$count')";

$conn->query($insert);

header("location:../products.php");