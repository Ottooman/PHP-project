<pre>
<?php
include 'classes/dbSearch.php';


class IndProducts {
    
        public $db;

    public function __construct() {
        $obj = New DB();
        $this->db = $obj->pdo;
    }

    public function VisaProduct() {


        if (isset($_GET['product'])) {
            $product_code = filter_input(INPUT_GET, 'product', FILTER_SANITIZE_STRING);
            $stmt = $this->db->query("SELECT * FROM products WHERE productCode = '$product_code';");
            if ($row = $stmt->fetch()) {
                print_r($row);
                echo $row['productName'] . " - " . $row['productLine'] . "<br>";
            } else {
                echo 'Det finns ingen sån produkt.<br>';
            }
        } else {
            echo "Ingen produkt vald.<br>";
        }
    }
}

$obj = new IndProducts();
$obj->VisaProduct();