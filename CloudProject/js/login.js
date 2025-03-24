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
    var role = document.getElementById("loginRole").value;
    var username = document.querySelector("#login .input-field[placeholder='Username or Email']").value;
    var password = document.querySelector("#login .input-field[placeholder='Password']").value;
    
    // Validasi sederhana
    if (!username || !password) {
        alert("Silahkan masukkan username dan password!");
        return;
    }
    
    // Simulasi login tanpa backend
    if (role === "admin") {
        alert("Login sebagai Admin berhasil!");
        window.location.href = "dashboard_admin.html"; // Redirect ke halaman admin
    } else {
        alert("Login sebagai User berhasil!");
        window.location.href = "dashboard_user.html"; // Redirect ke halaman user
    }
}

function handleRegister() {
    var role = document.getElementById("registerRole").value;
    var firstname = document.querySelector("#register .input-field[placeholder='Firstname']").value;
    var lastname = document.querySelector("#register .input-field[placeholder='Lastname']").value;
    var email = document.querySelector("#register .input-field[placeholder='Email']").value;
    var password = document.querySelector("#register .input-field[placeholder='Password']").value;
    
    // Validasi sederhana
    if (!firstname || !lastname || !email || !password) {
        alert("Silahkan lengkapi semua data registrasi!");
        return;
    }
    
    // Simulasi registrasi tanpa backend
    if (role === "admin") {
        alert("Registrasi sebagai Admin berhasil!");
        window.location.href = "dashboard_admin.html"; // Redirect ke halaman admin
    } else {
        alert("Registrasi sebagai User berhasil!");
        window.location.href = "dashboard_user.html"; // Redirect ke halaman user
    }
}