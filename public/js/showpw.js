const togglePassword = document.getElementById("togglePassword");
const password = document.getElementById("password");

togglePassword.addEventListener("change", function() {
    password.type = this.checked ? "text" : "password";
});