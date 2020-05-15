<?php
session_start();
?>
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
    <link href="subpages/style.css" type="text/css" media="screen" rel="stylesheet"/>
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

<!--for the NAV bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <?php
    //for IP Address load balancing AWS:
    $ip_server = $_SERVER['SERVER_ADDR'];
    // Include the right Nav-Bar depending if the user is logged in
    if (isset($_SESSION['login'])){
      include("subpages/navlog.inc.php");
    }
    else
    {
      include('subpages/nav.inc.php');
    }
  ?>

</nav>

<div class="jumbotron text-center">
    <h1 id="jumbotronHeaderH1">agenDo</h1>
    <p id="jumbotronHeaderP">management of your todos</p>

</div>

<!-- Container (About Section) -->
<div id="about" class="container-fluid">
    <h2 class="text-center">ABOUT agenDo</h2>
    <h4 class="text-center">the creators</h4>
    <br>
    <div class="rowSlideanim">
        <div class="col-sm-3">
            <span>
                <img src="src/ina.PNG" class="picture-small">
            </span>
            <h4>INA</h4>
            <p>Head of the Team<br>(because there's so much PHP in it)</p>
        </div>
        <div class="col-sm-3">
            <span >
                <img src="src/dani.PNG" class="picture-small">
            </span>
            <h4>DANI</h4>
            <p>Motivated reinforcement <br> she can do pull ups!</p>
        </div>
        <div class="col-sm-3">
            <span>
                <img src="src/roberto.PNG" class="picture-small">
            </span>
            <h4>ROBERTO</h4>
            <p>Allrounder <br> he solves your problems!</p>
        </div>
        <div class="col-sm-3">
            <span>
                <img src="src/faelb.PNG" class="picture-small">
            </span>
            <h4>FÄLB</h4>
            <p>Nice to have<br>(...depending on mood)</p>
        </div>
    </div>
</div>

<!-- Idea-->
<div id="idea" class="container-fluid bg-grey">
    <h2 class="text-center">IDEA</h2>
    <h4 class="text-center">agenDo helps you to organize you life. nie wieder waws vergessen. <?php echo $ip_server?></h4>
    <video width="60%" height="50%" controls>
        <source src="src/screenrecordAgenDo.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>


<!-- Container (Contact Section) -->
<div id="contact" class="container-fluid">
    <a class="weatherwidget-io" href="https://forecast7.com/en/48d2116d37/vienna/" data-label_1="VIENNA" data-label_2="WEATHER" data-icons="Climacons Animated" data-theme="original" data-basecolor="#026670" data-cloudfill="#026670" >VIENNA WEATHER</a>
    <script>
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
    </script>
    <h2 class="text-center">CONTACT</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>Contact us and we'll get back to you within 24 hours.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Vienna, Austria</p>
            <p><span class="glyphicon glyphicon-phone"></span> +43 660 8305721</p>
            <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8515.636601027103!2d16.378549642261326!3d48.1585398668368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476da9977c8a12a3%3A0xf3c966f81242b2ff!2sFH+Campus+Wien!5e0!3m2!1sde!2sat!4v1556028698119!5m2!1sde!2sat" width="90%" height="30%"  frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <div class="col-sm-7 slideanim">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" autocomplete="off" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" autocomplete="off" required>
                </div>
            </div>
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <a href="subpages/references.php">References</a><br>
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
    </a>
</footer>

<script>
    $(document).ready(function(){
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });

        $(window).scroll(function() {
            $(".slideanim").each(function(){
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>

</body>
</html>