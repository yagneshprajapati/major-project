<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <section class="login-container">
        <div class="background-img"></div>
        <div class="login-form">
            <h3 class="form-title">Login</h3>
            <form id="loginForm">
                <div class="form-group">
                    <label for="username" class="label">Username:</label>
                    <input type="text" class="form-control" id="username" placeholder="Enter your username" required>
                </div>
                <div class="form-group password-toggle">
                    <label for="password" class="label">Password:</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" placeholder="Enter your password" required>
                        <div class="toggle-password" onclick="togglePassword()">👁️</div>
                    </div>
                </div>
                <div class="form-group">
                    <a href="#" class="forgot-password-link" onclick="forgotPassword()">Forgot Password?</a>
                </div>
                <div class="btn-group">
                    <button type="submit" class="btn btn-success">Login</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
                <div class="form-group">
                    <p class="signup-text">Don't have an account? <a href="signup_page.html" class="signup-link">Sign Up</a></p>
                </div>
            </form>
        </div>
    </section>
    <script src="script.js"></script>
</body>
</html>