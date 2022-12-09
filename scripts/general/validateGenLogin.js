function validateForm() {
  // get the values from the form
  var email = document.getElementById("email").value;
  var pass = document.getElementById("pass").value;

  // check if the values are empty
  if (email == "" || pass == "") {
    alert("Please fill all the fields");
    return false;
  }

  // check if the email is valid
  if (!validateEmail(email)) {
    alert("Please enter a valid email");
    return false;
  }

  // check if the password is valid
  if (!validatePass(pass)) {
    alert("Please enter a valid password");
    return false;
  }

  return true;
}
