<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market Place</title>
    <link rel="stylesheet" href="flexible.css" />
</head>

<body>
    <div class="row">
        <header class='col-12'>
            <h1>Online Market</h1>
        </header>
    </div>
    <div class="row">
        <div class="col-2">
            <?php
              require_once 'nav.php';
            ?>
        </div>
        <div class="col-8">
            <h1>All Products</h1>

            <?php

            require_once 'dbConnect.php';

            $query = "SELECT
                  products.id,
                  products.name,
                  products.price,
                  products.description,
                  products.image_path,
                  users.email,
                  products.seller,
                  products.timestamp
              FROM products
              JOIN users ON products.seller = users.id ORDER BY products.timestamp DESC";

            $stmt = $conn->prepare($query);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $products = $result->fetch_all(MYSQLI_ASSOC);

                foreach ($products as $product) {
                    echo '<div class="row product">';
                    echo '<div class="col-4 product_image">';
                    echo '<div class="image_container">';
                    echo '<img src="' . $product['image_path'] . '" alt="Product Image">';
                    echo '</div>';
                    echo '</div>';
                    echo '<div class="col-6">';
                    echo '<h2>' . $product['name'] . '</h2>';
                    echo '<p>Description: ' . $product['description'] . '</p>';
                    echo '<p>Seller: ' . $product['email'] . '</p>';
                    echo '<p>Price: K' . $product['price'] . '</p>';
                    if (isset($_SESSION['user_id'])) {
                        if ($product['seller'] == $_SESSION['user_id']) {
                            $_SESSION['product_id'] = $product['id'];
                            echo '<a href="update_product.php?id=' . $product['id'] . '">Update </a>';
                            echo "<br>";
                            echo '<a href="delete_product.php?id=' . $product['id']. '">Unlist</a>';
                        }
                    }
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "No Products available";
            }

            $stmt->close();
            $conn->close();
            ?>
        </div>
        <div class="col-2"></div>
    </div>
</body>

</html>
