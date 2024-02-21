<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="./style/login.css"> -->
    <style>
        body {
            /* Add background image */
            background-image: url('');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .body1 {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .container1 {
            margin-left: 40px;
        }

        .lab {
            font-weight: bolder;

        }

        .card-title1  {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            font-weight: bolder;
            color: brown;
            font-style: italic;
        }

        .grp {
            margin-bottom: 20px;
        }

        .password-toggle1 {
            position: relative;
        }

        .password-toggle1 input {
            padding-right: 30px;
        }
        .toggle-password1 {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #007bff;
        }

        .btn-group1 {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .block1 {
            margin-top: 10px;
        }

        .link1:hover {
            text-decoration: underline;
        }

        .img {
            border: 2px solid brown;
        }
    </style>
</head>

<body class="body1">
    <section class="vh-100">
        <div class="container py-5 h-100 container1">
            <div class="row d-flex align-items-center justify-content-center h-100 ">
                <div class="col-md-8 col-lg-7 col-xl-6 ">
                    <img src="./img/login.png" class="img-fluid" alt="Phone image">
                </div>
                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <h3 class="card-title text-center mb-4 card-title1">Login Page</h3>
                    <form id="loginForm">
                        <div class="form-group grp">
                            <label for="username" class="lab">Username:</label>
                            <input type="text" class="form-control" id="username" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group grp password-toggle password-toggle1">
                            <label for="password" class="lab">Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                                <div class="toggle-password toggle-password1 " onclick="togglePassword()">👁️</div>
                            </div>
                        </div>
                        <div class="form-group grp">
                            <a href="#" class="link" onclick="forgotPassword()">Forgot Password?</a>
                        </div>
                        <div class="btn-group btn-group1" style="border-radius: 20px;">
                            <button type="submit" class="form-control btn btn-success btn-block block1 ">Login</button>
                            <button type="reset" class="form-control btn btn-danger btn-block block1">Reset</button>
                        </div>
                        <div class="form-group grp mt-3 text-center">
                            <p class="mb-0">Don't have an account? <a href="signup_page.html" class="link link1">Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <script>
        function togglePassword() {
            var passwordInput = document.getElementById("password");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }

        function forgotPassword() {
            var username = document.getElementById("username").value;

            if (username.trim() === "") {
                alert("Please enter your username.");
                return;
            }

            alert("Password reset instructions sent to your email.");
        }
    </script>
</body>

</html>