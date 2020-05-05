<?php
session_start();


$user_mail = $_SESSION['login'];
$user_name = $_SESSION['firstname'];
$pdo = new PDO("mysql:host=10.0.3.18;dbname=userdatabase;port=3306", "root", "");
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
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <!--  für Überschrift von Login/Signup-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- für responsive version-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- für responsive version-->
  <link href="style.css" type="text/css" media="screen" rel="stylesheet"/>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <!--things we need for to do things-->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!--things we need for to do things-->
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60" onload="getTodo('work'); getTodo('home'); getTodo('private')">

<nav class="navbar navbar-default navbar-fixed-top">
    <?php
    // Include the right Nav-Bar depending if the user is logged in
    if (isset($_SESSION['login'])) {
        include("navlog.inc.php");
    } else {
        include('nav.inc.php');
    }
    ?>
</nav>
<section>
    <br>
    <?php echo "<h1>Hello, ".$user_name."!</h1>"?>
    <br>
    <article class="todoarticle">
        <button class="tablink" onclick="openPage('Private', this, '#8cb7bb')" id="defaultOpen">Private</button>
        <button class="tablink" onclick="openPage('Work', this, '#b6cfd3')">Work</button>
        <button class="tablink" onclick="openPage('Home', this, '#c3d3d3')">Home</button>
        <button class="tablink" onclick="openPage('All', this, '#95adb2')" >All</button>

    <div id="All" class="tabcontent">
      <ul id="toDoAll">
      </ul>
    </div>

    <div id="Private" class="tabcontent" onclick="markAsDone('private');">
      <ul id="toDoPrivate">
      </ul>

    </div>

    <div id="Work" class="tabcontent" onclick="markAsDone('work');">
      <ul id="toDoWork">
      </ul>
    </div>

    <div id="Home" class="tabcontent" onclick="markAsDone('home');">
      <ul id="toDoHome">
      </ul>
    </div>

  </article>
</section>

