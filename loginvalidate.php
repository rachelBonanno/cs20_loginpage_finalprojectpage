<?php

    include_once('connection.php');

    function test_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
//    $query = "SELECT * FROM users WHERE user='{$username}' AND password='{$password}'";
//    $result = mysql_query($query);
    $stmt = $conn->prepare("SELECT * FROM Customer WHERE username='$username' AND password='$password'");
    $stmt->execute();
    $user = $stmt->fetchAll();

    if (!$user) {
        header('Location: http://olivere3.sg-host.com/logininvalid.html');
    } else {
//        $row = mysql_fetch_assoc($user);
        $cookie_name = "currentuser";
        $cookie_value = $user['customer_Id'];
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
        header('Location: http://olivere3.sg-host.com/loginthanks.html');
    }

?>
