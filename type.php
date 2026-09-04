<?php

session_start();

if (!isset($_SESSION["username"])) {

    header("location: login.php");
    exit;

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>ประเภทหนังสือ</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f0ff;
    min-height:100vh;
    display:flex;
    flex-direction:column;
}

.navbar-book{
    width:100%;
    background:linear-gradient(90deg,#6f42c1,#9b59b6);
    padding:15px 30px;
}

.navbar-book .navbar-brand{
    color:white;
    font-size:24px;
    font-weight:bold;
}

.navbar-book .btn{
    border-radius:20px;
    margin-left:5px;
}

.card{
    border:none;
    border-radius:20px;
}

.bg-purple{
    background-color:#6f42c1 !important;
}

.border-purple{
    border:2px solid #6f42c1 !important;
}

footer{
    width:100%;
    margin-top:auto;
    background:linear-gradient(90deg,#6f42c1,#9b59b6);
    color:white;
    padding:30px 20px;
    text-align:center;
}

body {
    margin: 0;
    min-height: 100vh;

    background-image:
        linear-gradient(
            rgba(0, 0, 0, 0.45),
            rgba(0, 0, 0, 0.45)
        ),
        url("background.jpg");

    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    background-repeat: no-repeat;

    font-family: Arial, sans-serif;
}


/* ===== BOOK STORE NAVBAR ===== */
.navbar-book{
    width:100%;
    padding:15px 30px;
    background:rgba(10,5,35,0.90);
    border-bottom:1px solid rgba(255,255,255,0.20);
    box-shadow:0 5px 20px rgba(0,0,0,0.45);
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
    color:white !important;
    text-decoration:none;
    font-size:24px;
    font-weight:bold;
    letter-spacing:2px;
    transition:0.3s;
}
.navbar-brand:hover{ color:#b99cff !important; }
.navbar-menu{
    display:flex;
    align-items:center;
    gap:10px;
    flex-wrap:wrap;
}
.nav-btn{
    color:white !important;
    text-decoration:none;
    padding:10px 18px;
    border-radius:10px;
    border:1px solid rgba(255,255,255,0.30);
    background:rgba(255,255,255,0.08);
    font-weight:bold;
    transition:0.3s;
}
.nav-btn:hover{
    color:white !important;
    background:linear-gradient(90deg,#4776e6,#8e54e9);
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(71,118,230,0.35);
}
.logout-btn{
    color:white !important;
    text-decoration:none;
    padding:10px 18px;
    border-radius:10px;
    background:linear-gradient(90deg,#dc3545,#ff4b5c);
    font-weight:bold;
    transition:0.3s;
}
.logout-btn:hover{
    color:white !important;
    transform:translateY(-2px);
    box-shadow:0 5px 15px rgba(220,53,69,0.40);
}
@media (max-width:900px){
    .navbar-content{ flex-direction:column; }
    .navbar-menu{ justify-content:center; }
}

</style>

</head>

<body>

<!-- Navbar -->
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

<div class="container mt-5 mb-5">

<div class="card shadow-lg border-purple">

<div class="card-header bg-purple text-white text-center">

<h3>ประเภทหนังสือ</h3>

</div>


<div class="card-body">

<table class="table table-bordered table-hover text-center align-middle">

<thead>

<tr>

<th>รหัสประเภท</th>

<th>ชื่อประเภท</th>

<th>จัดการ</th>

</tr>

</thead>


<tbody>

<?php

include 'action/connect.php';

$sql = "SELECT * FROM Type";

$result = mysqli_query($con,$sql);

foreach($result as $type){

?>

<tr>

<td>
<?= $type["Type_id"] ?>
</td>

<td>
<?= $type["Type_name"] ?>
</td>

<td>

<a
href="action/delete_type.php?id=<?= $type["Type_id"] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('ต้องการลบประเภทนี้หรือไม่?');">

ลบ

</a>

</td>

</tr>

<?php

}

?>

</tbody>

</table>


<hr>


<h5 class="mb-3">
เพิ่มประเภทหนังสือ
</h5>


<form action="action/insert_type.php" method="post">

<div class="row">

<div class="col-md-3">

<input
type="number"
name="Type_id"
class="form-control"
placeholder="รหัสประเภท"
required>

</div>


<div class="col-md-7">

<input
type="text"
name="Type_name"
class="form-control"
placeholder="ชื่อประเภท"
required>

</div>


<div class="col-md-2">

<button class="btn btn-primary w-100">

เพิ่ม

</button>

</div>

</div>

</form>


</div>

</div>

</div>


<footer>

<h5>Book Store</h5>

<p>ระบบจัดการร้านขายหนังสือ</p>

<p>© 2026 All Rights Reserved</p>

</footer>


</body>
</html>