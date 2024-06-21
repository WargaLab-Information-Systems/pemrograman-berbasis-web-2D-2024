// inisiasi element yang kita butuhkan
const btn_login = document.querySelector("#btn_login");
const email_input = document.querySelector("input[name = email]");
// inisiasi validasi emal
const email_validation = document.querySelector("#email_validation");


const password_input = document.querySelector("input[name = password]");
// inisialisasi validasi password
const password_validation = document.querySelector("#password_validation");

// debugging form email dengan eventListerner

email_input.addEventListener("input", (e)=> {
    console.log(email_input.value);
    validateEmail()
});

const validateEmail = () => {
    console.regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (email_input.value == ""){
        email_validation.innerHTML = "Email tidak boleh kosong";
        email_validation.style.display = "inline";
        email_input.classList.add("is-invalid");
    }else if(!email_input.value.match(regexEmail)) {
        email_validation.innerHTML = "Email tidak valid";
        email_validation.style.display = "inline";
        email_input.classList.add("is-invalid");
    }else  {
        email_input.classList.add("is-valid");
        email_input.classList.remove("is-invalid");
        email_validation.style.display = "none";
    }
};

password_input.addEventListener("input", (e)=> {
    console.log(password_input.value);
    validatePassword();
});

const validatePassword = () => {
    console.regexPassword = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (password_input.value == ""){
        password_validation.innerHTML = "password tidak boleh kosong";
        password_validation.style.display = "inline";
        password_input.classList.add("is-invalid");
    }else if(!email_input.value.match(regexEmail)) {
        password_validation.innerHTML = "Password harus min 8 karakter, huruf besar, huruf kecil, angka dan karakter spesial";
        password_validation.style.display = "inline";
        password_input.classList.add("is-invalid");
    }else  {
        password_input.classList.add("is-valid");
        password_input.classList.remove("is-invalid");
        password_validation.style.display = "none";
    }
};


// debugging btn login

btn_login.addEventListener("click",(e) => onLogin (e));

const onLogin = (e) => {
    e.preventDefault();
    e.stopPropagation();
    console.log("Ini button login");
};