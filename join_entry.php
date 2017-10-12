<?php
session_start();
require_once 'conn.php';

$offer_id=$_POST['key1'];
$oid=$_POST['key2'];
$userid=$_SESSION["userid"];

//$offer_id=30;
//$oid=2;
//$userid=1;

$stmt1=$conn->prepare('update offer set offer_seats=offer_seats-1 WHERE offer_id=:offid AND offer_seats>0');
$stmt1->bindParam(':offid', $offer_id);
$stmt1->execute();
if($stmt1->rowCount()>0)
{

    $stmt=$conn->prepare('select mr_id from MyRide where offer_id=:offid');
    $stmt->bindParam(':offid', $offer_id);
    $stmt->execute();

    if($stmt->rowCount()>0){

        $stmt2=$conn->prepare('update myride set mr_jid4=:userid1 where offer_id=:ofid1 and mr_jid1<>"" and mr_jid2<>"" and mr_jid3<>""');
        $stmt2->bindParam(':ofid1', $offer_id);
        $stmt2->bindParam(':userid1', $userid);
        $stmt2->execute();
        if($stmt2->rowCount()>0){
            echo 1;
        }
        else{
            $stmt3=$conn->prepare('update myride set mr_jid3=:userid1 where offer_id=:ofid1 and mr_jid1<>"" and mr_jid2<>""');
            $stmt3->bindParam(':ofid1', $offer_id);
            $stmt3->bindParam(':userid1', $userid);
            $stmt3->execute();
            if($stmt3->rowCount()>0){
                echo 1;
            }
            else{
                $stmt4=$conn->prepare('update myride set mr_jid2=:userid1 where offer_id=:ofid1 and mr_jid1<>""');
                $stmt4->bindParam(':ofid1', $offer_id);
                $stmt4->bindParam(':userid1', $userid);
                $stmt4->execute();
                echo 1;
            }
        }
    }
    else{
        $stmt1=$conn->prepare('insert into MyRide values(NULL,:ofid,:oid,:userid,NULL,NULL,NULL)');
        $stmt1->bindParam(':ofid', $offer_id);
        $stmt1->bindParam(':oid', $oid);
        $stmt1->bindParam(':userid', $userid);
        $stmt1->execute();
        echo 0;
    }
}
else{
    echo "b";
}
?>