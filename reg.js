function validateForm() {
  const samagraId = document.getElementById("samagra-id").value;
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirm-password").value;
  const email = document.getElementById("email").value;
  const errorMessage = document.getElementById("error-message");
  const samagraRegex = /^[0-9]{9}$/;
  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/; // Email regex

  // Validate Samagra ID
  if (!samagraRegex.test(samagraId)) {
    errorMessage.textContent = "Samagra ID must be exactly 9 digits.";
    errorMessage.style.display = "block";
    return false;
  }

  // Validate password match
  if (password !== confirmPassword) {
    errorMessage.textContent = "Passwords do not match.";
    errorMessage.style.display = "block";
    return false;
  }

  // Validate email format
  if (!emailRegex.test(email)) {
    errorMessage.textContent = "Please enter a valid email address.";
    errorMessage.style.display = "block";
    return false;
  }

  errorMessage.style.display = "none";
  return true;  
}
