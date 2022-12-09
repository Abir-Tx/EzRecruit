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
