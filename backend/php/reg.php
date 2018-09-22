<php
    
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
        exit("E-mail or pssword is incorrect!");
    }

    $email = stripeslashes($email);
    $email = htmlspecialchars($email);
    
    $pass = stripeslashes($pass);
    $pass = htmlspecialchars($pass);
    $pass = password_hash("pass", PASSWORD_BCRYPT);

    $email = trim($email);
    $pass = trim($pass);

    
    $db = mysql_connect("localhost", "root");
    mysql_select_db("mysql", $user_db);
    
    $bad_result = mysql_query("SELECT id FROM user_db.user_data WHERE email = '$email'", $db);
    $myrow = mysql_fetch_array($result);
    if(!empty($myrow['id'])){
        $email_taken == 'TRUE';
        exit("Sorry, user with this email is already registered!");
    }
    
    $good_result = mysql_query("INSERT INTO user_db.user_data(email, pass) VALUES('$email', '$pass')");
    if($good_result == 'TRUE'){
        $reg_success == 'TRUE';
        session_start();
        if($_SESSION['authorized']<>1){
            $authorized == 'TRUE';
        }
        echo "You've been successfuly registered!";
    }
    else{
        $reg_success = 'FALSE'
        echo "Registration failed. Sorry for inconveniences!";
    }
?>