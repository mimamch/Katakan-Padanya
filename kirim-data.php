<?php  


if(isset($_POST)){
    
    $conn = mysqli_connect('localhost', 'root', '', 'user');

    $pesan = $_POST["pesan"];
    $tabel = $_POST['tabel'];
    $pesan = htmlspecialchars($pesan);
    date_default_timezone_set("Asia/Jakarta");
    $waktu = date("s:i:H-l-d-m-y");
    $query = "INSERT INTO $tabel
        VALUES
    ('','$pesan','$waktu')";
    $sql = mysqli_query($conn, $query);

    if($sql){

        showData();
        
    }else{
        
    }



    // header("location: #");


    mysqli_close($conn);
}


function showData(){
    global $conn;
    global $tabel;
    $result = mysqli_query($conn, "SELECT * FROM $tabel ORDER BY id DESC");
    
    $json = [];

    while($data = mysqli_fetch_assoc($result)){
        array_push($json, $data['pesan']);
    }

    echo json_encode($json);
}
