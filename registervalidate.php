<?php

    include_once('connection.php');

    function test_input($data) {

        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $firstname = test_input($_POST["Firstname"]);
    $lastname = test_input($_POST["Lastname"]);
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM Customer WHERE username='$username'");
    $stmt->execute();
    $users = $stmt->fetchAll();

    if (!$users) {
        if ($firstname != "" && $lastname != "" && $username != "" && $password != "") {
            $makeid = uniqid();
            $sql_user = "INSERT INTO Customer (customer_Id, f_name, l_name, username, password)
                            VALUES ('" . $makeid . "','" . $firstname . "','" . $lastname . "','" . $username . "','" . $password . "')";
            $conn->query($sql_user);
            header('Location: http://olivere3.sg-host.com/registerthanks.html');
        } else {
            header('Location: http://olivere3.sg-host.com/registeruhoh.html');

        }
    } else {
        header('Location: http://olivere3.sg-host.com/registerinvaliduser.html');
    }
    exit();
?>
