// Validate form data before submitting to the server side
function validateForm() {
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var pass = document.getElementById("pass").value;
  var cpass = document.getElementById("cpass").value;

  if (name == "") {
    document.getElementById("nameErr").innerHTML = "Name is required";
    return false;
  }

  if (email == "") {
    document.getElementById("emailErr").innerHTML = "Email is required";
    return false;
  }

  if (pass == "") {
    document.getElementById("passErr").innerHTML = "Password is required";
    return false;
  }

  if (cpass == "") {
    document.getElementById("cpassErr").innerHTML =
      "Confirm password is required";
    return false;
  }

  if (pass == "") {
    document.getElementById("passErr").innerHTML = "Password is required";
    return false;
  } else if (cpass == "") {
    document.getElementById("cpassErr").innerHTML =
      "Confirm password is required";
    return false;
  } else if (pass != cpass) {
    alert("Passwords do not match");
    return false;
  }
}

function checkName() {
  var name = document.getElementById("name").value;
  if (name == "") {
    document.getElementById("nameErr").innerHTML = "Name is required";
  } else {
    document.getElementById("nameErr").innerHTML = "";
  }
}

function checkEmail() {
  var email = document.getElementById("email").value;
  if (email == "") {
    document.getElementById("emailErr").innerHTML = "Email is required";
  } else {
    document.getElementById("emailErr").innerHTML = "";
  }
}

function checkPass() {
  var pass = document.getElementById("pass").value;
  if (pass == "") {
    document.getElementById("passErr").innerHTML = "Password is required";
  } else {
    document.getElementById("passErr").innerHTML = "";
  }
}

function checkCpass() {
  var cpass = document.getElementById("cpass").value;
  if (cpass == "") {
    document.getElementById("cpassErr").innerHTML =
      "Confirm password is required";
  } else if (cpass != pass) {
    document.getElementById("cpassErr").innerHTML = "Passwords do not match";
  } else {
    document.getElementById("cpassErr").innerHTML = "";
  }
}
