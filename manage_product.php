<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการหนังสือ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

*{box-sizing:border-box;}

html,body{
    margin:0;
    min-height:100%;
}

body{
    min-height:100vh;
    display:flex;
    flex-direction:column;
    font-family:Arial,sans-serif;
    background-image:
        linear-gradient(rgba(5,3,25,.58),rgba(5,3,25,.72)),
        url("background.jpg");
    background-size:cover;
    background-position:center;
    background-attachment:fixed;
    background-repeat:no-repeat;
}

/* ===== NAVBAR ===== */
.navbar-book{
    width:100%;
    padding:15px 30px;
    background:rgba(10,5,35,.92);
    border-bottom:1px solid rgba(255,255,255,.2);
    box-shadow:0 5px 20px rgba(0,0,0,.45);
    backdrop-filter:blur(12px);
    position:sticky;
    top:0;
    z-index:999;
}

.navbar-content{
    width:100%;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
}

.navbar-brand{
    color:#fff !important;
    text-decoration:none;
    font-size:24px;
    font-weight:bold;
    letter-spacing:2px;
    transition:.3s;
}

.navbar-brand:hover{color:#b99cff !important;}

.navbar-menu{
    display:flex;
    align-items:center;
    justify-content:flex-end;
    gap:10px;
    flex-wrap:wrap;
}

.nav-btn,.logout-btn{
    color:#fff !important;
    text-decoration:none;
    padding:10px 18px;
    border-radius:10px;
    font-weight:bold;
    transition:.3s;
}

.nav-btn{
    border:1px solid rgba(255,255,255,.3);
    background:rgba(255,255,255,.08);
}

.nav-btn:hover{
    color:#fff !important;
    background:linear-gradient(90deg,#4776e6,#8e54e9);
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(71,118,230,.35);
}

.logout-btn{
    background:linear-gradient(90deg,#dc3545,#ff4b5c);
}

.logout-btn:hover{
    color:#fff !important;
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(220,53,69,.4);
}

/* ===== CONTENT ===== */
.page-content{
    flex:1;
    width:100%;
    padding:45px 15px;
}

.book-card{
    border:1px solid rgba(255,255,255,.28) !important;
    border-radius:22px !important;
    overflow:hidden;
    background:rgba(255,255,255,.94);
    box-shadow:0 18px 45px rgba(0,0,0,.45);
}

.book-header{
    padding:20px;
    color:#fff;
    text-align:center;
    background:linear-gradient(90deg,#4776e6,#8e54e9);
}

.book-header h3{
    margin:0;
    font-weight:bold;
}

.book-body{
    padding:25px;
}

.table-wrap{
    overflow-x:auto;
}

.table{
    margin-bottom:0;
}

.table thead th{
    background:#eee8ff !important;
    color:#3c286b;
    font-weight:bold;
    white-space:nowrap;
}

.table tbody td{
    vertical-align:middle;
}

.table tbody tr{
    transition:.2s;
}

.table tbody tr:hover{
    background:#f7f3ff;
}

.book-cover{
    width:95px;
    height:135px;
    object-fit:cover;
    border-radius:10px;
    display:block;
    margin:auto;
    box-shadow:0 5px 15px rgba(0,0,0,.25);
}

.btn-purple{
    background:linear-gradient(90deg,#4776e6,#8e54e9);
    color:#fff;
    border:none;
}

.btn-purple:hover{
    color:#fff;
    transform:translateY(-1px);
    box-shadow:0 5px 12px rgba(71,118,230,.3);
}

.form-control,.form-select{
    border-radius:10px;
    padding:10px 13px;
}

.form-control:focus,.form-select:focus{
    border-color:#8e54e9;
    box-shadow:0 0 0 .2rem rgba(142,84,233,.2);
}

.form-label{
    font-weight:bold;
    color:#3c286b;
}

.text-purple{color:#6f42c1 !important;}

.action-btn{
    white-space:nowrap;
}

footer{
    width:100%;
    margin-top:auto;
    padding:28px 20px;
    text-align:center;
    color:#fff;
    background:rgba(10,5,35,.94);
    border-top:1px solid rgba(255,255,255,.15);
}

footer h5{
    margin-bottom:8px;
    font-weight:bold;
}

footer p{
    margin:4px 0;
    color:#ddd7f5;
}

@media(max-width:900px){
    .navbar-content{
        flex-direction:column;
    }
    .navbar-menu{
        justify-content:center;
    }
}

@media(max-width:576px){
    .navbar-book{
        padding:14px 12px;
    }
    .navbar-brand{
        font-size:21px;
    }
    .nav-btn,.logout-btn{
        padding:8px 11px;
        font-size:14px;
    }
    .page-content{
        padding:25px 10px;
    }
    .book-body{
        padding:15px;
    }
    .book-cover{
        width:75px;
        height:105px;
    }
}

    </style>
</head>

<body>


<nav class="navbar-book">
    <div class="navbar-content">
        <a href="bs.php" class="navbar-brand">BOOK STORE</a>

        <div class="navbar-menu">
            <a href="bs.php" class="nav-btn">หน้าหลัก</a>
            <a href="add_product.php" class="nav-btn">เพิ่มหนังสือ</a>
            <a href="manage_product.php" class="nav-btn">จัดการหนังสือ</a>
            <a href="type.php" class="nav-btn">ประเภทหนังสือ</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
</nav>



<main class="page-content">
    <div class="container">
        <div class="book-card">
            <div class="book-header">
                <h3>จัดการข้อมูลหนังสือ</h3>
                <div>แก้ไขหรือลบข้อมูลหนังสือ</div>
            </div>

            <div class="book-body">
                <div class="table-wrap">
                    <table class="table table-bordered table-hover text-center align-middle">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อหนังสือ</th>
                                <th>ราคา</th>
                                <th>ภาพปก</th>
                                <th>ประเภท</th>
                                <th>จัดการ</th>
                            </tr>
                        </thead>

                        <tbody>
<?php
include 'action/connect.php';

$sql = "SELECT products.*, Type.Type_name
        FROM products
        LEFT JOIN Type
        ON products.type_id = Type.Type_id";

$result = mysqli_query($con,$sql);

foreach($result as $product){
?>
                            <tr>
                                <td><?= $product["product_id"] ?></td>
                                <td class="fw-bold"><?= $product["product_name"] ?></td>
                                <td><?= $product["product_price"] ?> บาท</td>
                                <td>
                                    <img
                                        src="<?= $product["product_cover"] ?>"
                                        class="book-cover"
                                        alt="book">
                                </td>
                                <td><?= $product["Type_name"] ?></td>
                                <td>
                                    <a
                                        href="edit_product.php?id=<?= $product["product_id"] ?>"
                                        class="btn btn-warning btn-sm action-btn">
                                        แก้ไข
                                    </a>

                                    <a
                                        href="action/delete_product.php?id=<?= $product["product_id"] ?>"
                                        class="btn btn-danger btn-sm action-btn"
                                        onclick="return confirm('ต้องการลบหนังสือเล่มนี้หรือไม่?');">
                                        ลบ
                                    </a>
                                </td>
                            </tr>
<?php
}
?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>



<footer>
    <h5>Book Store</h5>
    <p>ระบบจัดการร้านขายหนังสือ</p>
    <p>© 2026 All Rights Reserved</p>
</footer>


</body>
</html>
