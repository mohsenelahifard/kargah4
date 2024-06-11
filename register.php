<?php include ('includes/header.php');
if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) { ?>
  <p>شما قبلاً در فروشگاه سفارش و خرید آنلاین کتاب‌ها ثبت‌نام کردید.</p>
  <?php
} else { ?>
  <script type="text/javascript">
    function check_empty() {
      var field = document.forms["register"]["username"].value;
      if (field == null || field == "")
        alert("فیلد نام کاربری نباید خالی باشد");
      else {
        var r = confirm("آیا از صحت اطلاعات واردشده اطمینان دارید؟");
        if (r == true)
          document.register.submit();
      }
    }
  </script>
  <br />
  <form name="register" action="action_register.php" method="POST">
    <table style="width:50%;" border="0" style="margin-left: auto; margin-right: auto;">
      <tr>
        <td style="width:40%;">نام واقعی <span style="color: red;">*</span> </td>
        <td style="width:60%;"> <input type="text" id="realname" name="realname"> </td>
      </tr>
      <tr>
        <td style="width:40%;">نام کاربری <span style="color: red;">*</span> </td>
        <td style="width:60%;"> <input type="text" style="text-align: left;" id="username" name="username"> </td>
      </tr>
      <tr>
        <td style="width:40%;">کلمه عبور <span style="color: red;">*</span> </td>
        <td style="width:60%;"> <input type="password" style="text-align: left;" id="password" name="password"> </td>
      </tr>
      <tr>
        <td style="width:40%;">تکرار کلمه عبور <span style="color: red;">*</span> </td>
        <td style="width:60%;"> <input type="password" style="text-align: left;" id="repassword" name="repassword"> </td>
      </tr>
      <tr>
        <td style="width:40%;">ایمیل <span style="color:red;">*</span> </td>
        <td style="width:60%;"> <input type="text" style="text-align: left;" id="email" name="email"> </td>
      </tr>
      <tr>
        <td> <br /> <br /> </td>
        <td>
          <input type="button" value="ثبت‌نام" onclick="check_empty();">
          &nbsp;&nbsp;&nbsp;
          <input type="reset" value="ریست ">
        </td>
      </tr>
    </table>
  </form>
<?php }
include ('includes/footer.php'); ?>