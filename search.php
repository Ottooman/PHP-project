<?php
session_start();
include "classes/db.php";
include "classes/product.php";
$products = new Product();
$list_products;
if (isset($_POST['action'])) {
    global $list_products, $products;
    $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_MAGIC_QUOTES);
    echo "Du sökte efter <strong>$search</strong><br>";
    $list_products = $products->getSearchProducts($search);
} else {
    global $list_products, $products;
    $list_products = $products->getCheapestProducts();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
<h1>Produkter</h1>

<form method="post">
    Sök:<br>
    <input type="text" name="search" placeholder="Skriv in sökord">
    <input type="submit" name="action" value="Sök">
</form>
<pre>
<?php 
print_r($list_products);
?>
</body>
</html>