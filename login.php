<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Log-In | Lift kara do</title>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body style=" background-image:;
    background-size: cover;
    background-repeat: no-repeat;">
   <?php
    session_start();

   if(isset($_SESSION["userid"])){
       header("location: home.php");
   }

    require_once 'conn.php';
	//echo "conected successfully";
    $var=null;
  /*  if($_SESSION["message"])
    {
         $var=$_SESSION["message"];
        
        echo '<div class="alert alert-success" style="margin-bottom:-5px;"><center>'.$var.'</center></div>';
    }*/
    $mobErr=$passErr=null;
	if(isset($_POST['submit']))
    {
	$uid=$_POST["logId"];
	$upass=$_POST["logPsw"];
	
        if(!preg_match("/^[789]\d{9}$/",$uid)) 
        {
            $mobErr = "Invalid mobile Number";
            //echo "$mobErr";
        }
        if(!preg_match("/^.{4,8}$/",$upass))
        {
            $passErr="Invalid Password<br>";
            //echo "$passErr";
        }
        if(empty($mobErr) && empty($passErr))
        {   
            $stmt=$conn->prepare("select user_id,user_mob,user_psw from users where user_mob=:logid and user_psw=:password");
            $stmt->bindParam(':logid',$uid);
            $stmt->bindParam(':password',$upass);
           // echo "<br>login hai bhai";    
            if($stmt->execute())
            { 
                    $rows=$stmt->fetch(PDO::FETCH_ASSOC);
                    $_SESSION["userid"]=$rows['user_id'];
                    //echo $_SESSION["userid"];
                    //echo "<br>only one user pressent";
                header("location: home.php");
    
            }
        }
    }
?> 
      
  <!-- MultiStep Form -->
<div class="row" style="margin-right:0px;">
    <div class="col-md-6 col-md-offset-3" id="login"> 
        <form id="msform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <!-- progressbar -->
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Log-In To Your account</h2>
                <h3 class="fs-subtitle">Welcome Back to "Lift kara do!!"</h3>
                <p>Mobile Number :</p>
                <input type="text" name="logId" placeholder=" E.g: 9432132123"/>
                <span class="error"><?php echo $mobErr?></span><br>
                <p>Password :</p>
                <input type="password" name="logPsw" placeholder="Enter 8-16 bit Password"/>
                 <span class="error"><?php echo $passErr?></span><br>
                <button type="submit" name="submit" value="submit">Log-In</button>
                <br>
                <a href="signup.php">Create A New Account?</a>
            </fieldset>
        </form>
        
    </div>
</div>
<!-- /.MultiStep Form -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script  src="js/index.js"></script>

</body>
</html>
