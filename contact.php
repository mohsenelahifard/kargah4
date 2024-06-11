<script type="text/javascript">
    function confirm_check() {
        var result = confirm("آیا از صحت اطلاعات واردشده اطمینان دارید؟");
        if (result)
            document.contact.submit()
    }
</script>
<?php
include ("includes/header.php");
if (!(isset($_SESSION['state_login']) && $_SESSION['state_login'])) {
    ?>
    <script type="text/javascript">
        location.replace("index.php");
    </script>
    <?php
}
$link = mysqli_connect("localhost", "root", "", "shop_db");
if (mysqli_connect_errno())
    exit("خطایی با شرح زیر رخ داده‌است: " . mysqli_connect_error());
$username = $_SESSION['username'];
$query = "SELECT * FROM users WHERE username='$username'";
if ($row = mysqli_fetch_array(mysqli_query($link, $query))) {
    $realname = $row['realname'];
    $email = $row['email'];
}
?>
<form name="contact" action="action_contact.php" method="post" style="font-family: '2  Roya';">
    <table style="width: 100%; margin-left: auto; margin-right: auto;">
        <tr>
            <td style="width: 22%;">نام و نام‌خانوادگی <span style="color: red;">*</span></td>
            <td style="width: 78%;"> <input type="text" name="realname" id="realname" value="<?php echo ($realname) ?>">
            </td>
        </tr>
        <tr>
            <td style="width: 22%;">ایمیل <span style="color: red;">*</span></td>
            <td style="width: 78%;"> <input type="text" name="email" id="email" value="<?php echo ($email) ?>"></td>
        </tr>
        <tr>
            <td style="width: 22%;">متن پیام <span style="color: red;">*</span></td>
            <td style="width: 78%;"> <textarea name="message" id="message" cols="30" rows="5" pattern=".{30, 255}"
                    required> </textarea></td>
        </tr>
        <tr>
            <td><input type="button" value="ثبت" onclick="confirm_check()">&nbsp;<input type="reset" value="جدید"></td>
        </tr>
    </table>
</form>