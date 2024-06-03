// firstname
const firstName = document.getElementById("first-name");
const firstNameValidation = document.getElementById("validation-firstname");

// lastname
const lastName = document.getElementById("last-name");
const lastNameValidation = document.getElementById("validation-lastname");

// email
const email = document.getElementById("email");
const emailValidation = document.getElementById("validation-email");

// phone number
const phoneNumber = document.getElementById("phone-number");
const phoneNumberValidation = document.getElementById("validation-phonenumber");

// password
const password = document.getElementById("password");
const passwordValidation = document.getElementById("validation-password");

// conf password
const confPassword = document.getElementById("conf-password");
const confPasswordValidation = document.getElementById(
  "validation-confpassword"
);

// functions all validate form
// ero fungsi
const validateName = (elInput, elVal) => {
  elInput.addEventListener("input", (e) => {
    if (elInput.value == "") {
      elVal.innerText = `${e.target.ariaLabel} tidak boleh kosong`;
      elInput.classList.add("is-invalid");
    } else if (elInput.value.length < 3 || elInput.value.length > 10) {
      elVal.innerText = `${e.target.ariaLabel} tidak boleh kurang dari 3 dan lebih dari 10`;
      elInput.classList.add("is-invalid");
    } else {
      elInput.classList.remove("is-invalid");
      elInput.classList.add("is-valid");
    }
  });
};

const validateEmail = () => {
const emailRegex =
  
  // Kondisi email
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

  if (email.value === "") {
    emailValidation.innerText = "email tidak boleh kosong";
    email.classList.add("is-invalid");
  } else if (!email.value.match(emailRegex)) {
    emailValidation.innerText = "email tidak valid";
    email.classList.add("is-invalid");
  } else {
    email.classList.remove("is-invalid");
    email.classList.add("is-valid");
  }
};

const validatePhoneNumber = () => {
  phoneNumber.addEventListener("input", () => {
    if (phoneNumber.value.length > 12) {
      phoneNumberValidation.innerText =
        "Nomor telepon tidak boleh lebih dari 12";
      phoneNumber.classList.add("is-invalid");
    } else if (phoneNumber.value == "") {
      phoneNumberValidation.innerText = "Nomor telepon tidak boleh kosong";
      phoneNumber.classList.add("is-invalid");
    } else {
      phoneNumber.classList.remove("is-invalid");
      phoneNumber.classList.add("is-valid");
    }
  });
};

const validatePassword = () => {
  const passwordRegex =
    /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?])^.{8,}$/;

  if (password.value == "") {
    passwordValidation.innerText = `Password tidak boleh kosong`;
    password.classList.add("is-invalid");
  } else if (
    password.value.length < 8 ||
    !password.value.match(passwordRegex)
  ) {
    passwordValidation.innerText =
      "password harus min 8 character, huruf besar, huruf kecil, angka, dan karakter spesial";
    password.classList.add("is-invalid");
  } else {
    password.classList.remove("is-invalid");
    password.classList.add("is-valid");
  }
};

const validateConfPassword = () => {
  if (password.value !== confPassword.value) {
    confPassword.classList.add("is-invalid");
    confPasswordValidation.innerText =
      "Konfirmasi password harus sesuai dengan password";
  } else {
    confPassword.classList.add("is-valid");
    confPassword.classList.remove("is-invalid");
  }
};

// execute function validate name
validateName(firstName, firstNameValidation);
validateName(lastName, lastNameValidation);

email.addEventListener("input", () => validateEmail());
phoneNumber.addEventListener("input", () => validatePhoneNumber());

password.addEventListener("input", () => validatePassword());
confPassword.addEventListener("input", () => validateConfPassword());
