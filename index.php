<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generic Games Site</title>
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
            'S' => "2048",
        ],
    ]
];
try {
    $result = $dynamodb->getItem($params);


} catch (Exception $e) {
    echo "Unable to get item:\n";
    echo $e->getMessage() + "\n";
}
    
?>
<body>
    <header>
        <h3><a href="index.php">Whack</a></h3>
        Log In
    </header>
    <h2><a href="game.php?game=2048">New Games</a></h2>
    <hr>
    <table>
        <tr>
            <th>Title</th>
            <th>Icon</th>
        </tr>
        <?php
        
            foreach ($result as &$value) {
                echo $value;
            }
        ?>
        <tr>
            <td>Game 1</td>
            <td>icon.png</td>
        </tr>
        <tr>
            <td>Game 2</td>
            <td>icon.png</td>
        </tr>
    </table>
    <a><-</a>  1/1  <a>-></a>
    <hr>
    <br />
    <h2>Hot Games</h2>
    <hr>
    <table>
    </tr>
    <tr>
        <td>Game 1</td>
        <td>icon.png</td>
    </tr>
    <tr>
        <td>Game 2</td>
        <td>icon.png</td>
    </tr>
    </table>
    <hr>

    <footer>
        <h4>whack</h4>
    </footer>
</body>
</html>
