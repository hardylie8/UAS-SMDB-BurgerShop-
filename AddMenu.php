<?php

    if(isset($_POST['AddMenu']))
    {
        include_once 'koneksi.php';
        $nama    = $_POST['nama'];
        $harga  = $_POST['harga'];
        $gambar= $_POST['gambar'];
        $category = $_POST['category'];
      
        $input  ="insert into menu
        values(null,'$nama', '$harga', '$gambar', '$category')";
        if(mysqli_query($koneksi, $input))
        {
          
            echo "<script>window.location='menu.php'</script>";
        }
        else
        {   
            echo "Error: " . $input . "<br>" . mysqli_error($koneksi);
        }
        
       
        
    }
    else
    {
        echo "<script>window.location='menu.php'</script>";
    }


?>