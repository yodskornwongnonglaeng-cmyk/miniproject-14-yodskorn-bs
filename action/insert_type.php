<?php

include 'connect.php';

$Type_id = $_POST["Type_id"];
$Type_name = $_POST["Type_name"];


$sql = "INSERT INTO Type
(Type_id, Type_name)

VALUES
('$Type_id', '$Type_name')";


if(mysqli_query($con,$sql)){

    header("location: ../type.php");
    exit;

}else{

    echo "ไม่สามารถเพิ่มประเภทได้";

}

?>