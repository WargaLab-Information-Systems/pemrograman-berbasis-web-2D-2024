// mendeklarasikan elemen-elemen HTML yang ingin
//  Anda manipulasi di dalam program,seperti first_name_input, last_name_input, dll.
//  Setiap kali ada perubahan pada elemen input first_name_input, fungsi yang didefinisikan akan dijalankan.
// memungkinkan Anda melihat secara real-time apa yang diketikkan pengguna dalam input first_name_input
// peringatan  validateFirstName().
// Debugging form First Name dengan eventListener
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

first_name_input.addEventListener("input", (e) => {
    console.log(first_name_input.value);
    validateFirstName();
});
// inner html kalau sesuai nga bakal muncul kalau sesuai muncul
const validateFirstName = () => {
    const firstName = first_name_input.value.trim(); // Menghapus spasi di awal dan akhir
    if (firstName.length < 3 || firstName.length > 10) {
        first_name_validation.innerHTML = "First Name tidak boleh kurang dari 3 dan melebihi 10 karakter";
        first_name_validation.style.display = "inline";
        first_name_input.classList.add("is-invalid");
    } else {
        first_name_input.classList.remove("is-invalid");
        first_name_input.classList.add("is-valid");
        first_name_validation.style.display = "none";
    }
}

// Debugging form Last Name dengan eventListener
last_name_input.addEventListener("input", (e) => {
    console.log(last_name_input.value);
    validateLastName();
});

const validateLastName = () => {
    const lastName = last_name_input.value.trim(); // Menghapus spasi di awal dan akhir
    if (lastName.length < 3 || lastName.length > 10) {
        last_name_validation.innerHTML = "Last Name tidak boleh kurang dari 3 dan melebihi 10 karakter";
        last_name_validation.style.display = "inline";
        last_name_input.classList.add("is-invalid");
    } else {
        last_name_input.classList.remove("is-invalid");
        last_name_input.classList.add("is-valid");
        last_name_validation.style.display = "none";
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
    } else if (!email_input.value.match(regexEmail)){
        email_validation.innerHTML = "Email tidak valid";
        email_validation.style.display = "inline";
        email_input.classList.add("is-invalid");
    } else {
        email_input.classList.remove("is-invalid");
        email_input.classList.add("is-valid");
        email_validation.style.display = "none";
    }
}

phone_input.addEventListener("input", (e) => {
    console.log(phone_input.value);
    validatePhone();
});

const validatePhone = () => {
    const phone = phone_input.value.trim(); // Menghapus spasi di awal dan akhir
    if (phone.length === 0) {
        phone_validation.innerHTML = "Nomor telepon tidak boleh kosong";
        phone_validation.style.display = "inline";
        phone_input.classList.add("is-invalid");
    } else if (phone.length < 0 || phone.length > 12) {
        phone_validation.innerHTML = "Nomor telepon tidak boleh lebih dari 12 angka";
        phone_validation.style.display = "inline";
        phone_input.classList.add("is-invalid");
    } else {
        phone_input.classList.remove("is-invalid");
        phone_input.classList.add("is-valid");
        phone_validation.style.display = "none";
    }
}

phone_input.addEventListener("input", (e) => {
    console.log(phone_input.value);
    validatePhone();
});

// Debugging form password dengan eventListener
password_input.addEventListener("input", (e) =>{ 
    console.log(password_input.value);
    validatePassword();
});
//  "Password tidak boleh kosong" 
// sandi tidak sesuai dengan
// sandi sesuai dengan pola
const validatePassword = () => {
    const regexPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%?&])[A-Za-z\d@$!%?&]{8,}$/;

    if (password_input.value === ""){
        password_validation.innerHTML = "Password tidak boleh kosong";
        password_validation.style.display = "inline";
        password_input.classList.add("is-invalid");
    } else if (!password_input.value.match(regexPassword)){
        password_validation.innerHTML = "Password harus minimal 8 karakter, huruf besar, huruf kecil, angka dan karakter spesial";
        password_validation.style.display = "inline";
        password_input.classList.add("is-invalid");
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

// Fungsi validasi konfirmasi password
const validateConfirmPassword = () => {
    const confirmPassword = confirm_password_input.value.trim(); // Menghapus spasi di awal dan akhir
    const password = password_input.value.trim(); // Ambil nilai password

    if (confirmPassword !== password) {
        confirm_password_validation.innerHTML = "Konfirmasi password harus sesuai dengan password";
        confirm_password_validation.style.display = "inline";
        confirm_password_input.classList.add("is-invalid");
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
    validateEmail();
    validatePassword();
    
};







// btn_login.addEventListener Menambahkan event listener ke tombol login se
// const onLogin Mendefinisikan fungsi onLogin yang akan dijalankan ketika tombol login diklik.
// e.preventDefault Mencegah aksi default dari event klik.
// e.stopPropagation Menghentikan propagasi event ke elemen-elemen induk.
// console.log("Ini button login");: Mencetak pesan ke konsol untuk tujuan debugging.
// validateEmail();: Memanggil fungsi untuk memvalidasi input email.
// validatePassword();: Memanggil fungsi untuk memvalidasi input kata sandi.