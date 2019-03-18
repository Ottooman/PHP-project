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
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}



$stmt = $pdo->query("SELECT DISTINCT productLine FROM products ORDER BY productLine");
while ($row = $stmt->fetch()) {
    ?>
    <a href="?ciao=<?php echo $row['productLine']; ?>"><?php echo $row['productLine']; ?></a><br>
    <?php
}
?><hr><?php



if (isset($_GET['ciao'])) {
    $ciao = filter_input(INPUT_GET, 'ciao', FILTER_SANITIZE_STRING);
    $stmt = $pdo->prepare("SELECT * FROM products WHERE productLine = :productLine;");
    $stmt->execute(['productLine' => $ciao]);
    while ($row = $stmt->fetch()) {
        ?>
        <a href="list2.php?product=<?php echo $row['productCode']; ?>"><?php echo $row['productName']; ?></a> - <?php echo $row['productLine']; ?><br>
        <?php
    }
} else {
    echo "Välj en kategori.<br>";
}

