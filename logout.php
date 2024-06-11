<?php
session_start();
session_unset();
session_destroy();
?>
<html>

<head>
   <script type="text/javascript">
      function Redirect() {
         window.location = "index.php";
      }
      setTimeout('Redirect()', 0.00000001);
   </script>
</head>
<body>
</body>
</html>