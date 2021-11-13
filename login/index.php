<?php
require '../assets/functions.php';
login();

$connadmin = mysqli_connect('localhost', 'xwipxwmd_mimamch', 'mimamch28', 'xwipxwmd_admin');


if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $cookusername = $_COOKIE["username"];
    $cookpassword = $_COOKIE["password"];
    $sql = "SELECT * FROM $tabel WHERE username = '$cookusername'";
    
    $useradmin = mysqli_query($conn, $sql);
    
    $useradmin = mysqli_fetch_assoc($useradmin);
    

    if ($useradmin["username"] == $cookusername && $useradmin["password"] == $cookpassword) {
        $_SESSION["username"] = $cookusername;
        $_SESSION["password"] = $cookpassword;
        
        if (isset($_SESSION["username"])){
             header('location: ../admin'); 
             exit();
        }
    }
}   


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <script src="https://kit.fontawesome.com/587e918107.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css?ver=2.7">
</head>

<body>

    <div class="box">
        <h1>LOGIN</h1>
        <?php echo login() ?>
        <form action="" method="POST">
            <div class="textbox">


                <input type="text" name="username" autocomplete="off" id="username" placeholder="Username" required>
                <i class="fas fa-sign-in-alt"></i>

            </div>
            <div class="textbox">

                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class="fas fa-lock"></i>
            </div>
            <div class="rememberbox">
                <label class="labelremember" for="remember">Remember Me :</label>
                <input id="remember" type="checkbox" name="remember" class="remember">

            </div>
            <a href="" class="forgot">Forgot Password?</a>
            <button class="btn" type="submit" name="submit">LOGIN</button>

            <span class="creator">made by <a href="https://instagram.com/mimamch28">MImamCh</a></span>
        </form>
    </div>
</body>

</html>