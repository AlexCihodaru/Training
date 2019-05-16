<?php
session_start();
require_once 'config.php';
require_once 'common.php';
$connection = new Dbh;
$connection->connect();

?>

<?php
    array_push($_SESSION['cart'],$_GET['data']);
class user extends Dbh
{
    public function getUsers()
    {   $placeholders = str_repeat ('?, ',  count ($_SESSION['cart']) - 1) . '?';
        $stmt = $this->connect()->prepare("SELECT * FROM products WHERE id IN ($placeholders) ");
        $stmt->execute($_SESSION['cart']);


        if ($stmt->rowCount()):
            while ($row = $stmt->fetch()):
                ?>
                <br>
                <img src="<?php echo "Images/"; echo $row['id']; echo ".jpg" ?>" alt="phone" height="200">
                <h3><?= $row['title'] ?> </h3>
                <h3><?= $row['description'] ?> </h3>
                <h3><?= $row['price'] ?> </h3>
                <a href="./index.php?data=<?= $row['id'] ?>">Remove from cart</a>
                <?php
            endwhile;
        endif;
    }
}
$object=new user();
$object->getUsers();
?>
<a href="index.php"> Back to shop </a>
