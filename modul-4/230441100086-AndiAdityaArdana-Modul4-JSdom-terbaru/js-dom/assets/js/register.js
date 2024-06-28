document.addEventListener('DOMContentLoaded', function() {
  // DOM elements for form inputs
  const firstNameInput = document.querySelector('input[placeholder="First Name"]');
  const lastNameInput = document.querySelector('input[placeholder="Last name"]');
  const emailInput = document.querySelector('input[type="email"]');
  const phoneNumberInput = document.querySelector('input[type="number"]');
  const passwordInput = document.querySelector('input[type="password"]');
  const confirmPasswordInput = document.querySelectorAll('input[type="password"]')[1];
  const form = document.querySelector('form');

  // Error message elements
  const firstNameErrorMessage = document.createElement('div');
  const lastNameErrorMessage = document.createElement('div');
  const emailErrorMessage = document.createElement('div');
  const phoneNumberErrorMessage = document.createElement('div');
  const passwordErrorMessage = document.createElement('div');
  const confirmPasswordErrorMessage = document.createElement('div');

  // Add classes to error message elements
  firstNameErrorMessage.classList.add('text-danger', 'error-message');
  lastNameErrorMessage.classList.add('text-danger', 'error-message');
  emailErrorMessage.classList.add('text-danger', 'error-message');
  phoneNumberErrorMessage.classList.add('text-danger', 'error-message');
  passwordErrorMessage.classList.add('text-danger', 'error-message');
  confirmPasswordErrorMessage.classList.add('text-danger', 'error-message');

  // Function to validate text inputs (First Name, Last Name)
  function validateInput(input, errorMessage, minLength, maxLength, fieldName) {
    const value = input.value.trim();
    if (value.length < minLength || value.length > maxLength) {
      errorMessage.textContent = `${fieldName} tidak boleh kurang dari ${minLength} dan melebihi ${maxLength} karakter`;
      if (!input.parentNode.querySelector('.error-message')) {
        input.parentNode.appendChild(errorMessage);
      }
      input.classList.add('is-invalid');
      return false;
    } else {
      errorMessage.textContent = '';
      input.classList.remove('is-invalid');
      return true;
    }
  }

  // Function to validate email input
  function validateEmail(input) {
    const value = input.value.trim();
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (value === "") {
      emailErrorMessage.textContent = 'Email tidak boleh kosong';
      if (!input.parentNode.querySelector('.error-message')) {
        input.parentNode.appendChild(emailErrorMessage);
      }
      input.classList.add('is-invalid');
      return false;
    } else if (!emailRegex.test(value)) {
      emailErrorMessage.textContent = 'Maaf, email tidak valid';
      if (!input.parentNode.querySelector('.error-message')) {
        input.parentNode.appendChild(emailErrorMessage);
      }
      input.classList.add('is-invalid');
      return false;
    }
    emailErrorMessage.textContent = '';
    input.classList.remove('is-invalid');
    return true;
  }

  // Function to validate phone number input
  function validatePhoneNumber(input) {
    const value = input.value.trim();
    if (value === "") {
      phoneNumberErrorMessage.textContent = 'Nomor telepon tidak boleh kosong';
      if (!input.parentNode.querySelector('.error-message')) {
        input.parentNode.appendChild(phoneNumberErrorMessage);
      }
      input.classList.add('is-invalid');
      return false;
    } else if (value.length > 12) {
      phoneNumberErrorMessage.textContent = 'Nomor telepon tidak boleh lebih dari 12 karakter';
      if (!input.parentNode.querySelector('.error-message')) {
        input.parentNode.appendChild(phoneNumberErrorMessage);
      }
      input.classList.add('is-invalid');
      return false;
    }
    phoneNumberErrorMessage.textContent = '';
    input.classList.remove('is-invalid');
    return true;
  }

  // Function to validate password input
  function validatePassword(input) {
    const value = input.value;
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (value === "") {
      passwordErrorMessage.textContent = 'Password tidak boleh kosong';
      if (!input.parentNode.querySelector('.error-message')) {
        input.parentNode.appendChild(passwordErrorMessage);
      }
      input.classList.add('is-invalid');
      return false;
    } else if (!passwordRegex.test(value)) {
      passwordErrorMessage.textContent = 'Password harus min 8 karakter, huruf besar, huruf kecil, angka, dan karakter spesial';
      if (!input.parentNode.querySelector('.error-message')) {
        input.parentNode.appendChild(passwordErrorMessage);
      }
      input.classList.add('is-invalid');
      return false;
    }
    passwordErrorMessage.textContent = '';
    input.classList.remove('is-invalid');
    return true;
  }

  // Function to validate confirm password input
  function validateConfirmPassword(password, confirmPassword) {
    const passwordValue = password.value;
    const confirmPasswordValue = confirmPassword.value;
    if (passwordValue !== confirmPasswordValue) {
      confirmPasswordErrorMessage.textContent = 'Konfirmasi password harus sesuai dengan password';
      if (!confirmPassword.parentNode.querySelector('.error-message')) {
        confirmPassword.parentNode.appendChild(confirmPasswordErrorMessage);
      }
      confirmPassword.classList.add('is-invalid');
      return false;
    }
    confirmPasswordErrorMessage.textContent = '';
    confirmPassword.classList.remove('is-invalid');
    return true;
  }

  // Function to clear error messages on focus
  function clearErrorMessage(input, errorMessage) {
    input.addEventListener('focus', function() {
      errorMessage.textContent = '';
      input.classList.remove('is-invalid');
    });
  }

  // Add event listeners for focus and blur
  firstNameInput.addEventListener('focus', function() {
    clearErrorMessage(this, firstNameErrorMessage);
  });
  firstNameInput.addEventListener('blur', function() {
    validateInput(this, firstNameErrorMessage, 5, 10, 'First Name');
  });

  lastNameInput.addEventListener('focus', function() {
    clearErrorMessage(this, lastNameErrorMessage);
  });
  lastNameInput.addEventListener('blur', function() {
    validateInput(this, lastNameErrorMessage, 5, 10, 'Last Name');
  });

  emailInput.addEventListener('focus', function() {
    clearErrorMessage(this, emailErrorMessage);
  });
  emailInput.addEventListener('blur', function() {
    validateEmail(this);
  });

  phoneNumberInput.addEventListener('focus', function() {
    clearErrorMessage(this, phoneNumberErrorMessage);
  });
  phoneNumberInput.addEventListener('blur', function() {
    validatePhoneNumber(this);
  });

  passwordInput.addEventListener('focus', function() {
    clearErrorMessage(this, passwordErrorMessage);
  });
  passwordInput.addEventListener('blur', function() {
    validatePassword(this);
  });

  confirmPasswordInput.addEventListener('focus', function() {
    clearErrorMessage(this, confirmPasswordErrorMessage);
  });
  confirmPasswordInput.addEventListener('blur', function() {
    validateConfirmPassword(passwordInput, this);
  });

  // Form submission event
  form.addEventListener('submit', function(event) {
    const isFirstNameValid = validateInput(firstNameInput, firstNameErrorMessage, 5, 10, 'First Name');
    const isLastNameValid = validateInput(lastNameInput, lastNameErrorMessage, 5, 10, 'Last Name');
    const isEmailValid = validateEmail(emailInput);
    const isPhoneNumberValid = validatePhoneNumber(phoneNumberInput);
    const isPasswordValid = validatePassword(passwordInput);
    const isConfirmPasswordValid = validateConfirmPassword(passwordInput, confirmPasswordInput);

    if (!isFirstNameValid || !isLastNameValid || !isEmailValid || !isPhoneNumberValid || !isPasswordValid || !isConfirmPasswordValid) {
      event.preventDefault();
    }
  });
});
