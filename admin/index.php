<?php
session_start();

$conn = mysqli_connect('localhost', 'xwipxwmd_mimamch', 'mimamch28', 'xwipxwmd_secret');
$database = "xwipxwmd_secret";

// CEK SESSION

// $connadmin = mysqli_connect('localhost', 'root', '', 'user');
// $resultadmin = mysqli_query($connadmin, "SELECT * FROM akun");
// $useradmin = mysqli_fetch_assoc($resultadmin)["username"];
// $passradmin = mysqli_fetch_assoc($resultadmin)["password"];


if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {

    // cek cookie
    if (isset($_COOKIE['username'])) {
        $cookusername = $_COOKIE["username"];
        $cookpassword = $_COOKIE["password"];
        $sql = "SELECT * FROM akun WHERE username = '$cookusername'";
        $useradmin = mysqli_query($conn, $sql);
        $useradmin = mysqli_fetch_assoc($useradmin);

        if (($useradmin["username"] == $cookusername) && ($useradmin["password"] == $cookpassword)) {
            $_SESSION["username"] = $cookusername;
            $_SESSION["password"] = $cookpassword;
        } else {
            header('location:../login/');
            exit;
        }
    } else {
        header('location:../login/');
        exit;
    }
}

$result = mysqli_query($conn, "SHOW TABLES");
$resultjumlah = mysqli_query($conn, "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA LIKE '$database'");


if (isset($_POST["logout"])) {
    
    
    setcookie('username', $username, time() - (86400 * 30), "/"); // 86400 = -1 day
    setcookie('password', $password, time() - (86400 * 30), "/"); // 86400 = -1 day
    // remove all session variables
    session_unset();

    // destroy the session
    session_destroy();
    header('location: #');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css?ver=2.7">
</head>

<body>
    <div class="container">

        <h1>Selamat Datang Admin Ganteng</h1>
        <p class="jumlahpengguna">Jumlah Pengguna Saat ini : <?php echo $resultjumlah->num_rows; ?> </p>
        <form action="" method="POST"> <button class="logout" name="logout">LOG OUT</button></form>


        <div class="containerpengguna">
            <?php
            while ($nama = mysqli_fetch_assoc($result)) {
                $nama = $nama["Tables_in_$database"];
                $resultrow = mysqli_query($conn, "SELECT * FROM `$nama`");

                $jumlahpesan = mysqli_num_rows($resultrow);

                echo '<a class="daftarpengguna" target="_blank" href="../p/' . $nama . '">' . $nama . ' (' . $jumlahpesan . ')' . '</a>';
            }


            ?>






        </div>
    </div>
</body>

</html>