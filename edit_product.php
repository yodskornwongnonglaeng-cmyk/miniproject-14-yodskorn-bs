<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

include 'action/connect.php';

$sql = "SELECT * FROM products WHERE product_id = '$id'";

$result = mysqli_query($con, $sql);

$product = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>แก้ไขหนังสือ - Book Store</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            min-height: 100%;
        }

        body {

            min-height: 100vh;

            display: flex;
            flex-direction: column;

            font-family: Arial, sans-serif;

            background-image:
                linear-gradient(
                    rgba(10, 5, 35, 0.60),
                    rgba(10, 5, 35, 0.75)
                ),
                url("background.jpg");

            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }


        /* ================= NAVBAR ================= */

        .navbar-book {

            width: 100%;

            padding: 15px 30px;

            background: rgba(15, 8, 45, 0.95);

            border-bottom: 1px solid rgba(255,255,255,0.2);

            box-shadow: 0 5px 20px rgba(0,0,0,0.5);

            position: sticky;

            top: 0;

            z-index: 999;
        }

        .navbar-content {

            width: 100%;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;
        }


        /* BOOK STORE */

        .navbar-brand {

            color: white !important;

            text-decoration: none;

            font-size: 26px;

            font-weight: bold;

            letter-spacing: 2px;

            transition: 0.3s;
        }

        .navbar-brand:hover {

            color: #b99cff !important;
        }


        /* MENU */

        .navbar-menu {

            display: flex;

            align-items: center;

            gap: 10px;

            flex-wrap: wrap;
        }


        /* BUTTON */

        .nav-btn {

            color: white !important;

            text-decoration: none;

            padding: 10px 18px;

            border-radius: 10px;

            border: 1px solid rgba(255,255,255,0.3);

            background: rgba(255,255,255,0.08);

            font-weight: bold;

            transition: 0.3s;
        }

        .nav-btn:hover {

            color: white !important;

            background: linear-gradient(
                90deg,
                #4776e6,
                #8e54e9
            );

            transform: translateY(-2px);

            box-shadow:
                0 5px 15px rgba(71,118,230,0.4);
        }


        /* LOGOUT */

        .logout-btn {

            color: white !important;

            text-decoration: none;

            padding: 10px 18px;

            border-radius: 10px;

            background: linear-gradient(
                90deg,
                #dc3545,
                #ff4b5c
            );

            font-weight: bold;

            transition: 0.3s;
        }

        .logout-btn:hover {

            color: white !important;

            transform: translateY(-2px);

            box-shadow:
                0 5px 15px rgba(220,53,69,0.4);
        }


        /* ================= CONTENT ================= */

        .page-content {

            flex: 1;

            width: 100%;

            padding: 50px 15px;
        }


        /* ================= CARD ================= */

        .edit-card {

            max-width: 700px;

            margin: auto;

            background: rgba(255,255,255,0.96);

            border-radius: 22px;

            overflow: hidden;

            border: 2px solid #8e54e9;

            box-shadow:
                0 18px 45px rgba(0,0,0,0.45);
        }


        /* CARD HEADER */

        .edit-header {

            padding: 22px;

            text-align: center;

            color: white;

            background: linear-gradient(
                90deg,
                #4776e6,
                #8e54e9
            );
        }

        .edit-header h3 {

            margin: 0;

            font-weight: bold;
        }

        .edit-header p {

            margin: 6px 0 0;

            opacity: 0.9;
        }


        /* CARD BODY */

        .edit-body {

            padding: 30px;
        }


        /* LABEL */

        .form-label {

            font-weight: bold;

            color: #3c286b;
        }


        /* INPUT */

        .form-control,
        .form-select {

            border: 1px solid #d5c9ee;

            border-radius: 10px;

            padding: 12px;

            transition: 0.2s;
        }

        .form-control:focus,
        .form-select:focus {

            border-color: #8e54e9;

            box-shadow:
                0 0 0 0.2rem rgba(142,84,233,0.2);
        }


        /* BOOK COVER */

        .current-cover {

            width: 130px;

            height: 180px;

            object-fit: cover;

            border-radius: 12px;

            display: block;

            margin: 10px auto 25px;

            box-shadow:
                0 8px 20px rgba(0,0,0,0.3);
        }


        /* SAVE BUTTON */

        .btn-save {

            width: 100%;

            padding: 13px;

            border: none;

            border-radius: 10px;

            color: white;

            font-size: 17px;

            font-weight: bold;

            background: linear-gradient(
                90deg,
                #4776e6,
                #8e54e9
            );

            transition: 0.3s;
        }

        .btn-save:hover {

            color: white;

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(71,118,230,0.4);
        }


        /* BACK BUTTON */

        .btn-back {

            width: 100%;

            margin-top: 10px;

            padding: 12px;

            border-radius: 10px;

            text-decoration: none;

            text-align: center;

            display: block;

            color: #3c286b;

            background: #eee8ff;

            font-weight: bold;

            transition: 0.3s;
        }

        .btn-back:hover {

            color: #3c286b;

            background: #ddd0ff;
        }


        /* ================= FOOTER ================= */

        footer {

            width: 100%;

            margin-top: auto;

            padding: 30px 20px;

            text-align: center;

            color: white;

            background: rgba(10,5,35,0.95);

            border-top: 1px solid rgba(255,255,255,0.2);

            box-shadow:
                0 -5px 20px rgba(0,0,0,0.3);
        }

        footer h5 {

            margin-bottom: 8px;

            font-weight: bold;
        }

        footer p {

            margin: 4px 0;

            color: #ddd7f5;
        }


        /* ================= RESPONSIVE ================= */

        @media(max-width:900px) {

            .navbar-content {

                flex-direction: column;
            }

            .navbar-menu {

                justify-content: center;
            }

        }

    </style>

