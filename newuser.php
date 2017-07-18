<html>

<head>

<title>new user</title>

</head>

<body>

    <?php

    if($_GET['type']=='user'){
        echo "<form action='adduser.php' method='post'>";
    }else{
        echo "<form action='addbar.php' method='post'><br>
        bar name:<input type='text' name='barname'/><br>
        ";
    }

    ?>

    username:<input type="text" name="username"/><br>
    password:<input type="password" name="password"/><br>
    <input type="submit" name="submit" value="create acount"/>

</form>

</body>

</html>