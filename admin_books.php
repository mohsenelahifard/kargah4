<?php
include ('includes/header.php');
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin")) {
  ?>
  <script type="text/javascript">
    location.replace("index.php")
  </script>
  <?php
}
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
  exit("خطایی به شرح زیر رخ داده‌است: " . mysqli_connect_error());
$url = $book_code = $book_name = $book_author = $book_publisher = $book_qty = $book_about = $book_price = $book_image = "";
$btn_caption = "افزودن کتاب";
if (isset($_GET['action']) && $_GET['action'] == 'EDIT') {
  $id = $_GET['id'];
  $query = "SELECT * FROM books WHERE book_code='$id'";
  $result = mysqli_query($link, $query);
  if ($row = mysqli_fetch_array($result)) {
    $book_code = $row['book_code'];
    $book_name = $row['book_name'];
    $book_author = $row['book_author'];
    $book_publisher = $row['book_publisher'];
    $book_qty = $row['book_qty'];
    $book_about = $row['book_about'];
    $book_price = $row['book_price'];
    $book_image = $row['book_image'];
    $url = "?id=$book_code&action=EDIT";
    $btn_caption = "ویرایش کتاب";
  }
}
?>
<br />
<form name="add_books" action="action_admin_books.php" value="<?php if (!empty($url))
  echo $url; ?>" method="POST" enctype="multipart/form-data">
  <table style="width:100%;" style="margin-left: auto; margin-right: auto;">
    <tr>
      <td tyle="width: 22%;">کد کتاب <span style="color: red;">*</span></td>
      <td style="width: 78%;"> <input type="text" id="book_code" name="book_code" value="<?php echo ($book_code) ?>">
      </td>
    </tr>
    <tr>
      <td tyle="width: 22%;">نام کتاب <span style="color: red;">*</span></td>
      <td style="width: 78%;"> <input type="text" id="book_name" name="book_name" value="<?php echo ($book_name) ?>">
      </td>
    </tr>
    <tr>
      <td tyle="width: 22%;">نویسنده کتاب <span style="color: red;">*</span></td>
      <td style="width: 78%;"> <input type="text" id="book_author" name="book_author"
          value="<?php echo ($book_author) ?>">
      </td>
    </tr>
    <tr>
      <td tyle="width: 22%;">ناشر کتاب <span style="color: red;">*</span></td>
      <td style="width: 78%;"> <input type="text" id="book_publisher" name="book_publisher"
          value="<?php echo ($book_publisher) ?>"> </td>
    </tr>
    <tr>
      <td tyle="width: 22%;">تعداد موجودی کتاب <span style="color: red;">*</span></td>
      <td style="width: 78%;"> <input type="text" id="book_qty" name="book_qty" value="<?php echo ($book_qty) ?>">
      </td>
    </tr>
    <tr>
      <td tyle="width: 22%;">قیمت کتاب <span style="color: red;">*</span></td>
      <td style="width: 78%;"> <input type="text" id="book_price" name="book_price"
          value="<?php echo ($book_price) ?>">&nbsp; ریال </td>
    </tr>
    <tr>
      <td tyle="width: 22%;">بارگذاری تصویر <span style="color: red;">*</span></td>
      <td style="width: 78%;"> <input type="file" id="book_image" name="book_image" size="30">
        <?php if (!empty($book_image))
          echo "<img src='images/books/$book_image' width='80' height='40'"; ?>
      </td>
    </tr>
    <td tyle="width: 22%;">درباره کتاب <span style="color: red;">*</span></td>
    <td style="width: 78%;"> <textarea cols="35" rows="10" warp="vitual" type="text" id="book_about" name="book_about"><?php echo ($book_about) ?></textarea </td>
<br/>
    <input type="submit"value="<?php echo ($btn_caption) ?>"" >
    &nbsp;&nbsp;&nbsp;
    <input type="reset"  value="ریست">
  </table>
</form>
  <br/>
<table border="1px" style="width: 100%;" >
  <tr>
  <td>کد کتاب</td>
  <td>نام کتاب</td>
  <td>نویسنده کتاب</td>
  <td>ناشر کتاب</td>
  <td>تصویر کتاب</td>
  <td>تعداد موجودی کتاب</td>
  <td>قیمت کتاب</td>
  <td>ابزار مدیریتی</td>
  </tr>
<?php
$query = "SELECT * FROM books";
$result = mysqli_query($link, $query);
while ($row = mysqli_fetch_array($result)) {
  ?>
    <tr>
    <td><?php echo $row['book_code']; ?></td>
    <td><?php echo $row['book_name']; ?></td>
    <td><?php echo $row['book_author']; ?></td>
    <td><?php echo $row['book_publisher']; ?></td>
    <td><img src="images/books/<?php echo $row['book_image']; ?>" width="150px" height="150px" alt=""></td>
    <td><?php echo $row['book_qty']; ?></td>
    <td><?php echo $row['book_price']; ?> &nbsp ریال </td>
    <td>
    <b><a href="action_admin_books.php?id=<?php echo $row['book_code']; ?>&action=DELETE" style="text-decoration: none;">حذف</a></b>
    &nbsp;|&nbsp;
    <b><a href="admin_books.php?id=<?php echo $row['book_code']; ?>&action=EDIT" style="text-decoration: none;">ویرایش</a></b>
    </td>
    </tr>
    <?php
}
?>
</table>
<?php
include ('includes/footer.php');
?>