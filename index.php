<?php
    session_start();
    require_once 'config.php';


?>

<?php
    $connect=mysqli_connect(server,username,password,database);
    $querry="SELECT * FROM products";
    $result=mysqli_query($connect,"$querry");
    if(mysqli_num_rows($result) > 0)
    {
        while($row=mysqli_fetch_array($result)):
        {
            ?>
            <br>
            <img src="<?php echo $row["id"]; echo ".jpg" ?>" alt="phone" height="200">
            <h3><?php echo $row["title"] ?> </h3>
            <h3><?php echo $row["description"] ?> </h3>
            <h3><?php echo $row["price"] ?> </h3>

          <?php
        }
        endwhile;
    }
      ?>
    <a href="cart.php" > Go to cart </a>
 <?php
?>
