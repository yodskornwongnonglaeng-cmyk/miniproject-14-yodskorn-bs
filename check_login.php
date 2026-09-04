<?php

session_start();

include "action/connect.php";

$username = $_POST["username"] ?? "";
$password = $_POST["password"] ?? "";

$sql = "SELECT * FROM users
        WHERE username = '$username'
        AND password = '$password'";

$result = mysqli_query($con, $sql);

if (!$result) {
    die("เกิดข้อผิดพลาด SQL: " . mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {

    $user = mysqli_fetch_assoc($result);

    $_SESSION["username"] = $user["username"];
    $_SESSION["fname"] = $user["fname"];
    $_SESSION["lname"] = $user["lname"];

    header("Location: bs.php");
    exit();

} else {

    echo "Username หรือ Password ไม่ถูกต้อง";
    echo "<br><br>";
    echo "<a href='login.php'>กลับหน้า Login</a>";

}

?>

