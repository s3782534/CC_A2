<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Games Site</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
@$name = $_POST["name"];
@$password = $_POST["password"];

if (isset($name)){
    
}



?>
<body>
    <header>
        <h3>Whack</h3>
        Log In
    </header>

    <div class="center">
        <h2>Log In</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td><button type="submit">Log In</button></td>
                </tr>


            </table>
        </form>
        <a href="signup.html">Sign Up</a>
    </div>
    <footer>
        <h4>whack</h4>
    </footer>
</body>
</html>