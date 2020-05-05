<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="style.css" type="text/css" media="screen" rel="stylesheet"/>

</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="..\index.html#myPage">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="..\index.html#about">ABOUT</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="signup.php">SIGN UP</a></li>
                <li><a href="..\index.html#contact">CONTACT</a></li>
            </ul>
        </div>
    </div>
</nav>
<section>
    <h1>Login</h1>


    <?php
    session_start();
    //Use htmlspecialchars in order to prevent XSS Attacks!!!
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $userpassword = sha1($_POST['password']);//mit sha1 auch schon encrypted

    // Create connection
    $pdo = new PDO("mysql:host=10.0.3.18;dbname=userdatabase;port=3306", "root", "");


    $sql = $pdo->prepare("INSERT INTO users (firstname, lastname, email, password) VALUES (:firstname,:lastname,:email,:password)");

    if ($sql->execute(array(":firstname" => $firstname, ":lastname" => $lastname, ":email" => $email, ":password" => $userpassword)) === TRUE) {
        $_SESSION['login'] = $email;
        $_SESSION['firstname'] = $firstname;

        header("Location: loggedin.php");
    } else {
        echo "Error";
        header("Location: signup.php");
    }

    ?>
</section>
</body>
</html>