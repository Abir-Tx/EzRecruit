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