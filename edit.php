<?php
session_start();
if (!isset($_SESSION['status']) || $_SESSION['status'] != "Admin") {
    header("location:home.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body {
            margin: 0;
            background-color: #242833;
            color: #fdFcfa;
            height: 100vh;
            overflow: hidden;
        }

        ul.topnav {
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            justify-content: center;
            list-style-type: none;
            margin: 0px 5%;
            padding: 0;
            padding-top: 10px;
        }

        ul.topnav li a {
            display: block;
            color: white;
            font-size: 20px;
            text-align: center;
            padding: 14px 0;
            text-decoration: none;
        }

        .cart {
            width: 20px;
            margin-right: 10px;
            margin-top: 2px;
        }

        .search {
            background-color: #616872;

            border-radius: 10px;
            margin: 5px 16px;
        }

        ::placeholder {
            color: #fdFcfa;
            opacity: 1;

        }

        .search input[type=text] {
            padding: 10px;
            font-size: 17px;
            border: none;
            color: #fdFcfa;
            border-radius: 10px 0 0 10px;
            background-color: #616872;
        }

        .search button {
            float: right;
            color: #fdFcfa;
            border-radius: 10px;
            padding: 10px 10px;
            background: #343b4c;
            font-size: 17px;
            border: none;
            cursor: pointer;
        }

        .log {
            text-align: center;
        }

        @media(min-width:1001px) {
            ul.topnav {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }

            #search {
                margin-left: auto;
                order: 1;
            }

            .log {
                order: 3;
            }

            #cart {
                order: 2;
            }

            .left {
                margin-right: 25px;
            }

            .right {
                margin-left: 25px;
            }

            .container {
                display: flex;
                flex-direction: column;
            }

            .box-1 {
                order: 1;
            }

            .box-2 {
                order: 2;
            }
        }

        .dropbtn {
            background-color: transparent;
            color: white;
            font-size: 20px;
            padding: 16px 10px;
            border: none;
            cursor: pointer;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #343b4c;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #616872;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #616872;
        }

        .container {
            margin: 3% 5%;
            display: flex;
            flex-direction: row;
        }

        .box-1 {
            flex-basis: 20%;
            text-align: center;
        }

        .box-2 {
            flex-basis: 80%;
        }

        .title {
            text-align: center;
        }

        .form-item {
            width: 600px;
            display: flex;
            justify-content: center;
            flex-direction: row;
        }

        .item1 {
            flex-basis: 30%;
            font-size: 20px;
            margin: 10px 20px;
        }

        .item2 {
            margin: 10px 20px;
            flex-basis: 70%;
            font-size: 15px;
        }

        .submit {
            font-size: 20px;
            border: 0;
            width: 120px;
            margin: 30px auto;
            background-color: #f34747;
            border: none;
            border-radius: 15px;
            color: #fdFcfa;
            padding: 5px 10px;
        }

        .submit:hover {
            background-color: #fdFcfa;
            color: #f34747;
            cursor: pointer;
        }

        .form-item input[type=text],
        .form-item select,
        .form-item textarea {
            background-color: #616872;
            border: none;
            border-radius: 15px;
            padding: 5px 10px;
            color: #fdFcfa;
        }
    </style>
</head>

<body>
    <ul class="topnav">
        <li><a class="left" href="home.php">Home </a></li>
        <li><a class="left" href="menu.php">menu</a></li>
        <li><a class="left" href="#contact">Contact</a></li>
        <?php
        if (isset($_SESSION['status']) && $_SESSION['status'] == "Admin") {
            echo ' <li><a class="left" href="order.php">order</a></li>';
        }
        ?>
        <li class="right" id="cart"><a href="cart.php"><img class="cart" src="img/cart.png" alt=""> Cart</a></li>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<li class="right log" > 
                    <div class="dropdown" >
                        <button class="dropbtn"> '
                . $_SESSION["username"] .
                ' </button>
                        <div class="dropdown-content">
                            <a href="#">Profile</a>
                            <a href="history.php">History</a>
                            <a href="#">Settings</a>
                            <a href="logout.php">Log Out</a>
                        </div>
                    </div> 
                    </li>';
        }
        if (!isset($_SESSION['username'])) {
            echo '<li class="right log"  ><a  href="login.php">Login</a></li>';
        }

        ?>
        <li class="right" id="search">
            <div class="search">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </li>
    </ul>
    <h1 class="title">Edit Menu</h1>
    <?php
    include_once 'koneksi.php';
    $id = $_GET['id'];
    $data = mysqli_query($koneksi, "select * from menu where IdMenu='" . $id . "' ");
    while ($d = mysqli_fetch_assoc($data)) {



    ?>
        <div class="container">
            <div class="box-1">
                <img src="<?php echo $d["Gambar"]; ?>" alt="">
            </div>
            <div class="box-2">
                <form action="edit-proses.php" method="POST">
                    <div class="form-item">
                        <label class="item1" for="">Id Menu </label>
                        <input class="item2" readonly name="Id" type="text" value="<?php echo $id; ?>">
                    </div>
                    <div class="form-item">
                        <label class="item1" for="">Nama Menu </label>
                        <input class="item2" name="Nama" type="text" value="<?php echo $d["NamaMenu"]; ?>">
                    </div>
                    <div class="form-item">
                        <label class="item1" for="">Harga </label>
                        <input class="item2" name="Harga" type="text" value="<?php echo $d["Harga"]; ?>">
                    </div>
                    <div class="form-item">
                        <label class="item1" for="">Link Gambar </label>
                        <textarea class="item2" name="gambar" id="" cols="30" rows="5"><?php echo $d["Gambar"]; ?></textarea>
                    </div>
                    <div class="form-item">
                        <label class="item1" for="">Category</label>
                        <select class="item2"  name="category">
                            <?php
                            include_once 'koneksi.php';
                            $data1 = mysqli_query($koneksi, "SELECT DISTINCT Category from menu");
                            while ($d1 = mysqli_fetch_array($data1)) {
                                if($d1['Category'] == $d['Category']){
                                    echo ' <option value="' . $d1["Category"] . '" selected>' . $d1["Category"] . '</option>';
                                }
                                else{
                                    echo ' <option value="' . $d1["Category"] . '">' . $d1["Category"] . '</option>';
                                }
                                
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-item">
                        <input type="submit" class="submit" name="simpan" value="submit">
                    </div>
                </form>
            </div>
        </div>

    <?php
    }
    ?>

</body>

</html>