<html>

<head>
    <title>Temperature Conversion</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
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
            margin: 10px 0;
            padding: 8px;
            width: 80%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        h2 {
            color: #333;
        }

    </style>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <h2>Temperature Conversion</h2>
        Fahrenheit temperature:
        <input type="text" name="fahrenheit" value="<?php echo isset($_POST['fahrenheit']) ? htmlspecialchars($_POST['fahrenheit']) : ''; ?>" />
        <input type="submit" name="toCelsius" value="Convert to Celsius" />
        <br/>
        Celsius temperature:
        <input type="text" name="celsius" value="<?php echo isset($_POST['celsius']) ? htmlspecialchars($_POST['celsius']) : ''; ?>" />
        <input type="submit" name="toFahrenheit" value="Convert to Fahrenheit" />
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['toCelsius'])) {
            $fahrenheit = $_POST['fahrenheit'];
            $celsius = ($fahrenheit - 32) * 5 / 9;
            printf("%.2fF is %.2fC", $fahrenheit, $celsius);
        } elseif (isset($_POST['toFahrenheit'])) {
            $celsius = $_POST['celsius'];
            $fahrenheit = ($celsius * 9 / 5) + 32;
            printf("%.2fC is %.2fF", $celsius, $fahrenheit);
        }
    }
    ?>
</body>

</html>
