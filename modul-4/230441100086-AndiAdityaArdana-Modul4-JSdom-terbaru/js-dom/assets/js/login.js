// inisiasi element html yang kita butuhkan
const btn_login = document.querySelector("#btn_login");


const email_input = document.querySelector("input[name=email]");
// Inisiasi validasi email
const email_validation = document.querySelector("#email_validation");

const password_input = document.querySelector("input[name=password]");
// Inisiasi validasi password
const password_validation = document.querySelector("#password_validation");

// debugging form email dengan eventListener
email_input.addEventListener("input", (e) =>{ 
    console.log(email_input.value);
    validateEmail();
})

const validateEmail = () => {
    const regexEmail=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/

    if (email_input.value == ""){
        email_validation.innerHTML = "email tidak boleh kosong!";
        email_validation.style.display = "inline";
        email_input.classList.add("is-invalid")
    }
    else if (!email_input.value.match(regexEmail)){
        email_validation.innerHTML = "email tidak valid!";
        email_validation.style.display = "inline";
        email_input.classList.add("is-invalid")
    }
    else {
        email_input.classList.add("is-valid")
        email_input.classList.remove("is-invalid")
        email_validation.style.display = "none";
    }
};

// debugging form Password dengan eventListener
password_input.addEventListener("input", (e) =>{ 
    console.log(password_input.value);
    validatePassword();
});

const validatePassword = () => {
    const regexPassword=/^(?=.[a-z])(?=.[A-Z])(?=.\d)(?=.[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;

    if (password_input.value == ""){
        password_validation.innerHTML = "password tidak boleh kosong!";
        password_validation_validation.style.display = "inline";
        password_input_input.classList.add("is-invalid")
        }
    else if (!password_input.value.match(regexPaassword)){
        password_validation_validation.innerHTML = "password harus minimal 8 karakter, huruf besar, huruf kecil, angka dan karakter spesial";
        password_validation_validation.style.display = "inline";
        password_input_input.classList.add("is-invalid")
        }
    else {
        password_input.classList.add("is-valid")
        password_input.classList.remove("is-invalid")
        password_validation.style.display = "none";
        }
    };

// debugging btn login
btn_login.addEventListener("click", (e) => onLogin(e));


const onLogin = (e) =>{
    e.preventDefault();
    e.stopPropagation();
    console.log("ini button login");
};

