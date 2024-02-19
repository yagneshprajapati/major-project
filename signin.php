<!DOCTYPE html>

<html lang="en"><head>
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
    
<link rel="stylesheet" href="./style/index.css">

</head>
<body>

<?php include('includes/nav.php'); ?>

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


   
    <?php include('includes/footer.php'); ?>

</body></html>