<?php
session_start();

if(!isset($_SESSION["username"]) || $_SESSION["username"] == ""){
    header('Location: signup.php');
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Main - FellowMe</title>
    <!-- all links for css-->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <!-- all scripts for js and jQuery-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

    <script type="text/javascript">
      $(function() {
        $('.close').click(function() {
          $('.ad').css('display', 'none');
        })
      })
    </script>

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
            <li>
                <a href="overview.php">
                    <span><i class="fa fa-bar-chart" aria-hidden="true"></i></span>
                    <span>Überblick</span>
                </a>
            </li>
            <li>
                <a href="expense.php">

                    <span><i class="fa fa-minus-circle" aria-hidden="true"></i></span>
                    <span>Ausgaben</span>
                </a>
            </li>
            <li>
                <a href="income.php">
                    <span><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                    <span>Einkommen</span>
                </a>
            </li>
            <li>
                <a href="saving.php">
                    <span><i class="fa fa-money" aria-hidden="true"></i></span>
                    <span>Sparen</span>
                </a>
            </li>
            <li>
                <a href="/logout.php">
                    <span><i class="fa fa-sign-out" aria-hidden="true"></i></span>
                    <span>Log out</span>
                </a>
            </li>

        </ul>
    </nav>
</div>