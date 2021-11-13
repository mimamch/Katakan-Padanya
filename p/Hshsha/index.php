<?php

//GET TABEL NAME
$link = $_SERVER['REQUEST_URI'];
$link = explode("/", $link);
$link = $link[2];


$conn = mysqli_connect('localhost', 'xwipxwmd_mimamch', 'mimamch28', 'xwipxwmd_secret');
$tabel = $link;
$result = mysqli_query($conn, "SELECT * FROM $tabel ORDER BY id DESC");




if (isset($_POST["kirim"])) {

    $pesan = $_POST["pesan"];

    $query = "INSERT INTO $tabel
        VALUES
    ('','$pesan')";
    mysqli_query($conn, $query);

    header("location: #");

    // // BUAT TABEL
    // 
    // $sql = "CREATE TABLE imam1 (
    //     id INT AUTO_INCREMENT PRIMARY KEY,
    //     pesan VARCHAR(50))";

    // if (mysqli_query($conn, $sql)) {
    //     echo "Table created successfully";
    // } else {
    //     echo "Error creating table: " . mysqli_error($conn);
    // }

    mysqli_close($conn);
};


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katakan Kepada <?php echo $link ?></title>
    <link rel="stylesheet" href="style.css?ver=1.2">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;1,500&display=swap');

@media screen and (max-width:680px) {

    .boxpesan {
        width: 400px;
        float: none;
    }
}


body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: #2c3e50;
}

h1 {
    color: #2c3e50;
    font-size: 20px;
    text-align: center;
    margin-top: -10px;
    margin-bottom: 30px;
    box-sizing: border-box;
}

.boxpesan {
    position: absolute;
    top: 5%;
    left: 50%;
    transform: translate(-50%);
    width: 95%;
    max-width: 700px;
    background: lightgreen;
    padding: 40px;
    border-radius: 20px;
    box-sizing: border-box;
}

.msg {
    box-sizing: border-box;
    font-size: 18px;
    font-weight: 300;
    width: 100%;
    border: 1px solid #34495e;
    border-radius: 4px;
    padding: 2px 5px;
    overflow-wrap: break-word;

}

.boxmsg {
    box-sizing: border-box;
    width: 100%;
    margin-top: 40px;

}



.masuk {
    border: 2px solid #6c5ce7;
    border-radius: 5px;
    width: 100%;
    height: 60px;
    box-sizing: border-box;
    background: none;
    padding: 0 5px;
}

.btn {
    color: #34495e;
    letter-spacing: 2px;
    margin: 5px 0;
    box-sizing: border-box;
    font-size: 20px;
    background: none;
    border: 1px solid #6c5ce7;
    width: 100%;
    height: 30px;
    border-radius: 5px;
    cursor: pointer;
    padding: 0;
    transition: .5s;
}

.btn:hover {
    background: #6c5ce7;
    color: white;
}

.headpesan {
    box-sizing: border-box;
    border-bottom: 1px solid #34495e;
}
</style>
</head>

<body>


    <div class='boxpesan'>
        <form action="" method="post">
            <h1>KATAKAN KEPADA <?php echo $link ?> TANPA DI KETAHUI</h1>
            <input class="masuk" placeholder="Masukkan Pesan!" name="pesan" type="text" autocomplete="off" required>
            <button class="btn" name="kirim">KIRIM!</button>
            <div class='boxmsg'>
                <p class="headpesan">PESAN :</p>
                <?php while ($pesan = mysqli_fetch_assoc($result)) {
                    $pesan = $pesan["pesan"];
                    echo "<p class='msg'>$pesan</p>";
                };
                ?>
            </div>
        </form>
    </div>



</body>

</html>