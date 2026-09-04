<?php

include 'connect.php';

$id = $_GET["id"];

$sql = "DELETE FROM products
        WHERE product_id = '$id'";


if(mysqli_query($con,$sql)){

    header("location: ../manage_product.php");
    exit;

}else{

    echo "ไม่สามารถลบข้อมูลได้";

}

?>