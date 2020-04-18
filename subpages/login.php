<!DOCTYPE html>
<html lang="en">
<head>

    <title>agenDo - for you</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"> <!-- Schriftarten-->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"> <!-- für Überschrift von Login/Signup-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- für responsive version-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> <!-- für responsive version-->
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
    if (isset($_SESSION['login'])){
        include("navlog.inc.php");
    }
    else
    {
        include('nav.inc.php');
    }
    ?>
    <style>
        .navLogin {
            background: #fce181 !important;
        }
    </style>
</nav>



<div id="login" class="container-fluid text-center bg-grey">
<section>
    <h2>Login</h2>
    <div class="login-page">
        <div class="form">
            <form class="login-form" action="validate.inc.php" method="post" autocomplete="off">
                <input type="email" name="email" placeholder="e-mail" autofocus/>
                <input type="password" name="password" placeholder="password"/>
                <input class="buttsub" type="submit" value="login"/>
                <p class="message">Not registered? <a href="signup.php">Create an account</a></p>
            </form>
        </div>
    </div>
</section>
</div>
<footer class="container-fluid text-center">
    <a href="references.php">References</a><br>
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
</footer>

</body>