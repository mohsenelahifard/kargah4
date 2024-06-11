<?php
include ("includes/header.php");
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
    exit("خطایی به شرح زیر رخ داده‌است: " . mysqli_connect_error());
$book_code = 0;
if (isset($_GET['id']))
    $book_code = $_GET['id'];
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
    ?>
    <br />
    <span style="color:red; font-family: '2  Roya';"><b>
            برای خرید پستی کتاب انتخاب‌شده باید وارد سایت شوید.
        </b>
    </span>
    <br /><br />
    <span>
        در صورتی که عضو فروشگاه هستید برای ورود
    </span>
    <a href="login.php" style="text-decoration: none; font-family: '2  Roya';"><span style="color: blue;">
            <b>
                اینجا
            </b>
        </span></a>
    <span>
        کلیک کنید.
    </span>
    <br /><br />
    <span>
        و در صورتی که عضو نیستید برای ثبت‌نام در سایت
    </span>
    <a href="register.php" style="text-decoration: none;><span style=" color: green;">
        <b>اینجا</b>
        </span></a>
    <span>
        کلیک کنید.
    </span>
    <br /><br />
    <?php
    exit();
}
$query = "SELECT * FROM books WHERE book_code='$book_code'";
$result = mysqli_query($link, $query);
?>
<form name="order" action="action_order.php" method="POST">
    <table style="width: 100%;" border="1px">
        <tr>
            <td style="width: 60%;">
                <?php
                if ($row = mysqli_fetch_array($result)) {
                    ?>
                    <br />
                    <table style="width: 100%;" border="0" style="margin-left: auto;margin-right:auto;">
                        <tr>
                            <td style="width: 22%;">کد کتاب <span style="color: red;">*</span></td>
                            <td style="width: 78%;"> <input type="text" id="book_code" name="book_code" value="
                        <?php echo ($book_code); ?>" style="background-color: lightgray;" readonly> </td>
                        </tr>
                        <tr>
                            <td>نام کتاب <span style="color: red;">*</span></td>
                            <td> <input type="text" id="book_name" name="book_name" value="
                        <?php echo ($row['book_name']); ?>" style="background-color: lightgray;" readonly> </td>
                        </tr>
                        <tr>
                            <td>تعداد درخواستی <span style="color: red;">*</span></td>
                            <td> <input type="text" style="text-align: left;" id="book_qty" name="book_qty"
                                    onchange="calc_price();"> </td>
                        </tr>
                        <tr>
                            <td>قیمت واحد کتاب<span style="color:red;">*</span></td>
                            <td><input type="text" style="text-align: left; background-color:lightgray;" id="book_price"
                                    name="book_price" value="<?php echo $row['book_price']; ?>" readonly>ریال</td>
                        </tr>
                        <tr>
                            <td>مبلغ قابل پرداخت<span style="color:red;">*</span></td>
                            <td>
                                <input type="text" style="text-align: left; background-color:lightgray;" id="total_price"
                                    name="total_price" value="0" readonly>ریال
                            </td>
                        </tr>
                        <script type="text/javascript">
                            function calc_price() {
                                var book_qty = <?php echo $row['book_qty']; ?>;
                                var price = document.getElementById('book_price').value;
                                var count = document.getElementById('book_qty').value;
                                if (count > book_qty) {
                                    alert('تعداد موجودی انبار کمتر از درخواست شما است!');
                                    document.getElementById('book_qty').value = 0;
                                    count = 0;
                                }
                                if (count == 0 || count == '')
                                    total_price = 0;
                                else
                                    total_price = count * price;
                                document.getElementById('total_price').value = total_price;
                            }
                        </script>
                        <?php
                        $query = "SELECT * FROM `users` WHERE username='{$_SESSION['username']}'";
                        $result = mysqli_query($link, $query);
                        $user_row = mysqli_fetch_array($result);
                        ?>
                        <tr>
                            <td><br /><br /><br /></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">نام خریدار<span style="color: red;"> *</span></td>
                            <td style="width: 40%;">
                                <input type="text" id="realname" name="realname"
                                    value="<?php echo $user_row['realname']; ?>"
                                    style="text-align: left; background-color:lightgray;">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">ایمیل <span style="color: red;"> *</span></td>
                            <td style="width: 40%;">
                                <input type="text" id="email" name="email" value="<?php echo $user_row['email']; ?>"
                                    style="text-align: left; background-color:lightgray;">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">شماره‌تلفن همراه <span style="color: red;"> *</span></td>
                            <td style="width: 40%;">
                                <input type="text" id="mobile" name="mobile" value="" style="text-align: left;">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 40%;">آدرس دقیق پستی جهت دریافت کتاب<span style="color: red;"> *</span></td>
                            <td style="width: 40%;">
                                <textarea id="address" name="address" style="text-align: right;" cols="30" rows="3"
                                    wrap="virtual"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><br /><br /><br /><br /></td>
                            <td><input type="button" value="خرید کتاب" onclick="check_input();"></td>
                        </tr>
                    </table>
                </td>
                <td>
                    <script type="text/javascript">
                        function check_input() {
                            var r = confirm("آیا از صحت اطلاعات واردشده اطمینان دارید؟");
                            if (r == true) {
                                var validation = true;
                                var count = document.getElementById('book_qty').value;
                                var mobile = document.getElementById('mobile').value;
                                var address = document.getElementById('address').value;
                                if (count == 0 || count == '')
                                    validation = false;
                                if (mobile.length < 11)
                                    validation = false;
                                if (address.length < 15)
                                    validation = false;
                                if (validation)
                                    document.order.submit();
                                else
                                    alert('برخی از ورودی‌های فرم سفارش کتاب به‌درستی پر نشده‌اند.');
                            }
                        }
                    </script>
                    <table>
                        <tr>
                            <td style="border-style: dotted dashed; vertical-align: top; width: 33%; padding: 10px;">
                                <h4 style="color: brown;"> <?php echo $row['book_name']; ?> </h4>
                                <img src="images/books/<?php echo $row['book_image']; ?>" width="250px" height="120px"
                                    alt="">
                                <br />
                                قیمت: <?php echo ($row['book_price']); ?>&nbsp;ریال
                                <br />
                                تعداد موجودی: <span style="color: red;">
                                    <?php echo ($row['book_qty']); ?></span> <br /> <br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    <?php
                }
                include ('includes/footer.php');
                ?>