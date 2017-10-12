<?php
    session_start();
    require_once "conn.php";
    $stmt = $conn->prepare('SELECT user_rate FROM users WHERE user_id=:userid');
    $stmt->bindParam(':userid', $_SESSION['userid']);
    $stmt->execute();
    $row=$stmt->fetch(PDO::FETCH_NUM);
    echo json_encode($row[0]) ;
?>