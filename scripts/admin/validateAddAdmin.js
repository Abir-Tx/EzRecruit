function validate() {
  var fname = document.getElementById("fname").value;
  var lname = document.getElementById("lname").value;
  var uname = document.getElementById("uname").value;
  var email = document.getElementById("email").value;
  var password = document.getElementById("password").value;
  var confirmPassword = document.getElementById("confirmPassword").value;
  var gender = document.getElementById("gender").value;
  var dob = document.getElementById("dob").value;
  var profilePic = document.getElementById("profilePic").value;

  var fnameErr = document.getElementById("fnameErr");
  var lnameErr = document.getElementById("lnameErr");
  var unameErr = document.getElementById("unameErr");
  var emailErr = document.getElementById("emailErr");
  var passErr = document.getElementById("passErr");
  var cPassErr = document.getElementById("cPassErr");
  var genderErr = document.getElementById("genderErr");
  var dobErr = document.getElementById("dobErr");
  var profilePicErr = document.getElementById("profilePicErr");

  var flag = true;

  if (fname == "") {
    fnameErr.innerHTML = "First name is required";
    flag = false;
  } else {
    fnameErr.innerHTML = "";
  }

  if (lname == "") {
    lnameErr.innerHTML = "Last name is required";
    flag = false;
  } else {
    lnameErr.innerHTML = "";
  }

  if (uname == "") {
    unameErr.innerHTML = "User name is required";
    flag = false;
  } else {
    unameErr.innerHTML = "";
  }

  if (email == "") {
    emailErr.innerHTML = "Email is required";
    flag = false;
  } else {
    emailErr.innerHTML = "";
  }

  if (password == "") {
    passErr.innerHTML = "Password is required";
    flag = false;
  } else {
    passErr.innerHTML = "";
  }

  if (confirmPassword == "") {
    cPassErr.innerHTML = "Confirm password is required";
    flag = false;
  } else {
    cPassErr.innerHTML = "";

    if (password != confirmPassword) {
      cPassErr.innerHTML = "Password and confirm password must be same";
      flag = false;
    } else {
      cPassErr.innerHTML = "";
    }
  }
}
