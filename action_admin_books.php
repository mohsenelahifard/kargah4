<?php
include ('includes/header.php');
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] == "admin")) {
  ?>
  <script type="text/javascript">
    location.replace("index.php")
  </script>
  <?php
}
?>
<?php
if (
  isset($_POST['book_code']) && !empty($_POST['book_code']) &&
  isset($_POST['book_name']) && !empty($_POST['book_name']) &&
  isset($_POST['book_author']) && !empty($_POST['book_author']) &&
  isset($_POST['book_publisher']) && !empty($_POST['book_publisher']) &&
  isset($_POST['book_qty']) && !empty($_POST['book_qty']) &&
  isset($_POST['book_about']) && !empty($_POST['book_about']) &&
  isset($_POST['book_price']) && !empty($_POST['book_price'])
) {
  $book_code = $_POST['book_code'];
  $book_name = $_POST['book_name'];
  $book_author = $_POST['book_author'];
  $book_publisher = $_POST['book_publisher'];
  $book_qty = $_POST['book_qty'];
  $book_about = $_POST['book_about'];
  $book_price = $_POST['book_price'];
  $book_image = basename($_FILES["book_image"]["name"]);
} else if ($_GET['action'] != 'DELETE')
  exit("برخی از فیلدها مقداردهی نشده‌است.");
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (isset($_GET['action'])) {
  $id = $_GET['id'];
  switch ($_GET['action']) {
    case 'EDIT':
      $query = "UPDATE books SET book_code='$book_code',
      book_name='$book_name',
      book_author='$book_author',
      book_publisher='$book_publisher',
      book_qty='$book_qty',
      book_about='$book_about',
      book_price='$book_price'
      WHERE book_code='$book_code'";
      if (mysqli_query($link, $query) === true)
        echo "<p style='color: green;'><b>کتاب انتخاب شده شما با موفقیت ویرایش شد.</b></p>";
      else
        echo "<p style='color: red;'><b>خطا در ویرایش کتاب</b></p>";
      break;
    case 'DELETE':
      $book_code = $_GET['id'];
      $query = "DELETE FROM `books` WHERE book_code='$book_code'";
      if (mysqli_query($link, $query) === true)
        echo "<p style='color:green;'><b>کتاب انتخاب شده شما با موفقیت حذف شد.</b></p>";
      else
        echo "<p style='color:red;'><b>خطا در حذف کتاب</b></p>";
      break;
  }
  mysqli_close($link);
  include ('includes/footer.php');
  exit();
}
$target_dir = "images/books/";
$target_file = $target_dir . basename($_FILES["book_image"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
$check = getimagesize($_FILES["book_image"]["tmp_name"]);
if (file_exists($target_file)) {
  echo "پرونده‌ای با همین نام در سرویس‌دهنده‌ میزبان وجود دارد. <br/>";
  $uploadOk = 0;
}
if ($_FILES["book_image"]["size"] > (500 * 1024)) {
  echo "اندازه پرونده انتخابی بیشتر از 500 کیلوبایت است. <br/>";
  $uploadOk = 0;
}
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif")
  echo "فقط پسوندهای JPG, JEPG, PNG & GIF برای پرونده‌ها مجاز هستند <br/>";
if ($uploadOk == 0)
  echo "پرونده انتخاب‌شده به سرویس‌دهنده میزبان ارسال نشد. <br/>";
else {
  if (move_uploaded_file($_FILES["book_image"]["tmp_name"], $target_file)) {
    echo "پرونده " . basename($_FILES["book_image"]["name"]) .
      " با موفقیت به سرویس‌دهنده میزبان انتقال یافت. <br/>";
  } else
    echo "خطا در ارسال پرونده به سرویس دهنده میزبان رخ داده‌است. <br/>";
}
if ($uploadOk == 1) {
  $query = "INSERT INTO books(book_code, book_name, book_author, book_publisher, book_qty, book_about, book_price, book_image)
  VALUES('$book_code', '$book_name', '$book_author', '$book_publisher', '$book_qty', '$book_about', '$book_price', '$book_image')";
  if (mysqli_query($link, $query) === true)
    echo ("<p style='color:green;'><b>کتاب با موفقیت به انبار اضافه شد </b></p>");
  else
    echo ("<p style='color:red;'><b>خطا در ثبت مشخصات کتاب در انبار</b></p>");
} else
  echo ("<p style='color:red;'><b>خطا در ثبت مشخصات کتاب در انبار</b></p>");
mysqli_close($link);
include ('includes/footer.php');
?>