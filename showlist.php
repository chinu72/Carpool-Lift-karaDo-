<?php
require_once 'conn.php';
$olat = $_POST['org_ip_lat'];
$olong = $_POST['org_ip_long'];
$odate = $_POST['of_date'];
$otime = $_POST['of_time'];

//$olat = 18.508921;
//$olong = 73.926025;
//$odate = "2017-10-08";
//$otime = "02:55:00";

//$dlat = $_POST['des_ip_lat'];
//$dlong = $_POST['des_ip_long'];

$stmt=$conn->prepare('SELECT * FROM offer where offer_org_lat>(:olat-0.002) AND offer_org_lat<(:olat+0.002) AND offer_org_long<(:olong+0.002) AND offer_org_long>(:olong-0.002) AND offer_date=:odate AND offer_time>ADDTIME(:otime, "-1500") AND offer_time<ADDTIME(:otime, "1500") AND offer_seats>0');
$stmt->bindParam(':olat', $olat);
$stmt->bindParam(':olong', $olong);
$stmt->bindParam(':odate', $odate);
$stmt->bindParam(':otime', $otime);
$stmt->execute();

$stmt1=$conn->prepare('select user_name,user_gen from users WHERE user_id=:userid');

if ($stmt->rowCount()>0) {

echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">';
$i=0;
foreach ($stmt as $row) {
    $stmt1->bindParam(':userid',$row[1]);
    $stmt1->execute();
    $r[$i]=$stmt1->fetch(PDO::FETCH_NUM);
    ?>
    <div id="<?php echo $row[0]; ?>" class="col-xs-12 buton" onclick="sendID(this.id)">
        <div class="info-box-4 hover-expand-effect">
            <div class="icon" style="top: 20px;">
                <div class="text">
                    Seats Available
                </div>
                <div class="number">
                    <?php echo $row[4]; ?>
                </div>
            </div>
            <div class="content">
                <div class="number">
                    <?php if($r[$i][1]=="M"){ ?>
                    <i class="fa fa-mars" aria-hidden="true" style="padding-right:5px;"></i>
                    <?php }else{ ?>
                    <i class="fa fa-venus" aria-hidden="true" style="padding-right:5px;"></i>
                    <?php }echo $r[$i][0]; ?>
                </div>
                <div class="text">
                    <?php echo $row[5]; ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    $i++;
}

} else {
    echo 0;
}
?>
