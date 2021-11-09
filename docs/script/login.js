function showPassword() {
    var x = document.getElementById("pswd");
    var i = document.getElementById("eye");
    if (x.type === "password") {
        x.type = "text";
        i.classList.remove("fa-eye");
        i.classList.add("fa-eye-slash");
    } else {
        x.type = "password";
        i.classList.remove("fa-eye-slash");
        i.classList.add("fa-eye");
    }
  }