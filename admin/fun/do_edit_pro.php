<?php


include("connect.php");

// echo "<pre>";
// print_r($_FILES);

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$count = $_POST['count'];
$descr = $_POST['descr'];
// $image = $_POST['image'];
$category = $_POST['category'];
$brand = $_POST['brand'];


if($_FILES['image']['name']){
  
    

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


$update = "UPDATE products SET name='$name',price='$price',image='$new_img_name',descr='$descr',brand='$brand',cat='$category',count='$count' WHERE id = '$id'";

}else{

    $update = "UPDATE products SET name='$name',price='$price',descr='$descr',brand='$brand',cat='$category',count='$count' WHERE id = '$id'";

}



$conn->query($update);

header("location:../products.php");