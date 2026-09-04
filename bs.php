<?php

session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Book Store</title>

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

            /* Background */
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

            border-bottom: 1px solid rgba(255, 255, 255, 0.2);

            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.5);

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


        /* MENU BUTTON */

        .nav-btn {

            color: white !important;

            text-decoration: none;

            padding: 10px 18px;

            border-radius: 10px;

            border: 1px solid rgba(255, 255, 255, 0.3);

            background: rgba(255, 255, 255, 0.08);

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
                0 5px 15px rgba(71, 118, 230, 0.4);
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
                0 5px 15px rgba(220, 53, 69, 0.4);
        }


        /* ================= CONTENT ================= */

        .container {

            flex: 1;
        }


        /* CARD */

        .card {

            border: none !important;

            border-radius: 20px !important;

            overflow: hidden;

            background: rgba(255, 255, 255, 0.96);

            box-shadow:
                0 15px 40px rgba(0, 0, 0, 0.45) !important;
        }


        /* PURPLE BORDER */

        .border-purple {

            border: 2px solid #8e54e9 !important;
        }


        /* CARD HEADER */

        .bg-purple {

            background: linear-gradient(
                90deg,
                #4776e6,
                #8e54e9
            ) !important;
        }

        .card-header {

            padding: 20px;
        }

        .card-header h3 {

            margin: 0;

            font-weight: bold;
        }


        /* ================= TABLE ================= */

        .table {

            margin-bottom: 0;
        }

        .table thead th {

            background: #eee8ff !important;

            color: #3c286b;

            font-weight: bold;

            padding: 15px;
        }

        .table tbody td {

            padding: 12px;

            vertical-align: middle;
        }

        .table tbody tr {

            transition: 0.2s;
        }

        .table tbody tr:hover {

            background: #f5f0ff;
        }


        /* ================= BOOK IMAGE ================= */

        .book-cover {

            width: 100px;

            height: 140px;

            object-fit: cover;

            border-radius: 10px;

            display: block;

            margin: auto;

            box-shadow:
                0 5px 15px rgba(0, 0, 0, 0.3);
        }


        /* ================= FOOTER ================= */

        footer {

            width: 100%;

            margin-top: auto;

            padding: 30px 20px;

            text-align: center;

            color: white;

            background: rgba(10, 5, 35, 0.95);

            border-top: 1px solid rgba(255, 255, 255, 0.2);

            box-shadow:
                0 -5px 20px rgba(0, 0, 0, 0.3);
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

        @media (max-width: 900px) {

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

    <div class="container mt-5 mb-5">

        <div class="card shadow-lg border-purple">

            <div class="card-header bg-purple text-white text-center">

                <h3>
                    รายการหนังสือ
                </h3>

            </div>


            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered table-hover text-center align-middle">

                        <thead>

                            <tr>

                                <th>
                                    รหัสหนังสือ
                                </th>

                                <th>
                                    ชื่อหนังสือ
                                </th>

                                <th>
                                    ราคา
                                </th>

                                <th>
                                    ภาพปก
                                </th>

                                <th>
                                    ประเภทหนังสือ
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            <?php

                            include 'action/connect.php';

                            $sql = "SELECT products.*, Type.Type_name
                                    FROM products
                                    LEFT JOIN Type
                                    ON products.type_id = Type.Type_id";

                            $result = mysqli_query($con, $sql);


                            foreach ($result as $product) {

                            ?>

                                <tr>

                                    <td>
                                        <?= $product["product_id"] ?>
                                    </td>

                                    <td>
                                        <?= $product["product_name"] ?>
                                    </td>

                                    <td>
                                        <?= $product["product_price"] ?> บาท
                                    </td>

                                    <td>

                                        <img
                                            src="<?= $product["product_cover"] ?>"
                                            class="book-cover"
                                            alt="book"
                                        >

                                    </td>

                                    <td>
                                        <?= $product["Type_name"] ?>
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


    <!-- ================= FOOTER ================= -->

    <footer>

        <h5>
            BOOK STORE
        </h5>

        <p>
            ระบบจัดการร้านหนังสือ
        </p>

        <p>
            © 2026 Book Store
        </p>

    </footer>


</body>

</html>