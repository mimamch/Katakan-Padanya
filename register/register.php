<?php

//connect
$conn = mysqli_connect('localhost', 'xwipxwmd_mimamch', 'mimamch28', 'xwipxwmd_admin');

$tabel = 'adm';


// END CONNECT


// REGISTER

function register()
{

    if (isset($_POST["submit"])) {

        $username = $_POST["username"];
        $password =  $_POST["password"];
        $passwordconfirm =  $_POST["passwordconfirm"];
        $preguser = preg_match('@[^\w]@', $username);
        $pregpass = preg_match('@[^\w]@', $password);

        if ($passwordconfirm === $password) {

            global $tabel;
            global $conn;

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
                        return '<p class="berhasil" for="berhasil">REGISTRATION SUCCESS</p>';
                    } else {
                        return '<p class="gagal" for="berhasil">REGISTRATION FAILED : DATABASE ERROR</p>';
                    }
                } else {


                    return '<p class="gagal" for="berhasil">REGISTRATION FAILED<br>MENGANDUNG KARAKTER TERLARANG!</p>';
                };
            } else {
                return '<p class="gagal" for="berhasil">USERNAME SUDAH PERNAH DIGUNAKAN!</p>';
            };
        } else {
            return '<p class="gagal" for="berhasil">PASSWORD DAN KONFIRMASI PASSWORD TIDAK SAMA</p>';
        };
    };
};

// END REGISTER
