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
    
$gameName = $_GET["game"];

$params = [
    'TableName' => "html5_games",
    'Key' => [
        'name' => [
            'S' => $gameName,
        ],
    ]
];
try {
    $result = $dynamodb->getItem($params);
    $tables = $dynamodb->listTables();



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
    <div class="center">
        <?php echo $gameName ?>
        <iframe src="<?= $result['Item']['game_url']['S'] ?>" frameborder="0" scrolling="no"></iframe>
    </div>
    <footer>
        <h4>whack</h4>
        <h4><?= $tables ?></h4>
    </footer>
</body>
</html>
