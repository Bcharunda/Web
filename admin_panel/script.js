function validateForm() {
    var userName = document.getElementById("userName").value;
    var password = document.getElementById("passWord").value;
    var userNameError = document.getElementById("userNameError");
    var passwordError = document.getElementById("passWordError");

    
    userNameError.textContent = "";
    passwordError.textContent = "";

    
    var userNamePattern = /^[A-Za-z]+$/;
    if (!userNamePattern.test(userName)) {
        userNameError.textContent = "User name must contain only letters.";
        return false;
    }

    
    if (password.length < 5) {
        passwordError.textContent = "Password must be at least 5 characters long.";
        return false;
    }

    
    return true;
}

