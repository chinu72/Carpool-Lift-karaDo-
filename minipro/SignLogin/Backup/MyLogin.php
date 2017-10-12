<?php
    session_start();
    require_once 'connect.php';
	echo "conected successfully";
    $mobErr=$passErr=null;
	if(isset($_POST['submit']))
    {
	$uid=$_POST["logId"];
	$upass=$_POST["logPsw"];
	
        if(!preg_match("/^(?:(?:\+|0{0,2})91(\s*[\ -]\s*)?|[0]?)?[789]\d{9}|(\d[ -]?){10}\d$/",$uid)) 
        {
            $mobErr = "Invalid mobile Number";
            echo "$mobErr";
        }
        if(!preg_match("/^.{4,8}$/",$upass))
        {
            $passErr="Invalid Password";
            echo "$passErr";
        }
        if(empty($mobErr) && empty($passErr))
        {   
            $stmt=$conn->prepare("select user_id,user_mob,user_psw from user where user_mob=:logid and user_psw=:password");
            $stmt->bindParam(':logid',$uid);
            $stmt->bindParam(':password',$upass);
            echo "<br>login hai bhai"; 

            if($stmt->execute())
            {
                $rows=$stmt->fetchAll();
                if(count($rows)==1)
                {
                    echo "<br>only one user pressent";
                }
                else
                {
                    echo "<br>no user present";
                }
            }
        }
    }
        session_destroy();
?>