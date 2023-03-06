<?php
    include 'includes/class-autolaod.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta chartset='UTF-8'>
        <meta name='viewport' content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <div>
            <h4>Sign up</h4>
            <p>Don't have an account yet? Sign Up here!</p>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="user name">
                <input type="password" name="pwd" placeholder="password">
                <input type="password" name="pwdRepeat" placeholder="repeat password">
                <input type="text" name="email" placeholder="email">
                <br>
                <button type="submit" name="submit">SIGN UP</button>
            </form>
        </div>

        <div>
            <h4>Login</h4>
            <p>Don't have an account yet? Sign Up here!</p>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="uid" placeholder="user name">
                <input type="password" name="pwd" placeholder="password">
                <br>
                <button type="submit" name="submit">LOGIN</button>
            </form>
        </div>
    </body>
</html>