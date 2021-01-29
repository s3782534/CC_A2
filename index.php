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
];
try {
    $result = $dynamodb->scan($params);


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
    <h2>New Games!</h2>
    <hr>
    <table>
        <tr>
            <th>Title</th>
        </tr>
        <?php
        
            foreach ($result["Items"] as &$value) {
                $name = $value["name"]["S"];
                
                echo "
                <tr>
                    <td><a href='game.php?game=$name' class='gameLink'>$name<br />";
                    if ($value["icon_url"]){
                        $iconSrc = $value["icon_url"]["S"];
                        echo "<img src='$iconSrc' alt='$name icon' class='icon'/></td>";
                    } else {
                        echo "Missing Icon</a></td>";
                    }
                    
                echo "</tr>";
            }
        ?>

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
