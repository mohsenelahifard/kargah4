<?php
include ('includes/header.php');
if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) { ?>
  <script type="text/javascript">
    function Redirect() {
      window.location = "index.php";
    }
    setTimeout('Redirect()', 0.00000001);
  </script>
  <?php
}
?>
<br />
<form name="login" action="action_login.php" method="POST">
  <table style="width: 50%;" style="margin-left: auto; margin-right: auto;">
    <tr>
      <td>نام کاربری <span style="color:red;">*</span> </td>
      <td> <input type="text" style=" text-align: left;" name="username" id="username" value=""> </td>
    </tr>
    <tr>
      <td>کلمه عبور <span style="color:red;">*</span> </td>
      <td> <input type="password" style=" text-align: left;" name="password" id="password" value=""> </td>
    </tr>
    <tr>
      <td> <br /> <br /> </td>
      <td>
        <input type="submit" value="ورود">
        &nbsp;&nbsp;&nbsp;
        <input type="reset" value="ریست">
      </td>
    </tr>
  </table>
</form>
<?php
include ('includes/footer.php');
?>