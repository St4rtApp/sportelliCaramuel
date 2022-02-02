function showPassword(idp, ide) {
    var x = document.getElementById(idp);
    var i = document.getElementById(ide);
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