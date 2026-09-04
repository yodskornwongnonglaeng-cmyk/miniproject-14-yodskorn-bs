<?php

include 'connect.php';

$id = $_GET["id"];


$sql = "DELETE FROM Type
        WHERE Type_id = '$id'";


if(mysqli_query($con,$sql)){

    header("location: ../type.php");
    exit;

}else{

    echo "ไม่สามารถลบประเภทได้";

}

?>