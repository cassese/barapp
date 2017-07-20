<?php

//includes redbean ORM (object-relational-mapping (makes database calls easier))
include "rb.php";

//sets up connection to database for redbean
R::setup( 'mysql:host=localhost;dbname=barapp', 'barapp', 'password' );

//if they came here through the form and not just went to the url
if(isset($_POST['submit'])){

    //searches for a user with the username the same as the new user wants to set theirs as
    $user = R::find('user', 'username="'.$_POST['username'].'"');

    //if the search does not find anything then continue
    if(empty($user)){

        //sets $user to user type
        $user = R::dispense('user');

        //sets the user name
        $user->username = $_POST['username'];
        //sets the password to a hashe of the password so its not stored in plain text
        $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //stores the user info we just made into the database
        $id = R::store( $user );

        echo "Account created!<br>";

    /*if the search does find a match then alerts the user saying
    that it has already been taken*/
    }else{

        echo "Account not created for username is taken!";

    }

}

?>