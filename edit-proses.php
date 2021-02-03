<?php

if (isset($_POST['simpan']))
{
    include('koneksi.php');
    $id        = $_POST['Id'];
    $nama        = $_POST['Nama'];
    $harga       = $_POST['Harga'];
    $gambar     = $_POST['gambar'];
    $category     = $_POST['category'];
    $update     = mysqli_query($koneksi, "update menu set
    
    NamaMenu        = '$nama',
    Harga      = '$harga',
    Gambar      = '$gambar',
    Category      = '$category'
    where IdMenu   = '$id'")
        
    or die(mysqli_error());
    
    
    if($update)
    {
        echo "<h2>data berhasil diupdate</h2>";
        header("location:menu.php");
    }
    
    else
    {
        echo "<h2>gagal menyimpan data</h2>";
        header("location:menu.php");
    } 
}

else
{
        echo "<script>window.history.back()</script>";
}


?>