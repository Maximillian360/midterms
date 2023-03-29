<?php
require_once "class1.php";

    $result = "";
    $msg ="";
    $products = array(
        new Product("Product 1", 100.00, 1.00),
        new Product("Product 2", 200.00, 3.00),
        new Product("Product 3", 375.50, 5.00),
        new Product("Product 4", 450.15, 7.00),


    );

    $name = null;
    $spendingLimit = null;
    $totalPrice = null;


    if (isset($_POST['submit'])) {
        if (isset($_POST['name']) && isset($_POST['limit']) && isset($_POST['selected-products'])) {
            $selected = $_POST['selected-products'];


            foreach ($selected as $index => $selectedIndex) {
                $product = $products[$selectedIndex];
                $selectedProducts[$index] = $product;
                $totalPrice += $product->getPrice();
            }

            $user = new User($_POST['name'], $_POST['limit'], $selectedProducts);
        }
    }



    ?>

<html lang="en-us">
    <head>
        <title>Calculator</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
              crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
                crossorigin="anonymous"></script>
    </head>
    <body>
        <form action="" method="POST">
            <div>
                Name: <input type="text" name="name" required>
            </div>
            <div>
                Spending Limit: <input type="number" name="limit" required>
            </div>
            <div>
                <?php foreach ($products as $index => $product): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="<?= $index ?>" id="flexCheckDefault"
                               name="selected-products[]"
                            <?php
                                if (isset($_POST['selected-products']) && in_array($index, $_POST['selected-products'])){
                                    echo "checked";
                                }
                            ?>
                        >
                        <label class="form-check-label" for="flexCheckDefault">
                            <?= $product ?>
                        </label>
                    </div>
                <?php endforeach ?>
            </div>
            <div>
                <input type="submit" value="Submit" name="submit">
            </div>

        </form>
        <div>
            <?php
                if (!empty($selectedProducts)){
                    $totalPrice = $user->getTotalSpending();
                    if ($totalPrice > $user->getSpendingLimit()) {
                        echo "You have exceeded your spending limit!<br>";
                        echo "Total price: $$totalPrice<br>";
                        echo "Spending limit: $" . $user->getSpendingLimit() . "<br>";
                    } else {
                        foreach ($selectedProducts as $product) echo $product . "<br>";
                        if ($totalPrice != null) echo "<br>Total price: $" . round($totalPrice, 2) . "<br>";
                        echo "Spending limit: $" . round($user->getSpendingLimit(), 2) . "<br>";
                        echo "Remaining balance: $" . round($user->getSpendingLimit() - $totalPrice, 2);
                    }
                }
            ?>
        </div>

    </body>
</html>
