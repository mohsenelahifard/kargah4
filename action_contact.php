<?php
include ("includes/header.php");
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده‌است: " . mysqli_connect_error());
if (isset($_POST['message']))
    $message = $_POST['message'];
if (isset($_SESSION['username']))
    $username = $_SESSION['username'];
$query = "INSERT INTO contacts(username, message) VALUES('$username', '$message')";
if (mysqli_query($link, $query) === true)
    echo ("<p style='color: green;'> <b> " . $username . " عزیز، پیغام شما با موفقیت ثبت شد. </b> </p>");
else
    echo ("<p style='color: red;'> <b> در ثبت اطلاعات پیام، خطایی رخ داده‌است. </b> </p>");
mysqli_close($link);
include ("includes/footer.php");