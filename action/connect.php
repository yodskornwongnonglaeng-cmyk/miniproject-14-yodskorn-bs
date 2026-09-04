<?php

$con = mysqli_connect(
    "localhost",
    "root",
    "",
    "Books shop"
);

if (!$con) {
    die("Can not Connect DB.");
}

mysqli_set_charset($con, "utf8mb4");

?>