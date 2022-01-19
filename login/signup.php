<?php include('../conn/conn.php');
session_start();
//$_SESSION['sess_user'] = '';
//if(empty($_SESSION['sess_user'])){
//session_destroy();}?>
<?php
if(isset($_POST["submit"])){

	echo $_POST['user'];

if(!empty($_POST['user']) && !empty($_POST['pass']) && !empty($_POST['cpass'])) {
        $name = $_POST['name'];
		$user=$_POST['user'];
		$pass=$_POST['pass'];
        $cpass = $_POST['cpass'];
		echo $user;
        if($pass == $cpass) {
            $query = mysqli_query($conn,"select id,name,username, password from user where username='".$user."' and active='Y'");
            $row=mysqli_fetch_assoc($query);
            if(empty($row)){
                $query = mysqli_query($conn, "insert into user (name, username, password) values ($name,$user,$pass)");
                $row = mysqli_fetch_assoc($query);
                if(empty($row)){
                    echo "<script type ='text/javascript'> alert('Please try again'); </script>";
                }else {
                    echo "<script type ='text/javascript'> alert('User Created succesfully'); window.location.href='index.php';</script>";
                }
            }else{
                echo "<script type ='text/javascript'> alert('Username exists, Please try another'); </script>";
            }
        }else{
            echo "<script type ='text/javascript'> alert('Password mismatch'); </script>";
        }

    }
}else{
    echo "<script type ='text/javascript'> alert('Please try again'); </script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form>
        <input type="text" id="name" name="name" placeholder="name">
        <input type="text" id="user" name="user" placeholder="username">
        <input type="password" id="pass" name="pass" placeholder="password">
        <input type="password" id="cpass" name="cpass" placeholder="confirm password">
        <button name="submit" id="submit" name="submit"> Sign Up </button>
    </form>    
</body>
</html>