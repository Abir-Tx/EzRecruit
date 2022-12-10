function checkName(nameId) {
  var name = document.getElementById(nameId).value;
  if (name == "") {
    document.getElementById("nameErr").innerHTML = "Name is required";
  } else {
    document.getElementById("nameErr").innerHTML = "";
  }
}

function checkEmail(emailId) {
  var email = document.getElementById(emailId).value;
  if (email == "") {
    document.getElementById("emailErr").innerHTML = "Email is required";
  } else {
    document.getElementById("emailErr").innerHTML = "";
  }
}

function checkPass(passId) {
  var pass = document.getElementById(passId).value;
  if (pass == "") {
    document.getElementById("passErr").innerHTML = "Password is required";
  } else {
    document.getElementById("passErr").innerHTML = "";
  }
}

function checkCpass(cpassID) {
  var cpass = document.getElementById(cpassID).value;
  if (cpass == "") {
    document.getElementById("cpassErr").innerHTML =
      "Confirm password is required";
  } else if (cpass != pass) {
    document.getElementById("cpassErr").innerHTML = "Passwords do not match";
  } else {
    document.getElementById("cpassErr").innerHTML = "";
  }
}

function checkUsername(usernameId, usernameErrorId) {
  var username = document.getElementById(usernameId).value;
  if (username == "") {
    document.getElementById(usernameErrorId).innerHTML = "Username is required";
  } else {
    document.getElementById(usernameErrorId).innerHTML = "";
  }
}

function checkFname(fnameId, fnameErrorId) {
  var fname = document.getElementById(fnameId).value;
  if (fname == "") {
    document.getElementById(fnameErrorId).innerHTML = "First name is required";
  } else {
    document.getElementById(fnameErrorId).innerHTML = "";
  }
}

function checkLname(lnameId, lnameErrorId) {
  var lname = document.getElementById(lnameId).value;
  if (lname == "") {
    document.getElementById(lnameErrorId).innerHTML = "Last name is required";
  } else {
    document.getElementById(lnameErrorId).innerHTML = "";
  }
}

function checkDoB(dobId, dobErrorId) {
  var dob = document.getElementById(dobId).value;
  if (dob == "") {
    document.getElementById(dobErrorId).innerHTML = "Date of birth is required";
  } else {
    document.getElementById(dobErrorId).innerHTML = "";
  }
}
