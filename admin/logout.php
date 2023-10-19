<?php
session_start();
session_destroy();
echo "<script>alert('ออกจากระบบเรียบร้อย')</script>";
echo "<script>window.location='../index.php'</script>";


?>