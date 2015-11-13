window.onload = function () {

    // This function checks to see if First Name has been completed
    $('#firstName').blur (function () {
        var firstName = document.getElementById('firstName').value;
        $('#firstNameHint').html ("");
        if (!firstName) {
            $('#firstNameHint').addClass ("alert alert-danger");
            $('#firstNameHint').html ("  First name is required. You don't want us calling you blank, do you?");
            $('#firstNameHint').prepend ("<span class='glyphicon glyphicon-exclamation-sign'></span>");
        } else {
            $('#firstNameHint').removeClass ("alert alert-danger");
            
        }
        
        
        // Write First Name to local storage
        window.localStorage.setItem('firstName', firstName);
    })

    // This function checks to see if Last Name has been completed
    $('#lastName').blur (function () {
        var lastName = document.getElementById('lastName').value;
        $('#lastNameHint').html ("");
        if (!lastName) {
            $('#lastNameHint').addClass ("alert alert-danger");
            $('#lastNameHint').html ("  Last name is required. There are just too many people in this world with the same first name.");
            $('#lastNameHint').prepend ("<span class='glyphicon glyphicon-exclamation-sign'></span>");
        } else {
            $('#lastNameHint').removeClass ("alert alert-danger");
            
        }
    })
    
    // This function checks to see if Email has been completed and in the correct format
    $('#email').blur (function () {
        var email = document.getElementById('email').value;
        document.getElementById('emailHint').className = ""; // reset the emailHint class to not display - needed when user comes back to correct error
        document.getElementById('emailHint').innerHTML = ""; // removes text from alert area
        if (!email) {
            $('#emailHint').addClass ("alert alert-danger");
            $('#emailHint').html ("  Email is required");
            $('#emailHint').prepend ("<span class='glyphicon glyphicon-exclamation-sign'></span>");
        } else if (!validateEmail(email)) { // run the validateEmail function
            document.getElementById('emailHint').className = "alert alert-danger"; // add bootstrap alert
            document.getElementById('emailHint').innerHTML = " Invalid email format"; // text for bootstrap alert
            $('#emailHint').prepend ("<span class='glyphicon glyphicon-exclamation-sign'></span>"); // cute icon for bootstrap alert
        } else {
            $('#emailHint').removeClass ("alert alert-danger");
        }
    })
    
    // This function validates the email format
    function validateEmail(email) {
        var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i; // regex courtesy of http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
        return re.test(email);
    }
    
        
    // This function detects when the user leaves the password field and validates it meets minimum length requirement
    document.getElementById('password').addEventListener("blur", function () {
        var password = document.getElementById('password').value;// grab the password the user entered
        document.getElementById('passwordHint').className = ""; // reset the pwd1Hint class to default (display:none)
        document.getElementById('passwordHint').innerHTML = "";
        if (password.length < 8) { // check to see input matches minimum length requirement
            document.getElementById('passwordHint').className = "alert alert-danger"; // if input meets minimum length requirement, remove 'hint' class which sets display to none
            document.getElementById('passwordHint').innerHTML = "  Password must be at least 8 characters";
            $('#passwordHint').prepend ("<span class='glyphicon glyphicon-exclamation-sign'></span>");
        }
    })
    
    
    // This function detects when the user leaves the password confirmation field and validates it matches the initial password
    document.getElementById('confirmPassword').addEventListener("blur", function() {
        var password = document.getElementById('password').value;
        var confirmPassword = document.getElementById('confirmPassword').value;
        document.getElementById('confirmPasswordHint').className = "";
        document.getElementById('confirmPasswordHint').innerHTML = "";
        if (password != confirmPassword) {
            document.getElementById('confirmPasswordHint').className = "alert alert-danger";
            document.getElementById('confirmPasswordHint').innerHTML = "  Passwords do not match";
            $('#confirmPasswordHint').prepend ("<span class='glyphicon glyphicon-exclamation-sign'></span>");
        }
    })
    
    // This function unchecks all email alert options when no updates selected
    $('#noUpdate').change (function () {
        if (document.getElementById('noUpdate').checked == true) {
            document.getElementById('teamUpdate').checked = false;
            document.getElementById('leagueUpdate').checked = false;
        }
    })
    
    // This function unchecks noUpdate checkbox when teamUpdate selected
    $('#teamUpdate').change (function () {
        if (document.getElementById('teamUpdate').checked == true) {
            document.getElementById('noUpdate').checked = false;
        }
    })
    
    // This function unchecks noUpdate checkbox when leagueUpdate selected
    $('#leagueUpdate').change (function () {
        if (document.getElementById('leagueUpdate').checked == true) {
            document.getElementById('noUpdate').checked = false;
        }
    })
    
    
    // This function detects when the user clicks to add another league and adds another input field as well as add and delete options for every line
    $('#addLeague').click (function() {
        $("#addLeague" ).remove();// remove addLeague button
        $("<span style = 'color:red; cursor: pointer; padding-left:1em'><span class='glyphicon glyphicon-minus-sign' aria-hidden='true'></span> League</span>").insertAfter('#leagueName'); // add remove league option
        $("<br /><br /><div class='form-group' id='leagues1'>").insertAfter('#leagues'); // create new div
        $('#leagues1').append("<label for='leagues1' class='sr-only' id = 'leaguesLabel1'>League Name </label>"); // add label to new div
        $("<input type='text' class='form-control' id='leagueName1' placeholder='League Name'>").insertAfter('#leaguesLabel1'); // add text input box after new label
        $("<span style = 'color:green; cursor: pointer; padding-left:1em'><span class='glyphicon glyphicon-plus-sign' aria-hidden='true'></span> League</span>").insertAfter('#leagueName1'); // add a new addLeague option
    })
    
}
