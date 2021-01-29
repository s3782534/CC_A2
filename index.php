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
    
@$jwt = $_GET["id_token"];
    
if (isset($jwt)){
    #One liner decoding JWT token taken from
    #
    #development, C., Maintenance, S. and Tokens), P., 2021. PHP One-Liner To Decode JWT (JSON Web Tokens) | 2019. [online] 
    #Convertica eCommerce & membership website development. Available at: <https://www.converticacommerce.com/support-maintenance/security/php-one-liner-decode-jwt-json-web-tokens/> [Accessed 29 January 2021].
    $jwt = json_decode(base64_decode(str_replace('_', '/', str_replace('-','+',explode('.', $jwt)[1]))));
    
    print_r($jwt);
    echo "<br />";
    echo $_SERVER["SCRIPT_URI"];
}
   

    
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

    <footer>
        <h4>whack</h4>
    </footer>
</body>
</html>
