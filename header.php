<?php
session_start();
//if the user is not logged in, it leads to signup page(signup.php)
if(!isset($_SESSION["username"]) || $_SESSION["username"] == ""){
    header('Location: signup.php');
}

$selectedNav = 1;
if(isset($_GET['nav'])){
    $selectedNav = $_GET['nav'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FellowMe</title>
    <!-- all links for css-->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <!-- all scripts for js and jQuery-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</head>
<body>
<div class="header">
    <div class="logo">
        <i class="material-icons">rowing</i>
        <span>FellowMe</span>
    </div>
    <a href="#" class="nav-trigger"><span></span></a>
</div>
<div class="side-nav">
    <div class="logo">
        <i class="material-icons">rowing</i>
        <span>FellowMe</span>
    </div>
    <nav>
        <ul>
           <li <?php if( $selectedNav == 1){echo 'class="side-nav-active"';}?>>
                <a href="index.php?nav=1">
                    
                    <span><i class="material-icons">home</i></span>
                    <span>Home</span>
                    
                </a>
            </li>
            <li <?php if( $selectedNav == 2){echo 'class="side-nav-active"';}?>>
                <a href="setting.php?nav=2">
                    <span><i class="material-icons">settings</i></span>
                    <span>Setting</span>
                </a>
            </li>
            <li <?php if( $selectedNav == 3){echo 'class="side-nav-active"';}?> >
                <a href="overview.php?nav=3">
                    <span><i class="material-icons">insert_chart</i></span>
                    <span>Überblick</span>
                </a>
            </li>
            
            
            <li>
                <a href="logout.php">
                    <span><i class="material-icons">exit_to_app</i></span>
                    <span>Log out</span>
                </a>
            </li>

        </ul>
    </nav>
</div>
