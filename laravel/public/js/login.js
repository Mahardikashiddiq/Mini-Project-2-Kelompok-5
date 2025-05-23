function myMenuFunction() {
    var i = document.getElementById("navMenu");
    if (i.className === "nav-menu") {
        i.className += " responsive";
    } else {
        i.className = "nav-menu";
    }
}

var a = document.getElementById("loginBtn");
var b = document.getElementById("registerBtn");
var x = document.getElementById("login");
var y = document.getElementById("register");

function login() {
    x.style.left = "4px";
    y.style.right = "-520px";
    a.classList.add("white-btn");
    b.classList.remove("white-btn");
    x.style.opacity = 1;
    y.style.opacity = 0;
}

function register() {
    x.style.left = "-510px";
    y.style.right = "5px";
    a.classList.remove("white-btn");
    b.classList.add("white-btn");
    x.style.opacity = 0;
    y.style.opacity = 1;
}

function selectRole(role, formType) {
    if (formType === 'login') {
        document.getElementById('loginRole').value = role;
        
        if (role === 'admin') {
            document.getElementById('adminLoginBtn').classList.add('active');
            document.getElementById('userLoginBtn').classList.remove('active');
        } else {
            document.getElementById('userLoginBtn').classList.add('active');
            document.getElementById('adminLoginBtn').classList.remove('active');
        }
    } else if (formType === 'register') {
        document.getElementById('registerRole').value = role;
        
        if (role === 'admin') {
            document.getElementById('adminRegisterBtn').classList.add('active');
            document.getElementById('userRegisterBtn').classList.remove('active');
        } else {
            document.getElementById('userRegisterBtn').classList.add('active');
            document.getElementById('adminRegisterBtn').classList.remove('active');
        }
    }
}

function handleLogin() {
    console.log("Login function called");
    var role = document.getElementById("loginRole").value;
    var email = document.querySelector("#login .input-field[placeholder='Username or Email']").value;
    var password = document.querySelector("#login .input-field[placeholder='Password']").value;
    
    console.log("Login data:", { role, email });

    if (!email || !password) {
        alert("Silahkan masukkan email dan password!");
        return;
    }

    if (!email.endsWith("@gmail.com")) {
        alert("Email harus menggunakan domain @gmail.com");
        return;
    }

    console.log("Sending login request");
    fetch('/login', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ role, email, password })
    })
    .then(res => {
        console.log("Response status:", res.status);
        return res.json();
    })
    .then(data => {
        console.log("Response data:", data);
        alert(data.message);
        if (data.status) {
            if (role === "admin") {
                window.location.href = adminRoute;
            } else {
                window.location.href = userRoute;
            }
        }
    })
    .catch(err => {
        console.error("Error details:", err);
        alert("Terjadi kesalahan saat login.");
    });
}


function handleRegister() {
    var role = document.getElementById("registerRole").value;
    var email = document.querySelector("#register .input-field[placeholder='Email']").value;
    var password = document.querySelector("#register .input-field[placeholder='Password']").value;

    if (!email || !password) {
        alert("Silahkan lengkapi semua data registrasi!");
        return;
    }

    if (!email.endsWith("@gmail.com")) {
        alert("Email harus menggunakan domain @gmail.com");
        return;
    }

    fetch('/register', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ role, email, password })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message);
        if (data.status) {
            window.location.href = userRoute;
        }
    })
    .catch(err => {
        console.error(err);
        alert("Terjadi kesalahan saat registrasi.");
    });
}
