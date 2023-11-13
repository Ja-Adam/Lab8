<!DOCTYPE html>
<html>
<body>

<?php
class Fruit {
  public $name;
  public $color;

  function __construct($names) {
    $this->name = $names;
  }

  function removeFruit($fruitName) {
    $index = array_search($fruitName, $this->name);
    if ($index !== false) {
      unset($this->name[$index]);
    }
  }
  function addFruit($fruitName) {
    $this->name[] = $fruitName;
  }
  function getFruits() {
    echo implode(", ", $this->name); //implode ni string element buriig taslal space hevleh bolomj ogno
    echo "\n"; // echo "<br>";

  }
}

$list1 = new Fruit(["Apple", "Banana", "Orange", "Mango", "Strawberry"]);
$list2 = new Fruit([ ]);
$list1->removeFruit("Banana");
$list2->addFruit("Banana");
$list2->getFruits();
$list1->removeFruit("Orange");
$list2->addFruit("Orange");
$list2->getFruits();
$list1->getFruits();
?>

</body>
</html>
