<?php

//connect
$conn = mysqli_connect('localhost', 'xwipxwmd_mimamch', 'mimamch28', 'xwipxwmd_admin');

$tabel = 'admin';
$berhasil = '';
$gagal = '';

// END CONNECT


// REGISTER
function register()
{


    if (isset($_POST["submit"])) {
        global $conn;
        global $tabel;
        $username = $_POST["username"];
        $password =  $_POST["password"];
        $passwordconfirm =  $_POST["passwordconfirm"];
        $preguser = preg_match('@[^\w]@', $username);
        $pregpass = preg_match('@[^\w]@', $password);
        global $berhasil;
        global $gagal;


        if ($passwordconfirm == $password) {
            
            // CEK DUPLIKAT
            $duplikat = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM $tabel WHERE username='$username'"));

            if ($duplikat < 1) {

                // CEK DUPLIKAT

               

                if ($preguser != true && $pregpass != true) {



                    //masukkan data ke database
                    $query = "INSERT INTO $tabel
                    VALUES
                    ('','$username','$password')";
                    mysqli_query($conn, $query);

                    //cek keberhasilan
                    if (mysqli_affected_rows($conn) > 0) {
                        $berhasil = '<p class="berhasil" for="berhasil">REGISTRATION SUCCESS<br><a href="../login/">LOGIN HERE</a></p>';
                    } else {
                        $berhasil = '<p class="gagal" for="berhasil">REGISTRATION FAILED : DATABASE ERROR</p>';
                    }
                } else {


                    $berhasil = '<p class="gagal" for="berhasil">REGISTRATION FAILED<br>MENGANDUNG KARAKTER TERLARANG!</p>';
                };
            } else {
                $berhasil = '<p class="gagal" for="berhasil">USERNAME SUDAH PERNAH DIGUNAKAN!</p>';
            };
        } else {
            $berhasil = '<p class="gagal" for="berhasil">PASSWORD DAN KONFIRMASI PASSWORD TIDAK SAMA</p>';
        }
    };
};


// END REGISTER

// LOGIN
function login()
{

    if (isset($_POST["submit"])) {
        global $tabel;
        global $conn;
        $username = $_POST["username"];
        $password =  $_POST["password"];
        $cekuser = mysqli_query($conn, "SELECT * FROM $tabel WHERE username='$username'");

        if (mysqli_num_rows($cekuser) === 1) {
            $cekpass = mysqli_fetch_assoc($cekuser)["password"];
            if ($cekpass === $password) {
                header('Location: ../register/');
                exit;
            } else {
                return '<p class="gagal">PASSWORD SALAH!</p>';
            }
        } else {
            return '<p class="gagal">USERNAME TIDAK DITEMUKAN</p>';
        };
    };
};

?>