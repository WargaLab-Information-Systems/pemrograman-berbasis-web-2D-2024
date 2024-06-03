document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form.needs-validation");

    // Fungsi untuk menampilkan pesan kesalahan
    function showError(input, message) {
    const feedback = input.nextElementSibling;
    feedback.textContent = message;
    input.classList.add("is-invalid");
    }

    // Fungsi untuk menghapus pesan kesalahan
    function clearError(input) {
        const invalidFeedback = input.nextElementSibling;
        invalidFeedback.textContent = '';
        input.classList.remove('is-invalid');
    }

    // Fungsi untuk validasi First Name
    function validateFirstName() {
    const firstNameInput = form.querySelector('input[placeholder="First Name"]');
    if (firstNameInput.value.length < 3 || firstNameInput.value.length > 10) {
        showError(firstNameInput, "First Name tidak boleh kurang dari 3 dan melebihi 10 karakter");
    } else {
        clearError(firstNameInput);
    }
    }

    // Fungsi untuk validasi Last Name
    function validateLastName() {
    const lastNameInput = form.querySelector('input[placeholder="Last name"]');
    if (lastNameInput.value.length < 3 || lastNameInput.value.length > 10) {
        showError(lastNameInput, "Last Name tidak boleh kurang dari 3 dan melebihi 10 karakter");
    } else {
        clearError(lastNameInput);
    }
    }

    // Fungsi untuk validasi Email
    function validateEmail() {
    const emailInput = form.querySelector('input[placeholder="example@gmail.com"]');
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailInput.value.trim() === "") {
        showError(emailInput, "Email tidak boleh kosong");
    } else if (!emailRegex.test(emailInput.value)) {
        showError(emailInput, "Maaf, email tidak valid");
    } else {
        clearError(emailInput);
    }
    }

    // Fungsi untuk validasi Phone Number
    function validatePhoneNumber() {
    const phoneInput = form.querySelector('input[placeholder="+62"]');
    if (phoneInput.value.trim() === "") {
        showError(phoneInput, "Nomor telepon tidak boleh kosong");
    } else if (phoneInput.value.length > 12) {
        showError(phoneInput, "Nomor telepon tidak boleh lebih dari 12 karakter");
    } else {
        clearError(phoneInput);
    }
    }

    // Fungsi untuk validasi Password
    function validatePassword() {
        const passwordInput = form.querySelector('input[placeholder="Password"]');
        const passwordRegex = /^(?=.\d)(?=.[a-z])(?=.[A-Z])(?=.[!@#$%^&*()_+[\]{};':"\\|,.<>/?`~]).{8,}$/;
        if (passwordInput.value.trim() === "") {
            showError(passwordInput, "Password tidak boleh kosong");
        } else if (!passwordRegex.test(passwordInput.value)) {
            showError(passwordInput, "Password harus memiliki minimal 8 karakter, huruf besar, huruf kecil, angka, dan karakter spesial");
        } else {
            clearError(passwordInput);
        }
    }

    // Fungsi untuk validasi Konfirmasi Password
    function validateConfirmPassword() {
        const passwordInput = form.querySelector('input[placeholder="Password"]');
        const confirmPasswordInput = form.querySelector('input[placeholder="Konfirmasi password"]');
        if (confirmPasswordInput.value === "") {
            showError(confirmPasswordInput, "Konfirmasi password tidak boleh kosong");
        } else if (confirmPasswordInput.value !== passwordInput.value) {
            showError(confirmPasswordInput, "Konfirmasi password harus sesuai dengan password");
        } else {
            clearError(confirmPasswordInput);
        }
    }

    // Event listener untuk setiap input
    form.querySelectorAll("input").forEach(function (input) {
    input.addEventListener("input", function () {
        switch (input.getAttribute("placeholder")) {
        case "First Name":
            validateFirstName();
            break;
        case "Last name":
            validateLastName();
            break;
        case "example@gmail.com":
            validateEmail();
            break;
        case "+62":
            validatePhoneNumber();
            break;
        case "Password":
            validatePassword();
            break;
        case "Konfirmasi password":
            validateConfirmPassword();
            break;
        default:
            break;
        }
    });
    });

    // Fungsi untuk validasi form saat submit
    form.addEventListener("submit", function (event) {
    event.preventDefault();
    event.stopPropagation();

    validateFirstName();
    validateLastName();
    validateEmail();
    validatePhoneNumber();
    validatePassword();
    validateConfirmPassword();

    // Check if all inputs are valid
    if (form.checkValidity()) {
        // Simpan data atau lakukan aksi lainnya ketika form valid
        alert("Form valid, data dapat disubmit");
    }
    });
});