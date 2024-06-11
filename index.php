<?php
include("includes/header.php");

$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
    exit("خطایی به شرح زیر رخ داده‌است: " . mysqli_connect_error());
$query = "SELECT * FROM books";
$result = mysqli_query($link, $query);
?>
<table style="width: 100%;" border="1px">
    <tr>
        <?php
        $counter = 0;
        while ($row = mysqli_fetch_array($result)) {
            $counter++;
        ?>
            <td style="border-style: dotted dashed; vertical-align:top; width:33%; padding: 10px;">
                <h4 style="color: brown;"><?php echo ($row['book_name']); ?></h4>
                <a href="book_detail.php?id=<?php echo ($row['book_code']); ?>">
                    <img src="images/books/<?php echo ($row['book_image']); ?>" width="225px" height="200px">
                </a>
                <br/>
                قیمت: <?php echo ($row['book_price']); ?>&nbsp; ریال
                <br/>
                نویسنده: <?php echo ($row['book_author']); ?>
                <br/>
                ناشر: <?php echo ($row['book_publisher']); ?>
                <br/>
                تعداد موجودی: <span style="color: red;"><?php echo ($row['book_qty']); ?></span>
                <br/>
                درباره: <span style="color: green;"><?php echo (substr($row['book_about'], 0, 120)); ?></span>
                <br/><br/>
                <b><a href="book_detail.php?id=<?php echo ($row['book_code']); ?>" style="text-decoration: none;">توضیحات تکمیلی و خرید</a></b>
            </td>
        <?php
            if ($counter % 3 == 0)
                echo ("</tr><tr>");
        }
        if ($counter % 3 != 0)
            echo ("</tr>");
        ?>
</table>
<?php
include("includes/footer.php");
?>