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
    <link rel="stylesheet" href="../../assets/p/style.css?ver=1.6">
</head>

<body>


    <div class='boxpesan'>
        <form action="" method="post">
            <h1>KATAKAN KEPADA <?php echo $link ?> TANPA DI KETAHUI</h1>
            <textarea rows="20" name="comment[text]" id="comment_text" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true"><?php echo $share ?></textarea>
            <input class="masuk" placeholder="Masukkan Pesan!" name="pesan" type="text" autocomplete="off" required>
            <button class="btn" name="kirim">KIRIM!</button>
            <a class="share" href="whatsapp://send?text=GFG Example for whatsapp sharing <?php echo $share ?>" data-action="share/whatsapp/share" target="_blank">Bagikan ke Whatsapp Story |</a>
             <a class="share" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share ?>">Bagikan ke Facebook</a>
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