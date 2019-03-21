<?php
include 'classes/dbSearch.php';


class Listan {
    private $db;

    public function __construct() {
        $obj = New DB();
        $this->db = $obj->pdo;
    }
    public function ListaProducts() {
        $stmt = $this->db->query("SELECT DISTINCT productLine FROM products ORDER BY productLine");
        while ($row = $stmt->fetch()) {
            ?>
            <a href="?ciao=<?php echo $row['productLine']; ?>"><?php echo $row['productLine']; ?></a><br>
            <style type="text/css">
                a {
                    color: rgb(82, 60, 60);
                     text-decoration: none;
                        font-family: Felix Titling;
                            font-weight: 400;
                                font-size: 16px;
                }
            </style>
            <?php
        }
        ?><hr><?php   
}

    public function Products() {
        if (isset($_GET['ciao'])) {
            $ciao = filter_input(INPUT_GET, 'ciao', FILTER_SANITIZE_STRING);
            $stmt = $this->db->prepare("SELECT * FROM products WHERE productLine = :productLine;");
            $stmt->execute(['productLine' => $ciao]);
            while ($row = $stmt->fetch()) {
                ?>
                <a href="testlist2.php?product=<?php echo $row['productCode']; ?>"><?php echo $row['productName']; ?></a> <br>
                
                <?php
            }
        } else {
            echo "här kommer finnas products ";
        }
        
    }

    
    }

      $obj = new Listan();
      $obj->ListaProducts();
      $obj->Products();

      

      ?>
     

    

  