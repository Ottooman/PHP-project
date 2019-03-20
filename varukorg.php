<?php

$dbresult = [
    30 => [
        'title' => '1939 Chevrolet Deluxe Coupe',
        'price' => 2000,
    ],
    35 => [
        'title' => '2002 Suzuki XREO',
        'price' => 3000,
    ],
    40 => [
        'title' => '1996 Moto Guzzi 1100i',
        'price' => 4000,
    ]
];

$cart = [];

if(isset($_COOKIE["cart"])) {
    $cart = unserialize($_COOKIE["cart"])   ;
}

if (isset($_POST['buy'])) {
    echo "Användaren lägger till produkter i varukorgen.";
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    $cart_item = [
        'id' => $_POST['productid'],
        'noOfItems' => $_POST['noOfProducts']
    ];

    array_push($cart, $cart_item);

    setcookie("cart", serialize($cart), time()+3600);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Varukorg</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    
    <style>
        .cart {
            width: 500px;
        }
        .button {
            border: none;
            color: white;
            padding: 5px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 10px;
            margin: 2px 2px;
            cursor: pointer;
            background-color: black;   
            border-radius: 10px;
        }

        .varukorg {
            font-size: 25px;
        }

        .information {
            font-weight:bold;
        }

    </style>
    <script src="main.js"></script>
</head>
<body>
    <div class="cart">
        <strong class="varukorg">Varukorg</strong><br><br>
        <table>
            <tr>
                <th>Produkt</th>
                <th>Pris</th>
                <th>Antal</th>
                <th>Summa</th>
            </tr>
            <?php $sum = 0; ?>
            <?php foreach($cart as $cart_item): ?>
            <?php
                  $product_id = $cart_item['id'];
                  $rowsum = $dbresult[$product_id]['price'] * $cart_item['noOfItems'];
                  $sum += $rowsum;
             ?>
            <tr class="cartitem">
                <td><?php echo $dbresult[$product_id]['title']; ?></td>
                <td><?php echo $dbresult[$product_id]['price']; ?></td>
                <td><?php echo $cart_item['noOfItems']; ?></td>
                <td><?php echo $rowsum; ?></td>
            </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3">Summa:</td>
                <td><?php echo $sum; ?></td>
            </tr>
        </table>
    </div>
    <form method="post">
        <div class="product">
            <tr>
            <span class="information">Information:</span>
            </tr>
            <span class="description">Classicmodels produkter.</span><br>
            <input type="text" name="productid" value="30">
            <input type="number" name="noOfProducts" value="1">
            <input class="button" type="submit" name="buy" value="Lägg till i korgen">
        </div>
    
    </form>
</body>
</html>