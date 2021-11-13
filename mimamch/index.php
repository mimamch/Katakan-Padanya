<?php
$conn = mysqli_connect('localhost', 'xwipxwmd_mimamch', 'mimamch28', 'xwipxwmd_secret');
$tabel = 'mimamch';
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
    <title>Katakan Kepada MIMAMCH</title>
    <link rel="stylesheet" href="style.css?ver=1.1">
</head>

<body>


    <div class='boxpesan'>
        <form action="" method="post">
            <h1>KATAKAN KEPADA MIMAMCH TANPA DI KETAHUI</h1>
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