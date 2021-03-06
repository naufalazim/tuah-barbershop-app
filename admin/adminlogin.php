
<?php
include('../include/connection.php');

session_start();
error_reporting(0);

if(isset($_SESSION['admin'])) {
    header("location: ./admin.php");
}


if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];

        //Kalau username and password empty akan show error:
        if(empty($username)) {
            $error['admin'] = 'Enter username';
        }else if(empty($password)) {
            $error['admin'] = 'Enter password';
        }else {
            $error['admin'] = "Wrong username or password";
        }

    //query:
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $mysqli->query($sql);

    if($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin'] = $row['username'];
        header('location: admin.php');
    } else {
        echo "<script>Wrong password</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
     <?php include "adminlogin.css" ?> 
    </style> 
</head>
<body>

<!-- HEADER  -->
    <?php
    include('../header/head.php');
    ?>

<!-- BODY PART  -->

<div class="container">
    <div class="box">

    <!-- PART BOX LOGIN  -->
        <h4>Login.</h4>


        <!-- ERROR LOGIN SHOWN  -->
        <div class="alert">
            <?php
            if(isset($error['admin'])) {
                $show = $error['admin'];
            } else {
                $show = "";
            }
            echo $show;
            ?>
        </div>

        <!-- PART: FORM  -->
        <form class="form" name="form" method="POST" action="adminlogin.php" id="login-form">

        <label><p>Username:</p> </label>
        <input type="text" name="username" id="username" class="username" placeholder="Admin Username"  value=""> <br>

        <label><p>Password:</p>  </label>
        <input type="password" name="pass" id="password" class="password" placeholder="Admin Password" value="">

        <br><input name="login" class="submit" id="submit" type="submit" value="Login">


    </form>

    </div>
</div>

    
</body>
</html>