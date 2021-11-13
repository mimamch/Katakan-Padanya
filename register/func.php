<?php

//connect
$conn = mysqli_connect('localhost', 'xwipxwmd_mimamch', 'mimamch28', 'xwipxwmd_user');

$tabel = 'akun';

// Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";


// END CONNECT


// REGISTER

$berhasil = '';
$gagal = '';
if (isset($_POST["submit"])) {

    $username = $_POST["username"];
    $password =  $_POST["password"];
    $preguser = preg_match('@[^\w]@', $username);
    $pregpass = preg_match('@[^\w]@', $password);

    //cekk
 // CEK DUPLIKAT
    $duplikat = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $tabel WHERE username='$username'"));

    if ($duplikat == 0) {

        // CEK DUPLIKAT

        //cekk

        if ($preguser != true && $pregpass != true) {



            //masukkan data ke database
            $query = "INSERT INTO $tabel
                    VALUES
                    ('','$username','$password')";
            mysqli_query($conn, $query);

            //cek keberhasilan
            if (mysqli_affected_rows($conn) > 0) {
                $berhasil = '<p class="berhasil" for="berhasil">REGISTRATION SUCCESS</p>';
            } else {
                $berhasil = '<p class="gagal" for="berhasil">REGISTRATION FAILED : DATABASE ERROR</p>';
            }
        } else {


            $berhasil = '<p class="gagal" for="berhasil">REGISTRATION FAILED<br>MENGANDUNG KARAKTER TERLARANG!</p>';
        };
    } else {
        $berhasil = '<p class="gagal" for="berhasil">USERNAME SUDAH PERNAH DIGUNAKAN!</p>';
    };
};

// END REGISTER

?>