<?php
    session_start();
    require_once "conn.php";
    $user=1;
    $stmt = $conn->prepare('SELECT offer_org_name,offer_des_name FROM offer,MyRide WHERE MyRide.offer_id=offer.offer_id AND mr_oid=:userid');
    $stmt->bindParam(':userid',$user);
    $stmt->execute();

    $i=1;
    foreach ($stmt as $row) {
        
            echo "<tr><th scope='row'> $i </th><td>".$row[0]."</td><td>".$row[1]."</td></tr>";
        
    $i++;
    }
?>




