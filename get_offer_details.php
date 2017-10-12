<?php
    require_once 'conn.php';
    $offer_id=null;
    $offer_id = $_POST['offer_id'];
    //$offer_id ="23";

    $stmt=$conn->prepare('select user_id,offer_time,offer_date,offer_seats,offer_mfu,offer_org_name,offer_des_name from offer where offer_id=:offid');
    $stmt->bindParam(':offid', $offer_id);
    $stmt->execute();
    $user=$stmt->fetch(PDO::FETCH_NUM);

    $stmt1=$conn->prepare('select user_name,user_mob,user_rate,user_vname from users where user_id= :user_id ;');
    $stmt1->bindParam(':user_id', $user[0]);
    $stmt1->execute();
    $row = $stmt1->fetch(PDO::FETCH_NUM);

    $i=0;
    $j=0;
    while($i!=7)
    {
        $result[$i]=$user[$i];
        $i++;
    }
    while($i!=11)
    {
        $result[$i]=$row[$j];
        $i++;
        $j++;
    }

    echo json_encode($result);

?>