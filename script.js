/*Join as Worker button (index.html)  */
const joinBtn = document.getElementById("joinWorkerBtn");

if (joinBtn) {
  joinBtn.onclick = function () {
    window.location.href = "join.html";
  };
}

/*  Form validation*/
const form = document.getElementById("workerForm");

if (form) {
  form.onsubmit = function () {

    const name = document.getElementById("fullName").value.trim();
    const mobile = document.getElementById("mobile").value.trim();
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    const category = document.getElementById("category").value;
    const city = document.getElementById("city").value.trim();

    if (name === "") {
      alert("Please enter your name");
      return false;
    }

    if (mobile.length !== 10 || isNaN(mobile)) {
      alert("Mobile number must be exactly 10 digits");
      return false;
    }

    if (password.length < 6) {
      alert("Password must be at least 6 characters");
      return false;
    }

    if (password !== confirmPassword) {
      alert("Passwords do not match");
      return false;
    }

    if (category === "") {
      alert("Please select a work category");
      return false;
    }

    if (city === "") {
      alert("Please enter your city");
      return false;
    }

  
    return true;
  };
}
