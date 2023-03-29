<?php
    require_once "calculator_class.php";
    $valueMsg = "";
    $sum = "";
    $dif = "";
    $pro = "";
    $quo = "";
    $opt = array("Add", "Sub", "Mul", "Div");

    if (isset($_POST['submit'])) {
        if (isset($_POST['input1']) && isset($_POST['input2'])) {
            $num1 = $_POST['input1'];
            $num2 = $_POST['input2'];

            new Calculator($num1, $num2);

            $sum = "Sum is: ". new Calculator($num1, $num2)->Add();
            $dif = "Difference is: ". new Calculator($num1, $num2)->Sub();
            $pro = "Product is: ". new Calculator($num1, $num2)->Mul();
            $quo = "Quotient is: ". new Calculator($num1, $num2)->Div();

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
                Input 1: <input type="number" name="input1">
                Input 2: <input type="number" name="input2">

            </div>
            <div>
                <input type="submit" value="Submit" name="submit">
            </div>

        </form>
    </body>
</html>
