import { textTooShort, textSame } from "./functions.js";

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("login").addEventListener("input", (event) => 
        textTooShort("Login", event.target.value, 8, "tooshort")
    );

    const passwordField = document.getElementById("password");
    const repeatPasswordField = document.getElementById("password-repeat");
    
    passwordField.addEventListener("input", () => 
        textSame(passwordField.value, repeatPasswordField.value, "textsame")
    );
    repeatPasswordField.addEventListener("input", () => 
        textSame(passwordField.value, repeatPasswordField.value, "textsame")
    );

});