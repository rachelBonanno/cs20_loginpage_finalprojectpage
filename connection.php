<?php

$conn = "";

try {
    $servername = "olivere3.sg-host.com";
    $dbname = "dbyrazjxedj5aa";
    $username = "root";
    $password = "";

    $conn = new PDO(
        "mysql:host=$servername; dbname=dbyrazjxedj5aa",
        $username, $password
    );

    $conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>
