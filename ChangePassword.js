function validate() {
    var passflag = 0;
    var renewflag = 0;
    var y = document.forms["changepwd"]["newpwd"].value;
    var z = document.forms["changepwd"]["renewpwd"].value;
    document.getElementById("new").innerHTML = "";
    document.getElementById("renew").innerHTML = " ";
    document.getElementById("newpwd").style = "";
    document.getElementById("renewpwd").style = "";

    if (y == "" && z == "") {
        alert("Please Enter Both The Fields");
        return false;
    }

    if (y == "") {
        document.getElementById("new").innerHTML = "* Please Enter New password";
        document.getElementById("newpwd").style = "border:2px solid red";
        document.getElementById("newpwd").focus();
        passflag = 1;
    } else if (z == "") {
        document.getElementById("renew").innerHTML = "* Please Re Enter Your Password";
        document.getElementById("renewpwd").style = "border:2px solid red";
        document.getElementById("renewpwd").focus();
        renewflag = 1;
    } else if (y != z && y != "" && z != "") {
        document.getElementById("renew").innerHTML = "* Passwords do not match ";
        document.getElementById("renewpwd").style = "border:2px solid red";
        document.getElementById("renewpwd").focus();
        renewflag = 1;
    }

    if (passflag == 1 || renewflag == 1)
        return false;

    if (passflag == 0 || renewflag == 0) {
        var hash = md5(y);
        document.getElementById("storepass").value = hash;
        return true;
    }
}
