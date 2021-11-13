function showPassword(pid, eid) {
    var x = document.getElementById(pid);
    var i = document.getElementById(eid);
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