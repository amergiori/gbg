
const fetchUsers = () => {
    fetch(`http://localhost:8080/gbg/router/router.php/user/list`, {mode: 'no-cors'})
    .then((response) => response.json())
    .then((data) => data.forEach(user => {
        let row = `<tr onclick="showUser('${user.email}')">
            <td>${user.username}</td>
            <td>${user.email}</td> 
            <td><button onclick="deleteUser(${user.id})">delete</button></td>
        </tr>`
        document.querySelector("#table-body").innerHTML += row;
    }))
}

const deleteUser = (id) => {
    if (confirm("Do you wish to delete this user?") == true) {
        const rawResponse = fetch('http://localhost:8080/gbg/router/router.php/user/delete', {
            method: 'POST',
            headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
            },
            body: JSON.stringify({id:id})
        });
        const content = rawResponse.json();
        
        console.log(content);
    }
}

const showUser = (email) => {
    fetch(`http://localhost:8080/gbg/router/router.php/user/list?email=${email}`, {mode: 'no-cors'})
    .then((response) => response.json())
    .then((user) => 
        document.querySelector(".popup").innerHTML = `<div>
            <button onclick="removePopup()">X</button>
            <div>Username: ${user[0].username}</div>
            <div>Email: ${user[0].email}</div>
            <div>Password: ${user[0].password}</div>
            <div>Birthday: ${user[0].birthdate}</div>
            <div>URL: ${user[0].url}</div>
            <div>Phone Number: ${user[0].tel}</div>
        </div>`
    )
    .then(document.querySelector(".popup").classList.add("show-popup"))
}

const removePopup = () => {
    document.querySelector(".popup").classList.remove("show-popup");
    document.querySelector(".popup").classList.add("hide-popup");
}

window.onload = function() {
    fetchUsers();
  };

