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
    $pesan = htmlspecialchars($pesan);
    date_default_timezone_set("Asia/Jakarta");
    $waktu = date("s:i:H-l-d-m-y");
    $query = "INSERT INTO $tabel
        VALUES
    ('','$pesan','$waktu')";
    mysqli_query($conn, $query);

    header("location: #");


    mysqli_close($conn);
};

if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    $share = "https";
else
    $share = "http";

// Here append the common URL characters.
$share .= "://";

// Append the host(domain name, ip) to the URL.
$share .= $_SERVER['HTTP_HOST'];

// Append the requested resource location to the URL
$share .= $_SERVER['REQUEST_URI'];

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katakan Kepada <?php echo $link ?></title>
    <link rel="stylesheet" href="../../assets/p/style.css?ver=2.9">
    <link rel="icon" type="image/png" href="../../favicon.png">
</head>

<body>


    <div class='boxpesan'>
        <a class="buatbaru" href="https://katakanpadanya.tk">Buat Baru</a>

        <h1>KATAKAN KEPADA <?php echo $link ?> TANPA DI KETAHUI</h1>
        <input class="copy" type="text" value="<?php echo $share ?>" id="salinlink">
        <button onclick="myFunction()" id="salin">Salin Link</button>
        <form action="" method="post">
            <textarea maxlength="1000" class="masuk" placeholder="Masukkan Pesan!" name="pesan" type="text" autocomplete="off" required></textarea>
            <button class="btn" name="kirim">KIRIM!</button>
            <div class="boxshare">
                <p class="share">Bagikan Ke :
                    <a href="whatsapp://send?text=Kirim Pesan Kepada Saya Tanpa Diketahui Disini <?php echo $share ?>" data-action="share/whatsapp/share" target="_blank"><img alt="Whatsapp" class="whatsappimg" src="https://katakanpadanya.tk/assets/p/whatsapp.svg" width="90"></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share ?>"><img class="facebookimg" alt="Facebook" src="https://katakanpadanya.tk/assets/p/facebook.png" width="37"></a>
                </p>
            </div>
            <div class='boxmsg'>
                <p class="headpesan">PESAN :</p>
                <?php while ($pesan = mysqli_fetch_assoc($result)) {
                    $pesan = $pesan["pesan"];
                    echo "<p class='msg'>$pesan</p>";
                };
                ?>
                <p class='msg'>~Pesan Baru Akan Muncul Disini~</p>
            </div>
        </form>
        <p class="creator">dibuat oleh <a href="https://instagram.com/mimamch28" class="linkcreator">MIMAMCH</a></p>
    </div>


    <script>
        function myFunction() {
            var copyText = document.getElementById("salinlink");
            copyText.select();
            copyText.setSelectionRange(0, 99999);
            navigator.clipboard.writeText(copyText.value);

            var tooltip = document.getElementById("salin");
            tooltip.innerHTML = "Berhasil Disalin";
        }
    </script>
</body>

</html>