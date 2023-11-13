<html>

<?php
$var = true;
?>

<head>
    <title>Temperature Conversion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        input[type="text"],
        input[type="submit"] {
            margin-bottom: 10px;
            padding: 8px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .display {
            padding: 10px;
            font-weight: bold;
            border-radius: 10px;
            background-color: #3a4452;
            width: 75%;
        }
    </style>
</head>

<body>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['toCelsius'])) {
            $fahrenheit = $_POST['temperature'];
            $celsius = ($fahrenheit - 32) * 5 / 9;
            printf("<p>%.2fF is %.2fC</p>", $fahrenheit, $celsius);
        } elseif (isset($_POST['toFahrenheit'])) {
            $celsius = $_POST['temperature'];
            $fahrenheit = ($celsius * 9 / 5) + 32;
            printf("<p>%.2fC is %.2fF</p>", $celsius, $fahrenheit);
        }
        $var = !$var; // Switch the conversion type
    }
    ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <?php
        if ($var) {
            echo 'Fahrenheit temperature:';
            echo '<input type="text" name="temperature" />';
            echo '<input type="submit" name="toCelsius" value="Convert to Celsius!" />';
        } else {
            echo 'Celsius temperature:';
            echo '<input type="text" name="temperature" />';
            echo '<input type="submit" name="toFahrenheit" value="Convert to Fahrenheit!" />';
        }
        ?>
        <br />
    </form>

</body>

</html>