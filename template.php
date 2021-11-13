<?php

$conn = mysqli_connect('localhost', 'root', '', 'user');

//GET TABEL NAME
$link = $_SERVER['REQUEST_URI'];
$link = explode("/", $link);

// GANTI SAAT PINDAH SERVER
$link = $link[3];



$tabel = $link;
$result = mysqli_query($conn, "SELECT * FROM $tabel ORDER BY id DESC");




// if (isset($_POST["kirim"])) {

   
// };

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="../../assets/js/script.js"></script>
</head>

<body>


    <div class='boxpesan'>
        <a class="buatbaru" href="https://katakanpadanya.tk">Buat Baru</a>

        <h1>KATAKAN KEPADA <?php echo $link ?> TANPA DI KETAHUI</h1>
        <input class="copy" type="text" value="<?php echo $share ?>" id="salinlink">
        <button onclick="myFunction()" id="salin">Salin Link</button>
        <!-- <form method="post"> -->
            <!-- <form > -->
            <textarea maxlength="1000" class="masuk" placeholder="Masukkan Pesan!" name="pesan" type="text" autocomplete="off" required></textarea>
            <button id="btn" class="btn" name="kirim">KIRIM!</button>
            <div class="berhasil"></div>
            <!-- </form> -->
            <div class="boxshare">
                <p class="share">Bagikan Ke :
                    <a href="whatsapp://send?text=Kirim Pesan Kepada Saya Tanpa Diketahui Disini <?php echo $share ?>" data-action="share/whatsapp/share" target="_blank"><img alt="Whatsapp" class="whatsappimg" src="https://katakanpadanya.tk/assets/p/whatsapp.svg" width="90"></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share ?>"><img class="facebookimg" alt="Facebook" src="https://katakanpadanya.tk/assets/p/facebook.png" width="37"></a>
                </p>
            </div>
            <p class="headpesan">PESAN :</p>
            <div class='boxmsg'>
                <?php while ($pesan = mysqli_fetch_assoc($result)) {
                    $pesan = $pesan["pesan"];
                    echo "<p class='msg'>$pesan</p>";
                };
                ?>
            </div>
            <p class='msg'>~Pesan Baru Akan Muncul Disini~</p>
        <!-- </form> -->
        <p class="creator">dibuat oleh <a href="https://instagram.com/mimamch28" class="linkcreator">MIMAMCH</a></p>
    </div>
    <script>
        const tabel = `<?php echo $tabel ?>`
    </script>
</body>

</html>