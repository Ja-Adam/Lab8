<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropdown Item Exchange</title>
    <style>
        select {
            width: 150px;
            margin: 10px;
            height: 150px;
        }

        button {
            display: block;
            background-color: #C0C0C0;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <?php
    session_start();

    $list1 = ['Алим', 'Гадил', 'Жүрж', 'Тарвас', 'Манго'];
    $list2 = isset($_SESSION['list2']) ? $_SESSION['list2'] : [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['moveToSecond'])) {  // 2дох хүснэгтрүү шилжүүлнэ
            $selectedItems = isset($_POST['list1Items']) ? $_POST['list1Items'] : [];
            foreach ($selectedItems as $item) {
                $index = array_search($item, $list1);
                if ($index !== false) {
                    array_splice($list1, $index,$index+1);  // Дарагдсан хүснэгтийн утга хасна
                    $list2[] = $item;
                }
            }
        } elseif (isset($_POST['moveToFirst'])) {   // Эхний хүснэгтрүү шилжүүлнэ
            $selectedItems = isset($_POST['list2Items']) ? $_POST['list2Items'] : [];
            foreach ($selectedItems as $item) {
                $index = array_search($item, $list2);
                if ($index !== false) {
                    array_splice($list2, $index,$index+1);  // Хүснэгтдэх утга хасна 
                    $list1[] = $item;
                }
            }
        }

        $_SESSION['list2'] = $list2;
    }
    ?>

    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <select id="list1" name="list1Items[]" multiple>
            <?php
            foreach ($list1 as $item) {
                echo '<option value="' . $item . '">' . $item . '</option>';
            }
            ?>
        </select>

        <button type="submit" name="moveToSecond">Хоёрдох хүснэгтрүү шилжүүлнэ</button>
        <button type="submit" name="moveToFirst">Эхний хүснэгтрүү шилжүүлнэ</button>

        <select id="list2" name="list2Items[]" multiple>
            <?php
            foreach ($list2 as $item) {
                echo '<option value="' . $item . '">' . $item . '</option>';
            }
            ?>
        </select>
    </form>

</body>

</html>
