<?php session_start(); ?>
<!DOCTYPE html>
<html style="background-color: rgb(253, 239, 174);">

<head>
    <meta charset="UTF-8">
    <title>‌فروشگاه سفارش و خرید آنلاین کتاب‌ها</title>
    <link rel="stylesheet" href="css/style.css">
    <style type="text/css">
        .set_style_link {
            text-decoration: none;
            font-weight: bold;
            color: red;
        }
    </style>
</head>

<body>
    <div class="divTable">
        <div style="display: table-row;">
            <div class="divTableCell">
                <header class="divTable">
                    <div style="display: table-row;">
                        <div class="divTableCell">
                            <span style="font-size: 20px; font-family: vazirmatn; display: block; text-align: center;">
                                به فروشگاه سفارش و خرید آنلاین کتاب‌ها خوش آمدید.</span>
                        </div>
                    </div>
                </header>
                <nav class="divTable" style="font-family: B Koodak, Segoe UI;">
                    <ul style="display:table-row;">
                        <li class="divTableCell"><a class="set_style_link" href="index.php">صفحه اصلی</a></li>
                        <li class="divTableCell"><a class="set_style_link" href="register.php">عضویت در سایت</a></li>
                        <?php if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
                            ?>
                            <li class="divTableCell"><a class="set_style_link" href="logout.php"> خروج از سایت
                                    <?php echo ("({$_SESSION['realname']})") ?>
                                </a></li>
                            <?php
                        } else {
                            ?>
                            <li class="divTableCell"><a class="set_style_link" href="login.php">ورود به سایت</a></li>
                        <?php } ?>
                        <li class="divTableCell"><a class="set_style_link" href="about.php">درباره ما</a></li>
                        <li class="divTableCell"><a class="set_style_link" href="contact.php">ارتباط با ما</a></li>
                        <?php if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin") {
                            ?>
                            <li class="divTableCell"><a class="set_style_link" href="admin_books.php">مدیریت کتاب‌ها </a>
                            </li>
                            <li class="divTableCell"><a class="set_style_link" href="admin_manage_order.php">مدیریت سفارشات </a>
                            </li>
                        <?php } ?>
                    </ul>
                </nav>
                <section class="divTable">
                    <section style="display: flex;">
                        <aside class="divTableCell" style="width: 25%;">&nbsp;&nbsp;&nbsp;<img
                                src="images/bookeshop-logo.jpg" alt="" width="200" style=" align-self: center;"></aside>
                        <section class="divTableCell" style="width: 75%;">