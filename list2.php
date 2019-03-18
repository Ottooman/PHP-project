<pre>
<?php
$host  = 'localhost';
$db    = 'classicmodels';
$user  = 'root';
$pass  = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    print_r($e);
    // throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
if (isset($_GET['product'])) {
    $product_code = filter_input(INPUT_GET, 'product', FILTER_SANITIZE_STRING);
    $stmt = $pdo->query("SELECT * FROM products WHERE productCode = '$product_code';");
    if ($row = $stmt->fetch()) {
        print_r($row);
        echo $row['productName'] . " - " . $row['productLine'] . "<br>";
    } else {
        echo 'Det finns ingen sån produkt.<br>';
    }
} else {
    echo "Ingen produkt vald.<br>";
}