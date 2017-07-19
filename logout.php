<?php
session_save_path("D:\\");
session_start();
session_destroy();
header("location:index.php");
?>