<?php

//loads the session
session_save_path("D:\\");
session_start();

//deletes the session data
session_destroy();

//redirects to the home page
header("location:index.php");
?>