<nav>
    <ul>
        <li><a href="index.php">All listed</a></li>
        <?php
          if (isset($_SESSION["isloggedin"])) {
              echo "<li><a href='add_product.php'>List</a></li>";
              echo "<li><a href='my_products.php'>My list</a></li>";
              echo '<li><a href="">Sold</a></li>';
              echo '<li><a href="">Bought</a></li>';
              echo "<li><a href='logout.php'>Logout</a></li>";
          } else {
              echo "<li><a href='login.php'>Login</a></li>";
          }
        ?>
    </ul>
</nav>
