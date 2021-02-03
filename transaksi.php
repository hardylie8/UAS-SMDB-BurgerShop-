<?php
session_start();
if (isset($_POST['Pay'])) {
    include 'koneksi.php';
    $id = $_SESSION['idUser'];
    $qty         = $_POST['qty'];
    $totalHarga  = $_POST['totalHarga'];
    $subTotal    = $_POST['subTotal'];

    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d H:i:s");
    $input  = "insert into transaksi
            values(null,$id,'$qty',  '$totalHarga', '$subTotal','$date')";



    if (mysqli_query($koneksi, $input)) {
        $idTransaksi = mysqli_insert_id($koneksi);
        foreach ($_SESSION['cart'] as $idM => $value) {
            $jlh =   $_SESSION['cart'][$idM]['jlh'];
            $input  = "insert into detailtransaksi
               values(null,'$idTransaksi','$idM',  '$jlh')";
            mysqli_query($koneksi, $input);
        }
        unset($_SESSION['cart']);
        header("location:menu.php");
    } else {
        echo "Error: " . $input . "<br>" . mysqli_error($koneksi);
    }
} else {
    echo " oll";
}
