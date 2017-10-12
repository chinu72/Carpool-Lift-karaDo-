<?php
session_start();
require_once 'conn.php';

        $oname=$_POST['org_ip_name'];
        $oid=$_POST['org_ip'];
        $olat=$_POST['org_ip_lat'];
        $olong=$_POST['org_ip_long'];
        $dname=$_POST['des_ip_name'];
        $did=$_POST['des_ip'];
        $dlat=$_POST['des_ip_lat'];
        $dlong=$_POST['des_ip_long'];
        $ddate=$_POST['of_date'];
        $dtime=$_POST['of_time'];
        $dseats=$_POST['of_seats'];
        $dmfu=$_POST['of_mfu'];
        $ofdur=$_POST['of_dur'];
        $ofdist=$_POST['of_dist'];
        $ofuser=$_SESSION['userid'];

        //        $oname='shreyas1';
        //        $oid='2';
        //        $olat='2.2';
        //        $olong='2.2';
        //        $dname='shreyas2';
        //        $did='1';
        //        $dlat='1.1';
        //        $dlong='1.1';
        //        $ddate='2017-10-06';
        //        $dtime='09:24:00';
        //        $dseats='3';
        //        $dmfu='hey users';

        $stmt = $conn->prepare("INSERT INTO `offer` (`offer_id`, `user_id`, `offer_time`, `offer_date`, `offer_seats`, `offer_mfu`, `offer_org_name`, `offer_org_id`, `offer_org_lat`, `offer_org_long`, `offer_des_name`, `offer_des_id`, `offer_des_lat`, `offer_des_long`, `offer_dur`, `offer_dist`) VALUES (NULL,:ofuser,:oftime,:ofdate,:ofseats,:ofmfu,:orgname,:orgid,:orglat,:orglong,:desname,:desid,:deslat,:deslong,:ofdur,:ofdist);");

        $stmt->bindParam(':ofuser', $ofuser);
        $stmt->bindParam(':oftime', $dtime);
        $stmt->bindParam(':ofdate', $ddate);
        $stmt->bindParam(':ofseats', $dseats);
        $stmt->bindParam(':ofmfu', $dmfu);
        $stmt->bindParam(':orgname', $oname);
        $stmt->bindParam(':orgid', $oid);
        $stmt->bindParam(':orglat', $olat);
        $stmt->bindParam(':orglong', $olong);
        $stmt->bindParam(':desname', $dname);
        $stmt->bindParam(':desid', $did);
        $stmt->bindParam(':deslat', $dlat);
        $stmt->bindParam(':deslong', $dlong);
        $stmt->bindParam(':ofdur', $ofdur);
        $stmt->bindParam(':ofdist', $ofdist);

        $stmt->execute();

        if ($stmt->rowCount()>0) {
            echo "Success";

        } else {
            echo "Failed";
        }
?>