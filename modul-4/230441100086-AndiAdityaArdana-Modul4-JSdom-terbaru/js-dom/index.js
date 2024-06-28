// inisiasi element html yang kita butuhkan
const btn_login = document.querySelector("#btn_login");
const email_input = document.querySelector("input[name=email]");
const password_input = document.querySelector("input[name=password]");


// debugging form email dengan eventListener
email_input.addEventListener("input", (e) =>{ 
    console.log(email_input.value);
})

// debugging form Password dengan eventListener
password_input.addEventListener("input", (e) =>{ 
    console.log(password_input.value);
})

// debugging btn login
btn_login.addEventListener("click", (e) => onLogin(e));


const onLogin = (e) =>{
    e.preventDefault();
    e.stopPropagation();
    console.log("ini button login");
};

