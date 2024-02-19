<!DOCTYPE html>
<!-- saved from url=(0046)http://127.0.0.1:3000/index.html#flightbooking -->
<html lang="en"><head><script type="text/javascript" src="/___vscode_livepreview_injected_script"></script><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><script type="text/javascript" src="./aas_files/___vscode_livepreview_injected_script"></script><script type="text/javascript" src="./aas_files/___vscode_livepreview_injected_script"></script><script type="text/javascript" src="./aas_files/___vscode_livepreview_injected_script"></script><script type="text/javascript" src="./aas_files/___vscode_livepreview_injected_script"></script>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <style>
        /* Colors */
        :root {
            --light-background: #f8f8f8;
            --dark-text: #333;
            --header-background: #fff;
            --transparent-nav-background: transparent;
            --nav-text: #333;
            --nav-hover-background: #ddd;
            --logo-background: #fff;
            --logo-text: #4285f4;
            --logo-span: #db4437;
            --footer-background: #333;
            --footer-text: #fff;

            /* Button Styles */
            --btn-fill-background: #db4437;
            --btn-empty-background: #FFF;
            --btn-border-radius: 15px;
            --btn-padding: 12px;
            --btn-transition-duration: 700ms;
        }

        body {
            font-family: 'Baloo Bhai', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: var(--light-background);
            color: var(--dark-text);
        }

        header {
            color: var(--dark-text);
            padding: 20px;
            text-align: center;
            background-color: var(--header-background);
        }

        nav {
            overflow: hidden;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--transparent-nav-background);
            padding: 10px 20px;
        }

        nav a {
            color: var(--nav-text);
            text-align: center;
            padding: 0px 18px 16px 0px;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }

        nav a:hover {
            background-color: var(--nav-hover-background);
        }

        .right-navbar {
            display: flex;
            align-items: center;
        }

        .logo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--logo-background);
            border-radius: 8px;
            margin-bottom: 0px;
        }

        .logo h1 {
            margin: 0;
            color: var(--logo-text);
            font-size: 24px;
            letter-spacing: 1px;
        }

        .logo span {
            color: var(--logo-span);
            font-size: 18px;
        }

        .sign-links {
            display: flex;
            gap: 10px;
        }

        .categories {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
        }

        .category {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 10px;
            width: 100%;
            max-width: 300px;
            background-color: #fff;
        }

        .category img {
            width: 100%;
            height: auto;
        }

        .category-content {
            padding: 15px;
        }

        .footer {
            background-color: var(--footer-background);
            color: var(--footer-text);
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Button Styles */
        .fill-btn,
        .empty-btn {
            border-radius: var(--btn-border-radius);
            overflow: hidden;
            display: inline-block;
            padding: var(--btn-padding);
            text-decoration: none;
            color: white;
            transition: background-color var(--btn-transition-duration) linear;
        }

        .fill-btn {
            background: var(--btn-fill-background);
        }

        .empty-btn {
            color: black;
            background: var(--btn-empty-background);
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>shop<span>flix</span></h1>
            <div class="right-navbar">
                <div class="sign-links">
                    <a href="http://127.0.0.1:3000/index.html#signin" class="empty-btn">Sign In</a>
                    <a href="http://127.0.0.1:3000/index.html#signup" class="fill-btn">Sign Up</a>
                </div>
            </div>
        </div>
        
    </header>


    <nav>
            <div class="left-navbar">
                <a href="http://127.0.0.1:3000/index.html#ecommerce">Furniture</a>
                <a href="http://127.0.0.1:3000/index.html#minitv">Gym</a>
                <a href="http://127.0.0.1:3000/index.html#flightbooking">Electronics</a>
                      <a href="http://127.0.0.1:3000/index.html#flightbooking">Flights</a>
                      <a href="http://127.0.0.1:3000/index.html#flightbooking">Songs or any</a>
            </div>
        </nav><style>
        body {
            font-family: 'Baloo Bhai', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        .sign-in-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #4285f4;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #357ae8;
        }
    </style>

    <div class="sign-in-container">
        <h2>Sign In</h2>
        <form>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required="">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required="">
            </div>
            <button type="submit">Sign In</button>
        </form>
    </div>


    <div class="footer">
        © 2024 Your Website. All rights reserved.
    </div>


</body></html>