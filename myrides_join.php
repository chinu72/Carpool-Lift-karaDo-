<?php
    session_start();
    require_once "conn.php";
    $user=1;
    $stmt = $conn->prepare('SELECT offer_org_name,offer_des_name FROM offer,MyRide WHERE offer.offer_id=MyRide.offer_id AND (mr_jid1=:userid OR mr_jid1=:userid OR mr_jid2=:userid OR mr_jid3=:userid OR mr_jid4=:userid)');
    $stmt->bindParam(':userid',$user);
    $stmt->execute();

    $i=1;
    foreach ($stmt as $row) {

            echo "<tr><th scope='row'> $i </th><td>".$row[0]."</td><td>".$row[1]."</td></tr>";

    $i++;
    }

?>




