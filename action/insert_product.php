<?php

include 'connect.php';

$product_id = $_POST["product_id"];
$product_name = $_POST["product_name"];
$product_price = $_POST["product_price"];
$product_cover = $_POST["product_cover"];
$type_id = $_POST["type_id"];


$sql = "INSERT INTO products
(product_id, product_name, product_price, product_cover, type_id)

VALUES
('$product_id',
 '$product_name',
 '$product_price',
 '$product_cover',
 '$type_id')";


if(mysqli_query($con,$sql)){

    header("location: ../manage_product.php");
    exit;

}else{

    echo "ไม่สามารถเพิ่มข้อมูลได้";
}

?>