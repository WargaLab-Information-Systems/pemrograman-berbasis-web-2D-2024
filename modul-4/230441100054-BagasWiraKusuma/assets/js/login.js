// inisiasi element hmtl
const btn_login = document.querySelector("#btn_login");

// inisiasi validasi email
const password_input = document.querySelector("input[name=password]");
const email_validation = document.querySelector("#email_validation");

// inisiasi validasi password
const email_input = document.querySelector("input[name=email]");
const password_validation = document.querySelector("#password_validation");

// debuggin form email eventListener
email_input.addEventListener("input", (e) => {
    console.log(email_input.value);
    validateEmail();
});

const validateEmail = () => {
    const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (email_input.value === ""){
        email_validation.innerHTML = "Email Tidak Boleh Kosong!";
        email_validation.style.display = "inline";
        email_input.classList.add("is-invalid");
    }
    else if (!email_input.value.match(regexEmail)){
        email_validation.innerHTML = "Email Tidak Valid!";
        email_validation.style.display = "inline";
        email_input.classList.add("is-invalid");
    }
    else{
        email_input.classList.add("is-valid");
        email_input.classList.remove("is-invalid");
        email_validation.style.display = "none";
    };
};
// debuggin form password eventListener
password_input.addEventListener("input", (e) => {
    console.log(password_input.value);
    validatePassword();
});

const validatePassword = () => {
    const regexPassword = /^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;
    if (password_input.value === ""){
        password_validation.innerHTML = "Password Tidak Boleh Kosong!";
        password_validation.style.display = "inline";
        password_input.classList.add("is-invalid");
    }
    else if (!password_input.value.match(regexPassword)){
        password_validation.innerHTML = "Password harus minimal 8 karakter, Huruf Besar, Huruf Kecil, Angka, dan Karakter Spesial!";
        password_validation.style.display = "inline";
        password_input.classList.add("is-invalid");
    }
    else{
        password_input.classList.add("is-valid");
        password_input.classList.remove("is-invalid");
        password_validation.style.display = "none";
    };
};


// debuggin button login
btn_login.addEventListener("click", (e) => onLogin(e))

const onLogin = (e) => {
    e.preventDefault();
    e.stopPropagation();
    console.log("Ini Button Login");
};