document.getElementById("loginform").addEventListener("submit", function(event){
    event.preventDefault();

    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var errorMessage = document.getElementById("error-message");


    let user = "Nisal";
    let pwd = "admin1234";

    if (!username || !password) {
        errorMessage.textContent = "All fields are required!";
    } else if (password.length < 6) {
        errorMessage.textContent = "Password must be at least 6 characters!";

    }else if (user != username || pwd != password){
        errorMessage.alert("Invalid username or password");
    } 
    else {
        errorMessage.textContent = "";
        window.location.href = "dashboard.php"; // Redirect to dashboard
    }
})