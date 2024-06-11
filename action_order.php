<?php
include ("includes/header.php");
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
    ?>
    <script type="text/javascript">
        location.replace("index.php")
    </script>
    <?php
}
$book_code = $_POST['book_code'];
$book_name = $_POST['book_name'];
$book_qty = $_POST['book_qty'];
$book_price = $_POST['book_price'];
$total_price = $_POST['total_price'];
$realname = $_POST['realname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$username = $_SESSION['username'];
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
    exit("خطایی به شرح زیر رخ داده‌است: " . mysqli_connect_error());
$query = "INSERT INTO `orders`(`id`, `username`, `book_code`, `book_qty`, `book_price`, `mobile`, `address`, `trackcode`, `state`)
VALUES('0','$username', '$book_code', '$book_qty', '$book_price', '$mobile', '$address', '000000000000000000000000', '0')";
mysqli_set_charset($link, "UTF8");
if (mysqli_query($link, $query) === true) {
    echo "<p style='color:green;'><b>سفارش شما با موفقیت در سامانه ثبت شد.<br/></b></p>";
    echo "<p style='color:brown;'><b>کاربر گرامی آقا/خانم $realname <br/></b></p>";
    echo "<p style='color:brown;'><b>کتاب $book_name با کد $book_code به تعداد $book_qty با قیمت پایه $book_price ریال را سفارش داده‌اید. <br/></b></p>";
    echo "<p style='color:red;'><b>مبلغ قابل پرداخت برای سفارش ثبت شده $total_price ریال است. <br/></b></p>";
    echo "<p style='color:blue;'><b>پس از بررسی سفارش و تایید آن با شما تماس گرفته خواهد شد. <br/></b></p>";
    echo "<p style='color:blue;'><b>کتاب خریداری شده از طرق شرکت پست ایران طبق آدرس درج شده ارسال خواهد شد. <br/></b></p>";
    echo "<p style='color:blue;'><b>در هنگام تحویل گرفتن کتاب آن را بررسی و از صحت و سالم بودن آن اطمینان حاصل کنید؛ سپس مبلغ کتاب را طبق فاکتور ارائه شده به مامور پست تحویل دهید. <br/></b></p>";
    $query = "UPDATE books SET book_qty=book_qty-$book_qty where book_code='$book_code'";
    mysqli_query($link, $query);
} else {
    echo mysqli_error($link);
    echo mysqli_errno($link);
    echo "<p style='color:red;'><b>خطا در ثبت سفارش</b></p?";
}
mysqli_close($link);
include ('includes/footer.php');
?>