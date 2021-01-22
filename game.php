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

$sdk = new Aws\Sdk([
    'region'   => 'us-east-1',
    'version'  => 'latest'
]);

$dynamodb = $sdk->createDynamoDb();

$params = [
    'TableName' => "html5_games",
    'Key' => [
        'name' => [
            'S' => '2048',
        ],
    ]
];
try {
    $result = $dynamodb->listTables();



} catch (Exception $e) {
    echo "Unable to get item:\n";
}



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
                <?php 
                
echo $result;
                ?>
                <td><iframe src="<?= $result['Item']['game_url']['S'] ?>" frameborder="0" scrolling="no"></iframe></td>
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
