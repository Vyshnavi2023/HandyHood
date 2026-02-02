
const joinBtn = document.getElementById("joinWorkerBtn");
const modal = document.getElementById("workerModal");
const closeBtn = document.getElementById("closeModal");

joinBtn.onclick = function () {
  modal.style.display = "flex";
};

closeBtn.onclick = function () {
  modal.style.display = "none";
};


//form validation 
const form = document.getElementById("workerForm");

form.onsubmit = function (e) {
  e.preventDefault(); 

  const name = document.getElementById("fullName").value.trim();
  const mobile = document.getElementById("mobile").value.trim();
  const password = document.getElementById("password").value;
  const confirmPassword = document.getElementById("confirmPassword").value;
  const category = document.getElementById("category").value;
  const city = document.getElementById("city").value.trim();

  if (name === "") {
    alert("Please enter your name");
    return;
  }

  if (mobile.length !== 10) {
    alert("Mobile number must be 10 digits");
    return;
  }

  if (password.length < 6) {
    alert("Password must be at least 6 characters");
    return;
  }

  if (password !== confirmPassword) {
    alert("Passwords do not match");
    return;
  }

  if (category === "") {
    alert("Please select a work category");
    return;
  }

  if (city === "") {
    alert("Please enter your city");
    return;
  }


  alert("Form validated successfully ");
};
