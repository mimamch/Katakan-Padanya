<?php
$conn = mysqli_connect('localhost', 'root', '', 'table');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
};


$berhasil = '';

if (isset($_POST["buat"])) {
    $nama = $_POST["nama"];

    if (strlen($nama) > 3) {

        $pregnama = preg_match('@[^\w]@', $nama);

        if (!$pregnama) {

            mkdir("p/$nama");
            $lokasi = "p/$nama/index.php";


            $buatfile = fopen($lokasi, "w+");
            fwrite($buatfile, "<?php include '../../template.php';?>");



            $sql = "CREATE TABLE $nama (
        id INT AUTO_INCREMENT PRIMARY KEY,
        pesan VARCHAR(500),
        waktu VARCHAR(100)
        )";
            if ($conn->query($sql) === TRUE) {
                $berhasil = "Berhasil";

                header("location: /p/$nama");
            } else {
                $berhasil = "Nama Sudah Pernah Dipakai";
            }
        } else {
            $berhasil = 'NAMA TIDAK BOLEH MENGANDUNG KARAKTER TERLARANG!';
        };
    } else {
        $berhasil = 'NAMA TERLALU PENDEK, MIN. 4 KARAKTER';
    }
};
mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KATAKAN PADANYA TANPA DIKETAHUI</title>
    <link rel="stylesheet" href="style.css?ver=2.8">
    <link rel="icon" type="image/png" href="favicon.png">
</head>

<body>

    <div class="container">
        <h1>KATAKAN PADANYA TANPA DIKETAHUI</h1>
        <?php echo "<p class='berhasil'>$berhasil</p>" ?>
        <h2>Buat Baru</h2>
        <form action="" method="post">
            <input class="nama" name="nama" autocomplete="off" placeholder="Masukkan Nama (Tanpa Spasi)" type="text" required>
            <button type="submit" name="buat" class="btn">BUAT</button>
        </form>
        
        <div class="carapenggunaan">
            <ol>
                <h2>CARA PENGGUNAAN :</h2>
                <li>Masukkan nama kamu pada kolom di atas lalu tekan tombol "BUAT"</li>
                <li>Bagikan Link ke sosial media kamu (cth : whatsapp story)</li>
                <li>Orang-orang dari sosial media kamu akan mengirimkan pesan anonymous kepada kamu pada kolom yang tersedia</li>
                <li>Kamu dapat melihat daftar pesan yang dikirimkan di kolom bawah</li>
            </ol>
            <ul>
                <h2>Note :</h2>
                <li>identitas pengirim tidak akan diketahui</li>
                <li>orang orang akan mengirimkan pesan jujur kepadamu</li>
                </ol>


        </div>

        <p class="creator">dibuat oleh <a href="https://instagram.com/mimamch28" class="linkcreator">MIMAMCH</a></p>

    </div>

</body>
