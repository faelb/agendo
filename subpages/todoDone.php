<?php
session_start();
$pdo = new PDO("mysql:host=10.0.3.18;dbname=userdatabase;port=3306", "root", "root_password");
$user_name = $_SESSION['firstname'];
$user_mail = $_SESSION['login'];
$get_id_sql = "SELECT id FROM users WHERE email='" . $user_mail . "'";
$user_id = $pdo->query($get_id_sql)->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Theme Made By www.w3schools.com -->
    <title>agenDo - for you</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css"> <!-- Schriftarten-->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css"> <!--  für Überschrift von Login/Signup-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- für responsive version-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> <!-- für responsive version-->
    <link href="style.css" type="text/css" media="screen" rel="stylesheet"/>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script> <!--things we need for to do things-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script><!--things we need for to do things-->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" onload="getTodo('private'); getTodo('work'); getTodo('home');">

<script>
       function getTodo(type) {
        let usermail = "<?php echo $user_mail ?>";
        let con = new XMLHttpRequest();         //Create Object (verbindungsaufbau)

        con.onreadystatechange = function () {    //define Callback function
            if (con.readyState == 4 && con.status == 200) { //4 -> server ist fertig

                let data = JSON.parse(this.responseText);

                for(i = 0; i < data.length; i++){
                    addElement(data[i], type)
                }
            }
        };
        //open the connection
        con.open("GET", "getEntryDone.php?type=" + type + "&email=" + usermail, true);
        con.send(); //Request File Content
    }

    function addElement(dataElement, type) {
        var work = "work";
        var home = "home";
        var private = "private";
        var li = document.createElement("li");
        var tNode = document.createTextNode(dataElement);
        li.className = "toDoLI";
        li.appendChild(tNode);

        document.getElementById("toDoAll").appendChild(li);

        if (type === private) {
            var liPrivate = document.createElement("li");
            var tPrivate = document.createTextNode(dataElement);
            liPrivate.className = "toDoLI";
            liPrivate.appendChild(tPrivate);
            document.getElementById("toDoPrivate").appendChild(liPrivate);
        } else if (type === work) {
            var liWork = document.createElement("li");
            var tWork = document.createTextNode(dataElement);
            liWork.className = "toDoLI";
            liWork.appendChild(tWork);
            document.getElementById("toDoWork").appendChild(liWork);


        } else if (type === home) {
            var liHome = document.createElement("li");
            var tHome = document.createTextNode(dataElement);
            liHome.className = "toDoLI";
            liHome.appendChild(tHome);
            document.getElementById("toDoHome").appendChild(liHome);
        }
    }

    document.getElementById("myInput").value = "";


    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            var div = this.parentElement;
            div.style.display = "none";
        }
    }


</script>

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
</nav>
<section>
    <br>
    <?php echo "<h1>Look what you have accomplished, ".$user_name."!</h1>"?>
    <br>
    <article class="todoarticle">
        <button class="tablink" onclick="openPage('PrivateDone', this, '#98C29B')" >Done @ Private</button>
        <button class="tablink" onclick="openPage('WorkDone', this, '#AFCDB1')">Done @ Work</button>
        <button class="tablink" onclick="openPage('HomeDone', this, '#C1DCCE')">Done @ Home</button>
        <button class="tablink" onclick="openPage('AllDone', this, '#A0C0B0')" id="defaultOpen">Everything Done</button>

        <div id="AllDone" class="tabcontent">
            <ul id="toDoAll">
            </ul>
        </div>

        <div id="PrivateDone" class="tabcontent">
            <ul id="toDoPrivate">

            </ul>
        </div>

        <div id="WorkDone" class="tabcontent">
            <ul id="toDoWork">

            </ul>
        </div>

        <div id="HomeDone" class="tabcontent">
            <ul id="toDoHome">

            </ul>
        </div>

    </article>
</section>

<!--for the todo list -->


<div id="gotoOpen">
    <button class="openbtn" onclick="location.href='loggedin.php'">&#11013;</button>
</div>

<!-- for tabs-->
<script>
    function openPage(pageName, elmnt, color) {
        // Hide all elements with class="tabcontent" by default */
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Remove the background color of all tablinks/buttons
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }

        // Show the specific tab content
        document.getElementById(pageName).style.display = "block";

        // Add the specific color to the button used to open the tab content
        elmnt.style.backgroundColor = color;
    }
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
</script>

</body>
</html>