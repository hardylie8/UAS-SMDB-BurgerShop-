<?php
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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

        .container {
            margin: 3% 5% 0 5%;
            display: flex;
            align-items: flex-start;
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

        .box-2 {
            display: none;
        }
        .log{
            text-align: center;
        }
        @media(min-width:1001px) {
            ul.topnav {
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }

            .box-1 {
                flex-basis: 55%;
            }

            body {
                overflow: hidden;
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

            .box-2 {
                display: initial;
                flex-basis: 45%;
            }
        }

        .box-1,
        .box-2 {
            margin-top: 30px;
        }

        /* .box-1,.box-2{
            border:solid 2px white;
        } */
        .img {
            margin-left: 20px;
            height: 30vw;
        }

        .high {
            margin-top: 30px;
            font-size: 4vw;
            font-family: 'Abril Fatface', cursive;
        }

        .description {
            margin-top: 30px;
            font-family: 'Capriola', sans-serif;
            font-size: 20px;

        }

        .order {
            font-size: 20px;
            color: #fdFcfa;
            background-color: #f34747;
            border: none;
            height: 50px;
            width: 200px;
            border-radius: 40px;
        }

        .btn-group {
            margin-top: 50px;
        }

        .icon {
            margin: 0;
            position: absolute;
            left: 1%;
            bottom: 2%;
        }

        .icon ul {
            padding: 0;
            list-style-type: none;
        }

        .icon .fa {
            text-align: center;
            border-radius: 50%;
            background-color: #fdFcfa;
        }

        .icon .fa {
            padding: 5px;
            font-size: 20px;
            width: 20px;
        }
        .order:hover{
            cursor: pointer;
        }
        .icon li a {
            margin-top: 13px;
            color: #242833;
            text-decoration: none;
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
    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Text&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Capriola&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <ul class="topnav">
        <li><a class="left" href="home.php">Home </a></li>
        <li><a class="left" href="menu.php">menu</a></li>
        <li><a class="left" href="#contact">Contact</a></li>
        <?php 
            if(isset($_SESSION['status']) && $_SESSION['status'] == "Admin"){
                echo ' <li><a class="left" href="order.php">order</a></li>';
            }
        ?>
        <li class="right" id="cart"><a href="cart.php"><img class="cart" src="img/cart.png" alt=""> Cart</a></li>
        <?php
        if(isset($_SESSION['username'])){
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
        if(!isset($_SESSION['username'])){
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

    <div class="container">
        <div class="box-1">

            <h2 class="high">The Dark Beef Burger</h2>

            <p class="description">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero minima deleniti assumenda necessitatibus cumque maiores tenetur molestias odit maxime laudantium numquam, ad laborum, molestiae amet accusantium sint inventore sit sequi?</p>

            <div class="btn-group">
                <a href="menu.php">
                    <button class="order">
                        Order Now
                    </button>
                </a>
                
            </div>
        </div>
        <div class="box-2">
            <img class="img" src="img/black.png" alt="">
        </div>
    </div>
    <div class="icon">
        <ul>

            <li>
                <a href="#" class="fa fa-facebook"></a>
            </li>
            <li>
                <a href="#" class="fa fa-twitter"></a>
            </li>
            <li>
                <a href="#" class="fa fa-instagram"></a>
            </li>
        </ul>
    </div>
</body>

</html>