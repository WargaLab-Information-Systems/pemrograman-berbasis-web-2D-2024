const btnLogin = document.querySelector("#btn_login");
const emailInput = document.querySelector("input[name='email']");
const passwordInput = document.querySelector("input[name='password']");

// inisiasi validasi email dan password
const emailValidation = document.querySelector("#email_validation");
const passwordValidation = document.querySelector("#password_validation");

// Debugging btn login
btnLogin.addEventListener("click", (e) => onLogin(e));

const onLogin = (e) => {
  e.preventDefault();
  e.stopPropagation();
  console.log("Ini button login");
};

emailInput.addEventListener("input", (e) => {
  validateEmail();
});

const validateEmail = () => {
  const regexEmail = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/";

  if (emailInput.value === "") {
    emailValidation.innerHTML = "email tidak boleh kosong";
    emailValidation.style.display = "inline";
    emailInput.classList.add("is-invalid");
  } else if (!emailInput.value.match(regexEmail)) {
    emailValidation.innerHTML = "email tidak valid";
    emailValidation.style.display = "inline";
    emailInput.classList.add("is-invalid");
  } else {
    console.log("validasi oke");
    emailInput.classList.remove("is-invalid");
  }
};

passwordInput.addEventListener("input", (e) => {
  console.log(e.target.value);
});
