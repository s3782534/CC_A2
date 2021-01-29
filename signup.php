<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Games Site</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php
$msg = "";
@$name = $_POST["name"];
@$email = $_POST["email"];
@$password = $_POST["password"];
@$cpassword = $_POST["cpassword"];
    
use Aws\CognitoIdentity\CognitoIdentityClient;

$client = CognitoIdentityClient::factory(array(
    'region'   => 'us-east-1',
    'version'  => 'latest'
));

if (isset($name)){
    if (strpos($email,"@") === false){ //checking if email has @ to prevent unvalid emails
        $msg .= "Enter a valid email! <br />";
    }
    if (strlen($password) < 7){
        $msg .= "Password must be at least 7 letters long! <br />";
    } elseif ($password != $cpassword) {
        $msg .= "Passwords not matching! <br />";
    }
    if ($msg == ""){
        
    }
}
?>
<body>
    <header>
        <h3>Whack</h3>
        <a href="login.html">Log In</a>
    </header>

    <div class="center">
        <h2>Create an account!</h2>
        <form method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="name"></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email"></td>
                </tr>

                <tr>
                    <td>Password* </td>
                    <td><input type="password" name="password"></td>
                </tr>

                <tr>
                    <td>Confirm Password</td>
                    <td><input type="password" name="cpassword"></td>
                </tr>
                <tr>
                    <td><button type="submit">Log In</button></td>
                </tr>


            </table>
        </form>
        *Password must be at least 7 letters long <br />
        <?php echo $msg ?>
    </div>
    <footer>
        <h4>whack</h4>
    </footer>
</body>
</html>
