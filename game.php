<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game - Generic Games Site</title>
    <link rel="stylesheet" href="style.css">
</head>
<?php

require 'vendor/autoload.php';

use Aws\DynamoDb\Exception\DynamoDbException;
use Aws\DynamoDb\Marshaler;

$sdk = new Aws\Sdk([
    'endpoint'   => 'http://localhost:8000',
    'region'   => 'us-west-2',
    'version'  => 'latest'
]);

?>
<body>
    <header>
        <h3>Whack</h3>
        Log In
    </header>
        <table class="gameTable">
            <tr>
                <th>title</th>
            </tr>
            <tr>
                <td><iframe src="https://s3782534-cca2-html5-games.s3.us-east-1.amazonaws.com/2048/index.html" frameborder="0" scrolling="no"></iframe></td>
                <td class="top yellow">
                    Reccomended Games
                    <hr>
                    <ul>
                        <li>another game</li>
                        <li>lorem ipsum</li>
                    </ul>
                    
                </td>
            </tr>
        </table>
    <footer>
        <h4>whack</h4>
    </footer>
</body>
</html>