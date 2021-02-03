<?php
include_once("koneksi.php");
session_start();
if (isset($_GET['action']) && $_GET['action'] == "add") {
    $id = $_GET['id'];

    if (isset($_SESSION['cart'][$id])) {

        $_SESSION['cart'][$id]['jlh']++;
    } else {

        $sql_s = "SELECT * FROM menu 
                WHERE IdMenu={$id}";
        $query_s = mysqli_query($koneksi, $sql_s);
        if (mysqli_num_rows($query_s) != 0) {
            $row_s = mysqli_fetch_array($query_s);

            $_SESSION['cart'][$row_s['IdMenu']] = array(
                "jlh" => 1,
                "harga" => $row_s['Harga']
            );
        } else {

            $message = "This product id it's invalid!";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            background-color: #242833;
            color: #fdFcfa;
            height: 100vh;
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

            #cart {

                order: 2;
            }

            .left {
                margin-right: 70px;
            }

            .right {
                margin-left: 25px;
            }
        }

        .container {
            margin: 2% 5%;
            display: flex;
            align-items: flex-start;
            background: #242833;
        }

        .box-1 {
            margin-right: 10px;
            flex-basis: 20%;
            padding: 0;
            border-radius: 15px;
            background: linear-gradient(225deg, #20242e, #272b37);
            box-shadow: -20px 20px 60px #1f222b,
                20px -20px 60px #292e3b;

        }

        .box-2 {
            display: flex;
            flex-basis: 80%;
            padding: 10px 0 10px 30px;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .box-2::after {
            content: '';
            flex: auto;
        }

        .active1 {
            background: #616872;
        }

        .box-1 li:first-child {
            margin-top: 0;
        }

        .box-1 li:last-child {
            margin-bottom: 0;
        }

        .box-1 li {
            font-size: 20px;
            margin: 20px auto;
            padding: 10px;
            border-radius: 15px;
            padding-left: 30px;
        }

        .box-1 li:hover {
            background: #343b4c;
            cursor: pointer;
        }

        .box-1 ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }


        .card {
            height: 320px;
            padding-bottom: 20px;
            flex-basis: 200px;
            background: #242833;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.25) 0px 14px 28px, rgba(0, 0, 0, 0.22) 0px 10px 10px;
            transition: 0.4s ease-out;
            margin-bottom: 30px;
            text-align: center;
            box-sizing: border-box;
            margin-right: 18px;
        }



        .img {
            margin-top: 20px;
            height: 40%;
        }

        .name {
            margin-top: 15px;
            font-size: 20px;
            font-weight: 400;
        }

        .price {
            margin-top: 25px;
            font-size: 30px;
            font-weight: 600;
            color: #80b534;
        }

        #content.active {
            -webkit-filter: blur(20px);
            -moz-filter: blur(20px);
            -ms-filter: blur(20px);
            -o-filter: blur(20px);
            filter: blur(20px);
        }

        .box {
            position: fixed;
            top: 55%;
            left: 50%;
            border-radius: 15px;
            transform: translate(-50%, -50%);
            width: 30%;
            padding: 30px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, .30);
            background: #343b4c;
            color: #fdfcfa;
            visibility: hidden;
            opacity: 0;
            text-align: center;
            transition: 0.5s;
        }

        .box img {

            margin: 20px auto;
            width: 60%;
        }

        #popup.active {
            visibility: visible;
            opacity: 1;
            transition: 0.5s;
        }

        #btnclose {
            position: absolute;
            top: 15px;
            right: 15px;
            width: 32px;
            height: 32px;
            font-size: 20px;
            text-align: center;
            border-radius: 50%;
            background: transparent;
            border: 2px solid #fdfcfa;
            color: #fdfcfa;
        }



        .box h3 {
            text-align: center;
            font-size: 30px;
            margin: 0px 0 5px 0;
        }

        .box h4 {
            text-align: center;
            font-size: 25px;
            color: #ffca40;
            margin: 10px 0 10px 0;
        }

        #jlh {
            width: 40px;
        }

        .form-menu label {
            font-size: 20px;
        }

        .btn {
            width: 30px;
            height: 30px;
            font-size: 30px;
            text-align: center;
            padding: 0 5px 5px;
            border: none;
            border-radius: 10px;
            color: black;

        }

        .btn:hover,
        #btnclose:hover {
            cursor: pointer;
        }

        .form {
            margin-top: 40px;
            align-items: flex-start;
            display: flex;
        }

        .form label {
            margin-left: 10px;
            text-align: left;
            flex-basis: 40%;
            font-size: 20px;
        }

        .form input,
        .form select,
        .form textarea {
            color: #fdfcFa;
        }

        .form select option {
            background-color: #616872;
            border: none;
        }

        .form input[type="text"],
        .form textarea,
        .form select {
            text-align: center;
            border: 2px solid #fdfcFa;
            max-width: 60%;
            border-radius: 15px;
            margin-left: 5px;
            background-color: transparent;
            font-size: 20px;
            flex-basis: 60%;
        }

        .form select {
            padding-left: 5px;
            margin-top: 10px;
        }

        .form textarea {
            padding: 5px;
            text-align: left;
        }

        .form input[type="checkbox"] {
            height: 20px;
            flex-basis: 40%;
            background-color: #f8f8f7;
        }

        .submit {
            font-size: 20px;
            color: #fdFcfa;
            background-color: #f34747;
            border: none;
            height: 40px;

            width: 80%;
            margin-top: 20px;
            border-radius: 15px;
        }

        .min {
            background-color: #f8f8f7;
        }

        .pos {
            background-color: #ffca40;
        }

        .activate {
            display: block;
        }

        .hideCard {
            display: none;
        }

        .add {
            width: 40%;
        }

        .add:hover,
        .submit:hover {
            cursor: pointer;
            background-color: #fdFcfa;
            border: 2px solid #fdFcfa;
            color: #f34747;
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

        .log {
            order: 3;
        }

        .dropdown:hover .dropbtn {
            background-color: #616872;
        }

        .edit,
        .delete {
            padding: 5px;
            width: 40px;
        }

        .edit {
            margin-right: 20px;
        }

        .delete {
            margin-left: 20px;
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
        <li class="right" id="search">
            <div class="search">
                <form action="/action_page.php">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </li>

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
    </ul>
    <div class="container" id="content">
        <div class="box-1">
            <ul>
                <li onclick="AllMenu()" id="AllMenu" class="active1">All menu</li>
                <?php
                include_once 'koneksi.php';
                $i = 0;
                $data = mysqli_query($koneksi, "SELECT DISTINCT Category from menu");
                while ($d = mysqli_fetch_array($data)) {
                    $c = $d['Category'];
                    echo ('<li  id=' . $c . ' onclick="showData(this.id)"> ' . $d["Category"] . '</li>');
                    $i++;
                }
                if (isset($_SESSION['status']) && $_SESSION['status'] == "Admin") {
                    echo '<li onclick="show()">
                    Add New Menu
                </li>';
                }
                ?>
            </ul>

        </div>



        <div class="box-2" id="contentMenu">
            <?php
            include_once 'koneksi.php';
            $data = mysqli_query($koneksi, "select * from menu order by rand()");
            while ($d = mysqli_fetch_array($data)) {
                echo ('<div class="card" id="' . $d['IdMenu'] . '" ">
                <img class="img" src="' . $d["Gambar"] . '" alt="">
                <br>
                <div class="name">' . $d["NamaMenu"] . '</div>
                <div class="price">Rp. ' . $d["Harga"] . ' k</div>');
                if (isset($_SESSION['status']) && $_SESSION['status'] == "Admin") {
                    echo '<a href="edit.php?id=' . $d['IdMenu'] . '"><button  class="submit edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>';
                    echo '<a href="hapus.php?id=' . $d['IdMenu'] . '"><button  class="submit delete"><i class="fa fa-trash" aria-hidden="true"></i></button></a>';
                }
                if (isset($_SESSION['status']) && $_SESSION['status'] == "User") {
                    echo '<a href="menu.php?action=add&id=' . $d['IdMenu'] . '"><button type="submit" class="submit">add to cart</button></a>';
                }
                echo '</div>';
            }
            ?>
        </div>



        <?php
        include_once 'koneksi.php';
        $data = mysqli_query($koneksi, "SELECT DISTINCT Category from menu");
        while ($d = mysqli_fetch_array($data)) {
            $c = $d['Category'];
            echo '<div class="box-2 hideCard" id="box' . $c . '">';
            $data1 = mysqli_query($koneksi, "select * from menu where Category = '" . $c . "'");
            while ($da = mysqli_fetch_array($data1)) {
                echo ('
                
                    <div class="card" id="' . $da['IdMenu'] . '" ">
                        <img class="img" src="' . $da["Gambar"] . '" alt="">
                        <br>
                        <div class="name">' . $da["NamaMenu"] . '</div>
                        <div class="price">Rp. ' . $da["Harga"] . ' k</div>');
                if (isset($_SESSION['status']) && $_SESSION['status'] == "Admin") {
                    echo '<a href="edit.php?id=' . $da['IdMenu'] . '"><button  class="submit edit"><i class="fa fa-pencil" aria-hidden="true"></i></button></a>';
                    echo '<a href="hapus.php?id=' . $da['IdMenu'] . '"><button  class="submit delete"><i class="fa fa-trash" aria-hidden="true"></i></button></a>';
                }
                if (isset($_SESSION['status']) && $_SESSION['status'] == "User") {
                    echo '<a href="menu.php?action=add&id=' . $da['IdMenu'] . '"><button type="submit" class="submit">add to cart</button></a>';
                }
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>

    <Script>
        function hideAll() {
            document.getElementById("contentMenu").classList.add("hideCard");
            document.getElementById("boxDessert").classList.add("hideCard");
            document.getElementById("boxSide-Dish").classList.add("hideCard");
            document.getElementById("boxDrinks").classList.add("hideCard");
            document.getElementById("boxBurger").classList.add("hideCard");

            document.getElementById("AllMenu").classList.remove("active1");
            document.getElementById("Dessert").classList.remove("active1");
            document.getElementById("Side-Dish").classList.remove("active1");
            document.getElementById("Drinks").classList.remove("active1");
            document.getElementById("Burger").classList.remove("active1");
        }

        function AllMenu() {
            hideAll();
            document.getElementById("AllMenu").classList.add("active1");
            document.getElementById("contentMenu").classList.remove("hideCard");

        }

        function showData(x) {
            y = "box";
            var temp = y.concat(x);
            hideAll();
            document.getElementById(x).classList.add("active1");
            document.getElementById(temp).classList.remove("hideCard");

        }
    </Script>

    <div class="box" id="popup">
        <h3>New Menu</h3>
        <form class="form-menu" method="POST" action="AddMenu.php">
            <div class="form">
                <label for="">Nama Menu</label>
                <input type="text" name="nama" id="" required="">
            </div>
            <dix class="form">
                <label for="">harga</label>
                <input type="text" name="harga" required="">
            </dix>
            <dix class="form">
                <label for="">gambar</label>
                <textarea name="gambar" id="" cols="30" rows="5"></textarea>
            </dix>
            <dix class="form">
                <label for="">category</label>
                <select id="cars" name="category">
                    <?php
                    include_once 'koneksi.php';
                    $data = mysqli_query($koneksi, "SELECT DISTINCT Category from menu");
                    while ($d = mysqli_fetch_array($data)) {
                        echo ' <option value="' . $d["Category"] . '">' . $d["Category"] . '</option>';
                    }
                    ?>
                </select>
            </dix>
            <br>
            <input name="AddMenu" type="submit" class="submit add" value="Add Menu">
        </form>
        <button id="btnclose" onclick="hide()"><i class="fa fa-times"></i></button>
    </div>
    <script>
        function show() {

            document.getElementById("content").classList.add("active");
            document.getElementById("popup").classList.add("active");
        }

        function hide() {
            document.getElementById("content").classList.remove("active");
            document.getElementById("popup").classList.remove("active");
        }
    </script>
    <!-- <script>
        jQuery(function() {
            var j = jQuery; //Just a variable for using jQuery without conflicts
            var addInput = '#qty'; //This is the id of the input you are changing
            var n = 1; //n is equal to 1

            //Set default value to n (n = 1)
            j(addInput).val(n);

            //On click add 1 to n
            j('.pos').on('click', function() {
                j(addInput).val(++n);
            })

            j('.min').on('click', function() {
                //If n is bigger or equal to 1 subtract 1 from n
                if (n >= 1) {
                    j(addInput).val(--n);
                } else {
                    //Otherwise do nothing
                }
            });
        });
    </script> -->
    <!-- <div class="box" id="popup">
        <img src="img/black.png" alt="">
        <h3>The dark Beef Burger</h3>
        <h4>Rp 45k</h4>

        <form class="form-menu" action="">
            <div class="form">
                <label for="">Extra Cheese</label>
                <input type="checkbox" name="" id="">
            </div>
            <dix class="form">
               
                <label for="">Quantity</label>
                <div class="min btn">
                    -
                </div>

                <input type="text" value="0" name="" id="qty">
                <div class="pos btn">
                    +
                </div>

            </dix>

            <br>
            <input type="submit" class="submit" value="add to cart">
        </form>
        <button id="btnclose" onclick="hide()"><i class="fa fa-times"></i></button>
    </div> -->
</body>

</html>