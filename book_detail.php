<?php
include ('includes/header.php');
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
    exit("خطایی به شرح زیر رخ داده‌است: " . mysqli_connect_error());
$book_code = 0;
if (isset($_GET['id']))
    $book_code = $_GET['id'];
$query = "SELECT * FROM books WHERE book_code='$book_code'";
$result = mysqli_query($link, $query);
?>
<table style="width: 100%;" border="1px">
    <tr>
        <?php if ($row = mysqli_fetch_array($result)) { ?>
            <td style="border-style: dotted dashed; vertical-align:top; width:33%;">
                <h4 style="color: brown;"><?php echo ($row['book_name']); ?></h4>
                <a href="product_detail.php?id=<?php echo ($row['book_code']); ?>">
                    <img src="images/books/<?php echo ($row['book_image']); ?>" width="250px" height="150px">
                </a>
                <br />
                قیمت: <?php echo ($row['book_price']); ?>&nbsp; ریال
                <br />
                نویسنده: <?php echo ($row['book_author']); ?>
                <br />
                ناشر: <?php echo ($row['book_publisher']); ?>
                <br />
                تعداد موجودی: <span style="color: red;"><?php echo ($row['book_qty']); ?></span>
                <br />
                درباره: <span style="color: green;"><?php echo ($row['book_about']); ?></span>
                <br /><br />
                <b>
                    <a href="order.php?id=<?php echo ($row['book_code']); ?>" style="text-decoration: none;">
                        سفارش و خرید پستی
                    </a>
                </b>
            </td>
        <?php } ?>
    </tr>
</table>
<?php
include ('includes/footer.php');
?>