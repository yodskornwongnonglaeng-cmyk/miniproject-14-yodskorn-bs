<?php

session_start();

if (isset($_SESSION["username"])) {
    header("Location: bs.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="th">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login - Books Shop</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

*{
    box-sizing:border-box;
}

body{
    margin:0;
    min-height:100vh;

    background-image:
        linear-gradient(
            rgba(0,0,20,0.45),
            rgba(0,0,20,0.65)
        ),
        url("background.jpg");

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;

    font-family:Arial, sans-serif;
}


/* กล่องจัดหน้า */

.login-page{
    min-height:100vh;

    display:flex;
    justify-content:center;
    align-items:center;

    padding:30px;
}


/* กล่อง Login */

.login-card{

    width:100%;
    max-width:430px;

    padding:40px;

    background:rgba(15,20,50,0.82);

    border:1px solid rgba(255,255,255,0.25);

    border-radius:25px;

    backdrop-filter:blur(10px);

    box-shadow:
        0 15px 40px rgba(0,0,0,0.6);
}


/* ชื่อร้าน */

.logo{

    text-align:center;

    color:white;

    font-size:28px;

    font-weight:bold;

    letter-spacing:2px;

    margin-bottom:8px;
}


/* เส้น */

.logo-line{

    width:70px;

    height:4px;

    margin:0 auto 25px;

    border-radius:10px;

    background:linear-gradient(
        90deg,
        #4776e6,
        #8e54e9
    );
}


/* Login */

.login-title{

    text-align:center;

    color:white;

    font-size:32px;

    font-weight:bold;

    margin-bottom:8px;
}


.login-subtitle{

    text-align:center;

    color:#d5d8ff;

    margin-bottom:30px;
}


/* Label */

.form-label{

    color:white;

    font-weight:bold;
}


/* ช่องกรอก */

.form-control{

    height:50px;

    border-radius:12px;

    border:none;

    padding-left:15px;

    background:rgba(255,255,255,0.95);
}


.form-control:focus{

    box-shadow:
        0 0 0 3px rgba(79,172,254,0.35);

    border:none;
}


/* ปุ่ม Login */

.login-btn{

    width:100%;

    height:52px;

    border:none;

    border-radius:12px;

    color:white;

    font-size:17px;

    font-weight:bold;

    background:linear-gradient(
        90deg,
        #4776e6,
        #8e54e9
    );

    transition:0.3s;
}


.login-btn:hover{

    transform:translateY(-2px);

    box-shadow:
        0 8px 20px rgba(71,118,230,0.4);
}


/* Footer */

.login-footer{

    text-align:center;

    color:#bfc5e8;

    font-size:13px;

    margin-top:25px;
}

</style>

</head>


<body>

<div class="login-page">

    <div class="login-card">

        <div class="logo">
            BOOKS SHOP
        </div>

        <div class="logo-line"></div>

        <h1 class="login-title">
            Login
        </h1>

        <p class="login-subtitle">
            เข้าสู่ระบบร้านขายหนังสือ
        </p>


        <form action="check_login.php" method="post">

            <div class="mb-3">

                <label class="form-label">
                    Username
                </label>

                <input
                    type="text"
                    name="username"
                    class="form-control"
                    placeholder="กรอก Username"
                    required>

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="กรอก Password"
                    required>

            </div>


            <button
                type="submit"
                class="login-btn">

                Login

            </button>

        </form>


        <div class="login-footer">
            Books Shop © 2026
        </div>

    </div>

</div>

</body>

</html>