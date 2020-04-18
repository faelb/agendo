/**
 * Write a Function that checks all Input-Variables:
 * -> fügt inputvariablen zu array hinzu
 *  -> Algoritghmus geht jede array varriable durch und checkt ob leerzeichen enthalten sind & ob input < 3
 */
//Validates Form values
function validateForm() {
    var firstname = document.forms["userForm"]["firstname"].value;
    var lastname = document.forms["userForm"]["lastname"].value;
    var email = document.forms["userForm"]["email"].value;
    var password = document.forms["userForm"]["password"].value;

    var inputArray = [firstname, lastname, email, password];
    //checks if value consists only of whitespaces & length < 3
    for (var i = 0; i < inputArray.length; i++) {
        //vorname = vorname.replace(/\s/g, "");
        if ((inputArray[i].replace(/\s/g, "").length) == 0){
            alert("Error: only Whitespaces in inputfield!");
            event.preventDefault();
            return false;
        }

        if ((inputArray[i].replace(/\s/g, "").length) < 3) {
            alert("Error: Input too short: " + inputArray[i] + "\nEnter at least 3 characters!");
            event.preventDefault();
            return false;
        }
        //inputArray.forEach(function(element))
    }
    return;
}
