<!DOCTYPE html>
<html lang="en">
<head>

    <title>agenDo - for you</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <!-- Schriftarten-->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <!-- für Überschrift von Login/Signup-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- für responsive version-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- für responsive version-->
    <link href="style.css" type="text/css" media="screen" rel="stylesheet"/>

    <!-- for background-color of active link-->
    <script>
        $('.message a').click(function () {
            $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
        });
    </script>


</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<!--nav-bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <?php
    // Include the right Nav-Bar depending if the user is logged in
    if (isset($_SESSION['login'])) {
        include("navlog.inc.php");
    } else {
        include('nav.inc.php');
    }
    ?>
    <style>
        .navLogin {
            background: #fce181 !important;
        }
    </style>
</nav>
<br><br>
<aside>
    <h1>References</h1>
    <ul>
        <li><a href="https://www.w3schools.com/">https://www.w3schools.com/</a> </li>
        <li><a href="https://stackoverflow.com/">https://stackoverflow.com/</a> </li>
        <li><a href="https://weatherwidget.io/">https://weatherwidget.io/</a> </li>
        <li><a href="https://colorlib.com/wp/free-bootstrap-registration-forms/">https://colorlib.com/wp/free-bootstrap-registration-forms/</a> </li>
    </ul>
</aside>
<footer class="container-fluid text-center">
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
</footer>

</body>