<?php
require 'functions.php';
register();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR</title>
    <script src="https://kit.fontawesome.com/587e918107.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css?ver=2.3">
</head>

<body>



    <div class="box">
        <?php echo $berhasil; ?>
        <h1>DAFTAR</h1>

        <form action="" method="POST">
            <div class="textbox">


                <input type="text" name="username" id="username" placeholder="Buat Username" required>
                <i class="fas fa-sign-in-alt"></i>

            </div>
            <div class="textbox">

                <input type="password" name="password" id="password" placeholder="Buat Password" required>
                <i class="fas fa-lock"></i>

            </div>
            <div class="textbox">

                <input type="password" name="passwordconfirm" id="passwordconfirm" placeholder="Ulangi Password" required>
                <i class="fas fa-lock"></i>

            </div>
            <button class="btn" type="submit" name="submit">DAFTAR</button>

            <span class="creator">dibuat oleh<a href="https://instagram.com/mimamch28">MImamCh</a></span>
        </form>
    </div>


</body>

</html>