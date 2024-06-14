const btn_login = document.querySelector("#btn_login");
const first_name_input = document.querySelector("input[name=first_name]");
const last_name_input = document.querySelector("input[name=last_name]");
const email_input = document.querySelector("input[name=email]");
const phone_input = document.querySelector("input[name=phone]");
const password_input = document.querySelector("input[name=password]");
const confirm_password_input = document.querySelector("input[name=confirm_password]");

const first_name_validation = document.querySelector("#first_name_validation");
const last_name_validation = document.querySelector("#last_name_validation");
const email_validation = document.querySelector("#email_validation");
const phone_validation = document.querySelector("#phone_validation");
const password_validation = document.querySelector("#password_validation");
const confirm_password_validation = document.querySelector("#confirm_password_validation");

// Debugging form First Name dengan eventListener
first_name_input.addEventListener("input", (e) => {
    console.log(first_name_input.value);
    validateFirstName();
});

const validateFirstName = () => {
    const firstName = first_name_input.value.trim(); // Menghapus spasi di awal dan akhir
    if (firstName.length < 3 || firstName.length > 10) {
        first_name_validation.innerHTML = "First Name tidak boleh kurang dari 3 dan melebihi 10 karakter";
        first_name_validation.style.display = "inline";
        first_name_input.classList.add("is-invalid");

        // Ubah border menjadi warna biru jika kurang dari 3 karakter
        if (firstName.length < 3) {
            first_name_input.classList.add("border-blue");
        } else {
            first_name_input.classList.remove("border-blue");
        }
    } else {
        first_name_input.classList.remove("is-invalid");
        first_name_input.classList.add("is-valid");
        first_name_validation.style.display = "none";
        first_name_input.classList.remove("border-blue");
    }
}

// Debugging form Last Name dengan eventListener
last_name_input.addEventListener("input", (e) => {
    console.log(last_name_input.value);
    validateLastName();
});

const validateLastName = () => {
    const lastName = last_name_input.value.trim();
    if (lastName.length < 3 || lastName.length > 10) {
        last_name_validation.innerHTML = "Last Name tidak boleh kurang dari 3 dan melebihi 10 karakter";
        last_name_validation.style.display = "inline";
        last_name_input.classList.add("is-invalid");

        // Ubah border menjadi warna biru jika kurang dari 3 karakter
        if (lastName.length < 3) {
            last_name_input.classList.add("border-blue");
        } else {
            last_name_input.classList.remove("border-blue");
        }
    } else {
        last_name_input.classList.remove("is-invalid");
        last_name_input.classList.add("is-valid");
        last_name_validation.style.display = "none";
        last_name_input.classList.remove("border-blue");
    }
}

// Debugging form email dengan eventListener
email_input.addEventListener("input", (e) =>{ 
    console.log(email_input.value);
    validateEmail();
});

const validateEmail = () => {
    const regexEmail = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    if (email_input.value === ""){
        email_validation.innerHTML = "Email tidak boleh kosong";
        email_validation.style.display = "inline";
        email_input.classList.add("is-invalid");
        email_input.classList.remove("is-valid");
    } else if (!email_input.value.match(regexEmail)){
        email_validation.innerHTML = "Email tidak valid";
        email_validation.style.display = "inline";
        email_input.classList.add("is-invalid");
        email_input.classList.remove("is-valid");
    } else {
        email_input.classList.remove("is-invalid");
        email_input.classList.add("is-valid");
        email_validation.style.display = "none";
    }
}

// Debugging form phone number dengan eventListener
phone_input.addEventListener("input", (e) => {
    console.log(phone_input.value);
    validatePhone();
});

const validatePhone = () => {
    const phone = phone_input.value.trim();
    if (phone.length === 0) {
        phone_validation.innerHTML = "Nomor telepon tidak boleh kosong";
        phone_validation.style.display = "inline";
        phone_input.classList.add("is-invalid");
        phone_input.classList.remove("is-valid");
    } else if (phone.length > 12) {
        phone_validation.innerHTML = "Nomor telepon tidak boleh lebih dari 12 angka";
        phone_validation.style.display = "inline";
        phone_input.classList.add("is-invalid");
        phone_input.classList.remove("is-valid");
    } else {
        phone_input.classList.remove("is-invalid");
        phone_input.classList.add("is-valid");
        phone_validation.style.display = "none";
    }
}

// Debugging form password dengan eventListener
password_input.addEventListener("input", (e) =>{ 
    console.log(password_input.value);
    validatePassword();
});

const validatePassword = () => {
    const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;

    if (password_input.value === ""){
        password_validation.innerHTML = "Password tidak boleh kosong";
        password_validation.style.display = "inline";
        password_input.classList.add("is-invalid");
        password_input.classList.remove("is-valid");
    } else if (!password_input.value.match(regexPassword)){
        password_validation.innerHTML = "Password harus minimal 8 karakter, huruf besar, huruf kecil, angka dan karakter spesial";
        password_validation.style.display = "inline";
        password_input.classList.add("is-invalid");
        password_input.classList.remove("is-valid");
    } else {
        password_input.classList.remove("is-invalid");
        password_input.classList.add("is-valid");
        password_validation.style.display = "none";
    }
}

// Event listener untuk input konfirmasi password
confirm_password_input.addEventListener("input", (e) => {
    console.log(confirm_password_input.value);
    validateConfirmPassword();
});

const validateConfirmPassword = () => {
    const confirmPassword = confirm_password_input.value.trim();
    const password = password_input.value.trim();

    if (confirmPassword !== password) {
        confirm_password_validation.innerHTML = "Konfirmasi password harus sesuai dengan password";
        confirm_password_validation.style.display = "inline";
        confirm_password_input.classList.add("is-invalid");
        confirm_password_input.classList.remove("is-valid");
    } else {
        confirm_password_input.classList.remove("is-invalid");
        confirm_password_input.classList.add("is-valid");
        confirm_password_validation.style.display = "none";
    }
}

// Debugging btn login
btn_login.addEventListener("click", (e) => onLogin(e));

const onLogin = (e) => {
    e.preventDefault();
    e.stopPropagation();
    console.log("Ini button login");
    validateFirstName();
    validateLastName();
    validateEmail();
    validatePhone();
    validatePassword();
    validateConfirmPassword();
    // Tambahkan logika login lainnya di sini
};
