<?php

include "rb.php";

R::setup( 'mysql:host=localhost;dbname=barapp', 'barapp', 'password' );

if(isset($_POST['submit'])){

    $user = R::find('user', 'username="'.$_POST['username'].'"');

    if(!isset($user->username)){

        $user = R::dispense('user');

        $user->username = $_POST['username'];
        $user->username = $_POST['username'];
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $id = R::store( $user );

        echo "Account created!";

    }else{

        echo "Account not created for username is taken!";

    }

}

?>