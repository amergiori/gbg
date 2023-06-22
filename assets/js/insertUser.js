const submitForm = () => {
    let inputs = getInputs();
    console.log(JSON.stringify(inputs));
    const validateArray = validateForm(inputs);
    if(validateArray){
        fetch('http://localhost:8080/gbg/router/router.php/user/insert', {
            method: 'POST',
            headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
            },
            body: JSON.stringify(inputs)
        });
        document.querySelector("form").reset();
    }
}

const getInputs = () => {
    const username = document.querySelector('.username').value;
    const email = document.querySelector('.email').value;
    const password = document.querySelector('.password').value;
    const url = document.querySelector('.url').value;
    const tel = document.querySelector('.tel').value;
    const birthdate = document.querySelector('.birthdate').value;
    return {username, email, password, url, tel, birthdate};
}

const validateForm = (inputs) => {
    const username = /^[A-Za-z]+$/.test(inputs.username);
    if (username === false) {
        document.querySelector(".error").innerHTML = "Only letters are allowed";
        return false;
    }

    const password = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(inputs.password);
    if (password === false) {
        document.querySelector(".error").innerHTML = "8 chars min, 1 lowercase, 1 uppercase and 1 special sign at least";
        return false;
    }

    const tel = inputs.tel.length == 10;
    if (tel === false) {
        document.querySelector(".error").innerHTML = "phone should be 10 numbers long";
        return false;
    }
    return true;
}

window.onload = function() {
    document.querySelector('.form').addEventListener("submit", (e) => e.preventDefault());
};

