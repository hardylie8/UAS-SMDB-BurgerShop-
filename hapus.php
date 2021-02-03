<?php
        if(isset($_GET['id']))
        {
            include('koneksi.php');
            $id    = $_GET['id'];
            $cek    = mysqli_query($koneksi, "select IdMenu from menu
            where IdMenu = '$id'") or die(mysqli_error());
            
            if(mysqli_num_rows($cek)==0)
            {
                header("location:menu.php");
            }
            else
            {
                $del = mysqli_query($koneksi, "delete from menu where IdMenu = '$id'");
                header("location:menu.php");
            }
        }
    
        else
        {
            header("location:menu.php");
        }
    ?>