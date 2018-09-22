<?php
    
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        
        if($email == ''){
        unset($username);
        }
    }

    if(isset($_POST['pass'])){
        $pass =$_POST['pass'];
        
        if($pass == ''){
            unset($pass);
        }
    }

    if(empty($email) or empty ($pass)){
        exit("E-mail or password is incorrect!");
    }

    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    
    $pass = stripslashes($pass);
    $pass = htmlspecialchars($pass);
    $pass = password_hash("pass", PASSWORD_BCRYPT);

    $email = trim($email);
    $pass = trim($pass);

    
    $db = mysql_connect("localhost", "root");
    mysql_select_db("mysql", $db);

    mysql_close($db);
?>