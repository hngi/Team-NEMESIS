
//Sign-in authentication

function get() {
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
    
    for(i = 0; i < user.length;i++)
    { if(username == user[i].username && password == user[i].password) {
        alert('Login successful : Welcome' + ' ' + username)
       return;
    } 
    }

    for(n = 0; n < user.length;n++)
    {if (username !== user[n].username){
        alert("Username does not exist");
    return false;} 
    
     else if (password !== user[n].password){
            alert("Incorrect password");
        return false;}

    }
}