</head>


<body>


    <!-- ================= NAVBAR ================= -->

    <nav class="navbar-book">

        <div class="navbar-content">

            <a href="bs.php" class="navbar-brand">
                BOOK STORE
            </a>

            <div class="navbar-menu">

                <a href="bs.php" class="nav-btn">
                    หน้าหลัก
                </a>

                <a href="add_product.php" class="nav-btn">
                    เพิ่มหนังสือ
                </a>

                <a href="manage_product.php" class="nav-btn">
                    จัดการหนังสือ
                </a>

                <a href="type.php" class="nav-btn">
                    ประเภทหนังสือ
                </a>

                <a href="logout.php" class="logout-btn">
                    Logout
                </a>

            </div>

        </div>

    </nav>


    <!-- ================= CONTENT ================= -->

    <main class="page-content">

        <div class="edit-card">

            <!-- HEADER -->

            <div class="edit-header">

                <h3>
                    แก้ไขข้อมูลหนังสือ
                </h3>

                <p>
                    แก้ไขรายละเอียดหนังสือ
                </p>

            </div>


            <!-- BODY -->

            <div class="edit-body">

                <form
                    action="action/update_product.php"
                    method="post"
                >


                    <!-- รหัสหนังสือ -->

                    <div class="mb-3">

                        <label class="form-label">
                            รหัสหนังสือ
                        </label>

                        <input
                            type="text"
                            name="product_id"
                            class="form-control"
                            value="<?= $product['product_id'] ?>"
                            readonly
                        >

                    </div>


                    <!-- ชื่อหนังสือ -->

                    <div class="mb-3">

                        <label class="form-label">
                            ชื่อหนังสือ
                        </label>

                        <input
                            type="text"
                            name="product_name"
                            class="form-control"
                            value="<?= $product['product_name'] ?>"
                            required
                        >

                    </div>


                    <!-- ราคา -->

                    <div class="mb-3">

                        <label class="form-label">
                            ราคา
                        </label>

                        <input
                            type="number"
                            name="product_price"
                            class="form-control"
                            value="<?= $product['product_price'] ?>"
                            step="any"
                            required
                        >

                    </div>


                    <!-- ภาพปก -->

                    <div class="mb-3">

                        <label class="form-label">
                            ภาพปก
                        </label>

                        <input
                            type="text"
                            name="product_cover"
                            class="form-control"
                            value="<?= $product['product_cover'] ?>"
                            required
                        >

                    </div>


                    <!-- แสดงภาพปัจจุบัน -->

                    <div class="mb-3">

                        <label class="form-label d-block text-center">
                            ภาพปกปัจจุบัน
                        </label>

                        <img
                            src="<?= $product['product_cover'] ?>"
                            class="current-cover"
                            alt="book cover"
                        >

                    </div>


                    <!-- ประเภทหนังสือ -->

                    <?php

                    $sql_type = "SELECT * FROM Type";

                    $result_type = mysqli_query($con, $sql_type);

                    ?>

                    <div class="mb-4">

                        <label class="form-label">
                            ประเภทหนังสือ
                        </label>

                        <select
                            name="type_id"
                            class="form-select"
                            required
                        >

                            <?php

                            foreach ($result_type as $type) {

                            ?>

                                <option
                                    value="<?= $type["Type_id"] ?>"
                                    <?= $type["Type_id"] == $product["type_id"] ? "selected" : "" ?>
                                >

                                    <?= $type["Type_name"] ?>

                                </option>

                            <?php

                            }

                            ?>

                        </select>

                    </div>


                    <!-- SAVE -->

                    <button
                        type="submit"
                        class="btn-save"
                    >
                        บันทึกการแก้ไข
                    </button>


                    <!-- BACK -->

                    <a
                        href="manage_product.php"
                        class="btn-back"
                    >
                        กลับหน้าจัดการหนังสือ
                    </a>


                </form>

            </div>

        </div>

    </main>


    <!-- ================= FOOTER ================= -->

    <footer>

        <h5>
            BOOK STORE
        </h5>

        <p>
            ระบบจัดการร้านขายหนังสือ
        </p>

        <p>
            © 2026 All Rights Reserved
        </p>

    </footer>


</body>

</html>