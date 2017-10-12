<?php
    $err=null;
    $ucheck=null;
    $nameErr=$email=$adharErr=$mobErr=$checkErr=$passErr=$mobCheck=null;
    require_once 'connect.php';
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
	$uvehi=$_POST["Vehi"];
	$utype=$_POST["Type"];
    $ucheck=$_POST["cpass"];
        
	if(empty($uname) || empty($uemail) || empty($umobile) ||empty($upass) || empty($uadhaar) || empty($udob) || empty($ugender) || empty($ucheck))
    {
        
        $err="Some Feilds are required";
        echo "$err";
    }
    else    
    {  
        if (!preg_match("/^[a-zA-Z ]*$/",$uname)) 
        {
            $nameErr = "Only letters and white space allowed";
            echo "$nameErr";
        }
 if(!preg_match("/^\d{4}\s\d{4}\s\d{4}$/",$uadhaar)) 
        {
            $adharErr = "Invalid Adhar Number";
            echo "<br>$adharErr";
        }
        if (!filter_var($uemail, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = "Invalid email format";
            echo "$emailErr";
        }
        if(!preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$umobile)) 
        {
            $mobErr = "Invalid mobile Number";
            echo "$mobErr";
        }
        if(preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$umobile)) 
        {
            $mobstmt=$conn->prepare("select user_mob from user where user_mob=:mobile");
            $mobstmt->bindParam(':mobile',$umobile);
            if($mobstmt->execute())
            {
                $rows=$mobstmt->fetchAll();
                if(count($rows)==1)
                {
                    $mobCheck="Entered Mobile Number is aleready reagistered";
                    echo "<br>".$mobCheck;
                }
            }
        }
        if(!preg_match("/^.{4,8}$/",$upass))
        {
            $passErr="Invalid Password";
            echo "$passErr";
        }
        if($upass != $ucheck)
        {
            $checkErr="Password Not matched";
            echo "<br>".$checkErr;
        }
        else if(empty($nameErr) && empty($adharErr) && empty($emailErr) && empty($mobErr) &&empty($checkErr) &&empty($err) && empty($passErr) && empty($mobCheck))
        {
            echo "all correct!!";
            $stmt=$conn->prepare("INSERT INTO user(user_name,user_email,user_mob,user_psw,user_adhaar,user_dob,user_gen,user_addr,user_vehi,user_type) 
                                values(:name,:email,:mob,:psw,:adhaar,:dob,:gen,:addr,:vehi,:type)");
            $stmt->bindParam(':name',$uname);
            $stmt->bindParam(':email',$uemail);
            $stmt->bindParam(':mob',$umobile);
            $stmt->bindParam(':psw',$upass);
            $stmt->bindParam(':adhaar',$uadhaar);
            $stmt->bindParam(':dob',$udob);
            $stmt->bindParam(':gen',$ugender);
            $stmt->bindParam(':addr',$uaddr);
            $stmt->bindParam(':vehi',$uvehi);
            $stmt->bindParam(':type',$utype);
            $stmt->execute();
            header("Location:confirm.html");
        }
    }
    }
?>