<?php

//opens session
session_save_path("D:\\");
session_start();

//includes redbean ORM (object-relational-mapping (makes database calls easier))
include "rb.php";

//sets up connection to database for redbean
R::setup( 'mysql:host=localhost;dbname=barapp', 'barapp', 'password' );

//checks to see if they are first comeing to the page or if they submitted their login info
if(!isset($_POST['submit'])){

    //displays login form
    echo "<form action=\"userlogin.php\" method=\"post\">

    username:<input type=\"text\" name=\"username\"/><br>
    password:<input type=\"password\" name=\"password\"/><br>
    <input type=\"submit\" name=\"submit\" value=\"login!\"/>

    </form>";

}else{

    //find the user with the username they are trying to login as
    $user = R::findone('user','username = "'.$_POST["username"].'"');

    //verifys that the password they provided is the same as the password that is stored in the database
    if(password_verify($_POST['password'],$user->password)){

        //if the password is correct then set all the session vars
        $_SESSION["username"] = $user->username;
        $_SESSION["id"] = $user->id;
        $_SESSION["type"] = "user";

        //redirects to the main page
        header("location: index.php");

    //displays if they failed to insert the right credentials
    }else{
        echo "fail";
    }

}

?>