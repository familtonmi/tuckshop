<?php
$con = mysqli_connect("localhost", "familtonmi", 'quietfruit45', "familtonmi_cafe1");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL:" . mysqli_connect_error();
    die();
} else {
    echo "connected to database";
}
if (isset($_GET['drink'])) {
    $id = $_GET['drink'];
} else {
    $id = 1;
}

$this_drink_query = "SELECT Item, Cost FROM drinks WHERE drinkID = '" . $id . "'";
$this_drink_result = mysqli_query($con, $this_drink_query);
$this_drink_record = mysqli_fetch_assoc($this_drink_result);
/* Drinks Query */
/* SELECT DrinkID, Item FROM drinks */
$all_drinks_query = "SELECT drinkID,Item FROM drinks";
$all_drinks_results = mysqli_query($con, $all_drinks_query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Coffee Time</title>
    <meta charset="utf-8">
    <link rel='stylesheet' type='text/css' href='style.css'>
</head>

<body>
<header>
    <h1> Coffee Time </h1>
    <nav>
        <ul>
            <li> <a href='index.php'> Home </a> </li>
            <li> <a href='drinks_menu.php'> Drinks </a> </li>
            <li> <a href='food_menu.php'> Food </a> </li>
            <li> <a href='meal_menu.php'> Meals </a> </li>
        </ul>
    </nav>
</header>
<main>
    <h2> Drink Time Information </h2>
    <?php
    echo "<p> Drink Name: " . $this_drink_record['Item'] . "<br>";
    echo "<p> Cost: " . $this_drink_record['Cost'] . "<br>";
    ?>
    <h2> Select Another Drink </h2>
    <!-- DRINKS FORM -->
    <form name='drinks_form' id='drinks_form' method='get' action='drinks.php'>
        <select id='drink' name='drink'>
            <!-- options -->
            <?php
            while ($all_drinks_record = mysqli_fetch_assoc($all_drinks_results)) {
                echo "<option value = '" . $all_drinks_record['drinkID'] . "'>";
                echo $all_drinks_record['Item'];
                echo "</option>";
            }
            ?>
        </select>
        <input type='submit' name='drinks_button' value='Show me the drink information.'>
    </form>
</main>
</body>
</html>
