<?php
require_once 'conn.php';
echo 'hgf';
$error='';
if (isset($_POST['submit'])) {
    if (empty($_POST['form-name']) || empty($_POST['form-username']) || empty($_POST['form-email']) || empty($_POST['form-password'])) {
        $error = "UserID or Password is invalid";
    }
    else
    {
        echo 'fgd';
        $fname=$_POST['form-name'];
        $password=$_POST['form-password'];
        $email=$_POST['form-email'];
        $uname=$_POST['form-username'];
//        $fname=stripslashes($userid);
//        $password=stripslashes($userid);
//        $email=stripslashes($userid);
//        $uname=stripslashes($password);
//        $fname=trim($userid);
//        $password=trim($password);
//        $email=trim($password);
//        $uname=trim($password);

        $stmt = $conn->prepare("INSERT INTO users (user_fname,user_name,user_email,user_psw) VALUES (:userfname,:username,:useremail,:userpass)");
        $stmt->bindParam(':userfname', $fname);
        $stmt->bindParam(':username', $uname);
        $stmt->bindParam(':useremail', $email);
        $stmt->bindParam(':userpass', $password);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
//        echo json_encode($result);
        if ($stmt->rowCount()>0) {
            header("Location: index.php");
        } else {
            $error = "Username or Password is invalid";
        }
    }
}
?>