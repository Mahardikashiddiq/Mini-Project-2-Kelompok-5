<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{('css/login.css') }}">
    <title>Login & Registration</title>
</head>
<body>
 <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>CloudProject</p>
        </div>
        <div class="nav-button">
            <button class="btn white-btn" id="loginBtn" onclick="login()">Sign In</button>
            <button class="btn" id="registerBtn" onclick="register()">Sign Up</button>
        </div>
        <div class="nav-menu-btn">
            <i class="bx bx-menu" onclick="myMenuFunction()"></i>
        </div>
    </nav>

    <div class="form-box">
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>
            <div class="role-selector">
                <p>Login as:</p>
                <div class="role-buttons">
                    <button type="button" class="role-btn active" id="userLoginBtn" onclick="selectRole('user', 'login')">User</button>
                    <button type="button" class="role-btn" id="adminLoginBtn" onclick="selectRole('admin', 'login')">Admin</button>
                </div>
                <input type="hidden" id="loginRole" value="user">
            </div>
            <div class="input-box">
                <input type="text" class="input-field" placeholder="Username or Email">
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Sign In" onclick="handleLogin()">
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="login-check">
                    <label for="login-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>

        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <div class="role-selector">
                <p>Sign Up:</p>
                <div class="role-buttons">
                    <button type="button" class="role-btn active" id="userRegisterBtn" onclick="selectRole('user', 'register')">User</button>
                    <button type="button" class="role-btn" id="adminRegisterBtn" onclick="selectRole('admin', 'register')">Admin</button>
                </div>
                <input type="hidden" id="registerRole" value="user">
            </div>

            <div class="input-box">
                <input type="text" class="input-field" placeholder="Email">
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" placeholder="Password">
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="submit" class="submit" value="Register" onclick="handleRegister()">
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="register-check">
                    <label for="register-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Terms & conditions</a></label>
                </div>
            </div>
        </div>
    </div>
</div>   

<script>
    var adminRoute = "{{ route('admin') }}";
    var userRoute = "{{ route('user') }}";
</script>

<script src="{{ asset('js/login.js') }}"></script>

</body>
</html>
