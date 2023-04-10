// console.log('working properly');
let arr = [];

const formValidation = ()=> {
    console.log('working twice');
    clearError();
    let validationValue = true;
    // now we will validate all inputs
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    // let number = document.getElementById('number').value;
    let password = document.getElementById('password').value;


    if (name == "") {
        setError("nameErr", "*Name cannot be blank");
        validationValue = false;
    }

    if (email == "") {
        setError("emailErr", "*Email cannot be blank");
        validationValue = false;
    } else if (!email.includes('@')) {
        setError("emailErr", "*Should have an @ ");
        validationValue = false;
    } else if (!email.includes('.com')) {
        setError("emailErr", "*Should have .com at the last")
        validationValue = false;
    }
    // else if(email.includes('')){
    //     setError("emailErr", "*there should not be blank spaces in an email");
    //     console.log(email)
    //     validationValue = false;
    // }

    // if (number == "") {
    //     setError("numberErr", "*Your number cannot be blank");
    //     validationValue = false;
    // } else if (number.length > 10) {
    //     setError("numberErr", "*password cannot be more than 10 digits");
    //     validationValue = false;
    // } else if (number.length < 10) {
    //     setError("numberErr", "*password cannot be less than 10 digits, please fill a valid phone no.");
    //     validationValue = false
    // }

    if (password.length < 8) {
        setError("passwordErr", "*Password length should be more than 8 characters")
        validationValue = false;
    }

    return validationValue;

}


function setError(id, error) {
    document.getElementById(id).innerHTML = error
}

function clearError() {
    let error = document.querySelectorAll('.error');
    Array.from(error).forEach((e) => {
        e.innerHTML = ''
    })
}


const formValidationLogin = ()=> {

    console.log('login working');
    clearError();
    let validationValue = true;
    // now we will validate all inputs
    let email = document.getElementById('email').value;
    // let number = document.getElementById('number').value;
    let password = document.getElementById('password').value;


    if (email == "") {
        setError("emailErr", "*Email cannot be blank");
        validationValue = false;
    } else if (!email.includes('@')) {
        setError("emailErr", "*Should have an @ ");
        validationValue = false;
    } else if (!email.includes('.com')) {
        setError("emailErr", "*Should have .com at the last")
        validationValue = false;
    }

    if (password.length < 8) {
        setError("passwordErr", "*Password length should be more than 8 characters")
        validationValue = false;
    }

    return validationValue;

}

function formValidationForgotPassword(){
    console.log('login working');
    clearError();
    let validationValue = true;
    let email = document.getElementById('email').value;
    if (email == "") {
        setError("emailErr", "*Email cannot be blank");
        validationValue = false;
    } else if (!email.includes('@')) {
        setError("emailErr", "*Should have an @ ");
        validationValue = false;
    } else if (!email.includes('.com')) {
        setError("emailErr", "*Should have .com at the last")
        validationValue = false;
    }

    return validationValue;
}


function formValidationNewPassword(){
    console.log('login working');
    clearError();
    let validationValue = true;
    let password = document.getElementById('password').value;
    if (password.length < 8) {
        setError("passwordErr", "*Password length should be more than 8 characters")
        validationValue = false;
    }

    return validationValue;
}




function setError(id, error) {
    document.getElementById(id).innerHTML = error
}

function clearError() {
    let error = document.querySelectorAll('.error');
    Array.from(error).forEach((e) => {
        e.innerHTML = ''
    })
}


