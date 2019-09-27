
//Sign-in authentication

function validate() {
    var username = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    
     
    if (username == null || username == "") {
        alert("Please enter the username.");
        return false;
    }
    if (password == null || password == "") {
        alert("Please enter the password.");
        return false;
    }
}