<!--for the todo list -->
<script>
    // Click on a close button to hide the current list item
    var close = document.getElementsByClassName("close");
    var i;
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            console.log("Elem to close: "); //TODO ------------------
            var div = this.parentElement;
            div.style.display = "none";
        }
    }

    // Add a "checked" symbol when clicking on a list item
     var listH = document.querySelector('#toDoHome');
    listH.addEventListener('click', function (ev) {
        if (ev.target.tagName === 'LI') {
            ev.target.classList.toggle('checked');
        }
    }, false);

    var listP = document.querySelector('#toDoPrivate');
    listP.addEventListener('click', function (ev) {
        if (ev.target.tagName === 'LI') {
            ev.target.classList.toggle('checked');
        }
    }, false);

    var listW = document.querySelector('#toDoWork');
    listW.addEventListener('click', function (ev) {
        if (ev.target.tagName === 'LI') {
            ev.target.classList.toggle('checked');
        }
    }, false);


    // Create a new list item when clicking on the "Add" button
    function newElement() {
        var li = document.createElement("li");
        var inputValue = document.getElementById("myInput").value;
        var t = document.createTextNode(inputValue);
        li.className = "toDoLI";
        li.appendChild(t);

        if (inputValue === '') {
            alert("You must write something!");
        } else {
            document.getElementById("toDoAll").appendChild(li); //TODO

            if (document.getElementById("box-private").checked) {
                var liPrivate = document.createElement("li");
                var inputValuePrivate = document.getElementById("myInput").value;
                var tPrivate = document.createTextNode(inputValuePrivate);
                liPrivate.className = "toDoLI";
                liPrivate.appendChild(tPrivate);
                document.getElementById("toDoPrivate").appendChild(liPrivate);
            } else if (document.getElementById("box-work").checked) {
                var liWork = document.createElement("li");
                var inputValueWork = document.getElementById("myInput").value;
                var tWork = document.createTextNode(inputValueWork);
                liWork.className = "toDoLI";
                liWork.appendChild(tWork);
                document.getElementById("toDoWork").appendChild(liWork);


            } else if (document.getElementById("box-home").checked) {
                var liHome = document.createElement("li");
                var inputValueHome = document.getElementById("myInput").value;
                var tHome = document.createTextNode(inputValueHome);
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
    }
</script>


<script>
    function createTodo() {
        var li = document.createElement("li");
        var inputValue = document.getElementById("myInput").value;
        var usermail = "<?php echo $user_mail ?>";
        //TODO hier noch if statements für Type (Work, Private, Home) um das auch als Get zu übergeben
        //TODO the following is from faelb for getting those; wir müssen versuchen diese als zweites Get weiterzuleiten
        if (document.getElementById("box-private").checked) {
            var type = "private";
        }
        if (document.getElementById("box-work").checked) {
            var type = "work";
        }
        if (document.getElementById("box-home").checked) {
            var type = "home";
        }

        let con = new XMLHttpRequest();         //Create Object (verbindungsaufbau)
        con.open("GET", "setEntry.php?inputVal=" + inputValue + "&type=" + type + "&email=" + usermail, true); //open the connection
        con.onreadystatechange = function () {    //define Callback function
            if (con.readyState === 4 && con.status === 200) { //4 -> server ist fertig
            }
        };
        con.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); //Set appropriate request Header
        con.send(); //Request File Content
    }

</script>
<script>
    function markAsDone(category) {
        let type;
        if (category === "private"){
            type = "toDoPrivate"
        }

        else if (category === "work"){
            type = "toDoWork"
        }

        else{ //category === "home"
            type = "toDoHome"
        }

       var ul = document.getElementById(type);
       var liToRemove = ul.getElementsByClassName("checked");
       console.log(category);

        data = "";
        for(i = 0; i < liToRemove[0].innerHTML.length ; i++){ //28 is länge des span gaxis - LOL xD
            data += "" + liToRemove[0].innerHTML[i];
        }
        console.log(data);
        ul.removeChild(liToRemove[0]);

        let usermail = "<?php echo $user_mail ?>";
        let con = new XMLHttpRequest();         //Create Object (verbindungsaufbau)

        con.onreadystatechange = function () {    //define Callback function
            if (con.readyState == 4 && con.status == 200) { //4 -> server ist fertig

            }
        };
        con.open("GET", "updateDB.php?email=" + usermail + "&data=" + data + "&type=" + type, true);
        con.send();



    }

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
        con.open("GET", "getEntry.php?type=" + type + "&email=" + usermail, true);
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


<!-- the sidebar-->
<div id="newTask" class="sidebar">


  <br>
  <p>
  <div id="createToDo" class="form">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">x</a>
    <br>
    <h2>Add a new Todo!</h2>
    <input type="text" id="myInput" placeholder="Watcha gotta do?"/>
    <br>

        <div class="row">
            <div class="boxes">
                <input type="checkbox" id="box-private" class="pretend-radio" checked/>
                <label for="box-private">Private</label>

        <input type="checkbox" id="box-work" class="pretend-radio">
        <label for="box-work">Work</label>

        <input type="checkbox" id="box-home" class="pretend-radio">
        <label for="box-home">Home</label>
      </div>
    </div>

    <button type="submit" id="addButton" onclick="createTodo();newElement(); closeNav()" class="addBtn">Add</button>
        <script type="text/javascript">
            var input = document.getElementById("myInput");
            // Execute a function when the user releases a key on the keyboard
            input.addEventListener("keyup", function(event) {
                // Number 13 is the "Enter" key on the keyboard
                if (event.keyCode === 13) {
                    // Cancel the default action, if needed
                    event.preventDefault();
                    // Trigger the button element with a click
                    document.getElementById("addButton").click();
                }
            });
        </script>
  </div>
</div>
<div id="openSidebar">
  <button class="openbtn" onclick="openNav()" onmouseup="document.getElementById('myInput').select();"> &#43;</button>
</div>
<div id="gotoDone">
  <button class="openbtn" onclick="location.href='todoDone.php'">&#10003;</button>
</div>
<script>
    /* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
    function openNav() {
        document.getElementById("newTask").style.width = "50vh";
        document.getElementById("main").style.marginRight = "50vh";
    }

    /* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
    function closeNav() {
        document.getElementById("newTask").style.width = "0";
        document.getElementById("main").style.marginRight = "0";
    }

    function CheckBoxToRadio(selectorOfCheckBox, isUncheckable) {
        $(selectorOfCheckBox).each(function () {
            $(this).change(function () {
                var isCheckedThis = $(this).prop('checked');
                $(selectorOfCheckBox).prop('checked', false);

                if (isCheckedThis === true || isUncheckable === true) {
                    $(this).prop('checked', true);
                }
            });
        });
    }

    CheckBoxToRadio(".boxes .pretend-radio", true);

</script>


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