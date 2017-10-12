<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>SignUp | Lift kara do</title>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body style=" background-image: url(images/city_traff1.jpg);
    background-size: cover;
    background-repeat: no-repeat;">
    <!--php file start-->
<?php
    session_start();

    if(isset($_SESSION["userid"])){
        header("location: ../../home.php");
    }

    $_SESSION["message"]=null;
    $err=null;
    $ucheck=null;
    $msg=null; $nameErr=$emailErr=$adharErr=$mobErr=$checkErr=$passErr=$mobCheck=null;
    
    $rcErr=null;
    
    require_once 'conn.php';
	if(isset($_POST["submit"]))
    {
	$uname=$_POST["Name"];
	$uemail=$_POST["Email"];
	$umobile=$_POST["Mob"];
	$upass=$_POST["Psw"];
	$uadhaar=$_POST["Adhaar"];
	$udob=$_POST["Dob"];
	$ugender=$_POST["Gender"];
	$uaddr=$_POST["Addr"];
    $ucheck=$_POST["cpass"];
    $uvehi=$_POST["Vehi"];    
    $urcname=$_POST["rcname"];
    $urcnum=$_POST["rcnum"];    
    if($uvehi=="Y")
    {
        if(empty($urcname)||empty($urcnum))
        {
            $rcErr="Vechicle details required";
            $err="* Essential Feilds are required<br>";
        }
    }
	if(empty($uname) || empty($uemail) || empty($umobile) ||empty($upass) || empty($uadhaar) || empty($udob) || empty($ugender) || empty($ucheck))
    {
        
        $err="* Essential Feilds are required<br>";
    }    
    else    
    {  
        if (!preg_match("/^[a-zA-Z ]*$/",$uname)) 
        {
            $nameErr = "* Only letters and white space allowed<br>";
            $err="* Form Contains some Invalid Inputs<br>";
        }
 if(!preg_match("/^\d{4}\s\d{4}\s\d{4}\s\d{4}$/",$uadhaar)) 
        {
            $adharErr = "* Invalid Adhar Number Entered<br>";
            $err="* Form Contains some Invalid Inputs<br>";
        }
        if (!filter_var($uemail, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "* Invalid email format<br>";
            $err="* Form Contains some Invalid Inputs<br>";
                
        }
        if(!preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$umobile)) 
        {
            $mobErr = "* Invalid mobile Number<br>";
            $err="* Form Contains some Invalid Inputs<br>";
            
        }
        if(preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$umobile)) 
        {
            $mobstmt=$conn->prepare("select user_mob from users where user_mob=:mobile");
            $mobstmt->bindParam(':mobile',$umobile);
            if($mobstmt->execute())
            {
                $rows=$mobstmt->fetchAll();
                if(count($rows)==1)
                {
                    $mobCheck="* Entered Mobile Number is already registered<br>";
                     $err="* Form Contains some Invalid Inputs in mobile<br>";
                }
            }
        }
        if(!preg_match("/^.{4,8}$/",$upass))
        {
            $passErr="* Invalid Password";
            $err="* Form Contains some Invalid Inputs<br>";
            
        }
        if($upass != $ucheck)
        {
            $checkErr="* Password Not matched";
            $err="* Form Contains some Invalid Inputs<br>";            
        }
        else if(empty($nameErr) && empty($adharErr) && empty($emailErr) && empty($mobErr) &&empty($checkErr) &&empty($err) && empty($passErr) && empty($mobCheck) && empty($rcErr))
        {
        //    echo "all correct!!";
            $stmt=$conn->prepare("INSERT INTO users(user_name,user_email,user_mob,user_psw,user_adhaar,user_dob,user_gen,user_addr,user_vrc,user_vname) 
                                values(:name,:email,:mob,:psw,:adhaar,:dob,:gen,:addr,:vehirc,:vehiname)");
            $stmt->bindParam(':name',$uname);
            $stmt->bindParam(':email',$uemail);
            $stmt->bindParam(':mob',$umobile);
            $stmt->bindParam(':psw',$upass);
            $stmt->bindParam(':adhaar',$uadhaar);
            $stmt->bindParam(':dob',$udob);
            $stmt->bindParam(':gen',$ugender);
            $stmt->bindParam(':addr',$uaddr);
            $stmt->bindParam(':vehirc',$urcnum);
            $stmt->bindParam(':vehiname',$urcname);
            $stmt->execute();
            $_SESSION["message"]="Your Account is Created Successfully!";
            header("Location:login.php");
            //header("Location:confirm.html");
        }
    }
    }
