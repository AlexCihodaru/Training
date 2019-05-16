<?php
session_start();
require_once 'config.php';
require_once 'common.php';
$connection = new Dbh;
$connection->connect();

?>

<?php
    array_pop($_SESSION['cart'],$_GET['data']);
    if(!isset($_SESSION['cart'])) :
        $_SESSION['cart'] = [];
    endif;
    class user extends Dbh
    {
    public function getUsers()
    {   if(empty($_SESSION['cart'])):
          $stmt = $this->connect()->query("SELECT * FROM products");
         elseif (array_count_values($_SESSION['cart'])==1):
           $stmt =  $stmt = $this->connect()->prepare("SELECT * FROM products where id!=?");
           $aux=$_SESSION['cart'][1];
           $stmt->execute([$aux]);
           else:
        $placeholders = str_repeat ('?, ',  count ($_SESSION['cart']) - 1) . '?';
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE id NOT IN ($placeholders) ");
        $stmt->execute($_SESSION['cart']);
       endif;

        if ($stmt->rowCount()):
        while ($row = $stmt->fetch()):
            ?>
            <br>
            <img src="<?php echo "Images/"; echo $row['id']; echo ".jpg" ?>" alt="phone" height="200">
        <h3><?= $row['title'] ?> </h3>
        <h3><?= $row['description'] ?> </h3>
        <h3><?= $row['price'] ?> </h3>
        <a href="./cart.php?data=<?= $row['id'] ?>">Add to cart</a>
        <?php
        //array_push($_SESSION['cart'],$row['id']);
        endwhile;
        endif;
    }
 }
   $object=new user();
   $object->getUsers();
?>
<a href="cart.php"> Go to cart </a>
