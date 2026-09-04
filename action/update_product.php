<?php

include 'connect.php';

$product_id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_price = $_POST["product_price"];
$product_cover = $_POST["product_cover"];
$type_id = $_POST["type_id"];


$sql = "UPDATE products SET

product_name = '$product_name',

product_price = '$product_price',

product_cover = '$product_cover',

type_id = '$type_id'

WHERE product_id = '$product_id'";


if(mysqli_query($con,$sql)){

    header("location: ../manage_product.php");
    exit;

}else{

    echo "ไม่สามารถแก้ไขข้อมูลได้";

}

?>