?>    
    <!-- MultiStep Form -->
<div class="row" style="margin-right:0px;">
    <div class="col-md-6 col-md-offset-3" id="signup"> 
        <form id="msform" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <!-- progressbar -->
            <ul id="progressbar" style="text-align: center">
                <li class="active">Personal Details</li>
                <li>Social Information</li>
                <li>Account Setup</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Personal Details</h2>
                <h3 class="fs-subtitle">Tell Us About Yourself!</h3>
                <p>Name<span class="error"> *</span>:</p>
                <input type="text" name="Name" placeholder="Enter Your Name & Surname"/>
                
                <span class="error"><?php echo $nameErr?></span>
                
                <p>E-mail ID <span class="error"> *</span>:</p>
                <input type="text" name="Email" placeholder="Enter Your E-mail ID Here"/>
                
                <span class="error"><?php echo $emailErr?></span>
                <p>Adhar Card Details<span class="error"> *</span>:</p>
                <input type="text" name="Adhaar" placeholder="E.g: 1234 1234 1234 1234"/>
                
                <span class="error"><?php echo $adharErr?></span>
                
                <p>Date of Birth <span class="error"> *</span>:</p>
                <input type="date" name="Dob" placeholder="Date Of Birth">
                <span class="error"><?php echo $err; ?></span>
                <input type="button" name="next" class="next action-button" value="Next"/>
                <br>
                <a href="login.php">Already Have an Account?</a>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Social Information</h2>
                <h3 class="fs-subtitle">Know You more</h3>
    
    <!---Address details-->            
                <p>Address :</p>
                <textarea name="Addr" rows="1"></textarea>
                <p>Gender<span class="error"> *</span> :</p>
                <select name="Gender">
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="O">Other</option>  
                    
    <!---Vehicle details-->                
                </select>
                <p>Do You Have Car?<span class="error"> *</span></p>
                <select name="Vehi" id="car">
                <option value="N">No</option>    
                <option value="Y">Yes</option>                          
                </select>
              
                <div id="rc1" style="display:none">
                <input type="text" name="rcname" placeholder="Enter Model name of Your vechicle">  
                <input type="text" name="rcnum" placeholder="Enter RC Number Of Your Vechicle">
                </div>
    <!--Vechicle end-->              
                
                <span class="error"><?php echo $err; ?></span>
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <input type="button" name="next" class="next action-button" value="Next"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Create your account</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>
                
        <!--Credentials -->        
                <p>Mobile Number <span class="error"> *</span>:</p>
                <input type="text" name="Mob" placeholder="Enter 10 digit Mobile number"/>
                
                <span class="error"><?php echo $mobErr?></span><br>
                <span class="error"><?php echo $mobCheck?></span>
                <p>Password <span class="error"> *</span>:</p>
                
                
                <input type="password" name="Psw" placeholder="Enter 4-8 bit Password"/>
                <p>Confirm Your Password <span class="error"> *</span>:</p>
                <input type="password" name="cpass" placeholder="Confirm Password"/>
                
                <span class="error"><?php echo $passErr?></span>
                <span class="error"><?php echo $checkErr?></span>
                
                <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                <button type="submit" name="submit" value="submit">Submit<span class="glyphicon glyphicon-chevron-right"></span></button>
                <br>
                <a href="login.php">Already Have an Account?</a>
            </fieldset>
        </form>
        
    </div>
</div>
<!-- /.MultiStep Form -->
<script>
    
    
    
</script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>

    <script  src="js/index.js"></script>
</body>
</html>    