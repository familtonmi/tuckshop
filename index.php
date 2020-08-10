<?php
$con = mysqli_connect("localhost", "familtonmi", 'quietfruit45', "familtonmi_cafe1");
if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL:".mysqli_connect_error(); die();}
else {
    echo "connected to database";
}

/* Drinks Query */
/* SELECT DrinkID, Item FROM drinks */
$all_drinks_query = "SELECT drinkID,Item FROM drinks";
$all_orders_query = "SELECT orderID FROM orders ORDER BY orderID ASC";
$all_drinks_results = mysqli_query($con, $all_drinks_query);
$all_orders_result = mysqli_query($con, $all_orders_query);
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
    <!-- DRINKS FORM -->
    <form name='drinks_form' id='drinks_form' method='get' action='drinks.php'>
        <select id='drink' name='drink'>
            <!-- options -->
            <?php
            while($all_drinks_record = mysqli_fetch_assoc($all_drinks_results)){
                echo "<option value = '".$all_drinks_record['drinkID']."'>";
                echo $all_drinks_record['Item'];
                echo "</option>";
            }
            ?>
        </select>
        <input type='submit' name='drinks_button' value='Show me the drink information.'>
    </form>


    <form name='orders_form' id='orders_form' method='get' action='orders.php'>
        <select id='order' name='order'>
            <!-- options -->
            <?php
            while($all_orders_record = mysqli_fetch_assoc($all_orders_result)){
                echo "<option value = '".$all_orders_record['orderID']."'>";
                echo $all_orders_record['orderID'];
                echo "</option>";
            }
            ?>
        </select>
        <input type='submit' name='orders_button' value='Show me the order information.'>
    </form>
</main>
</body>

</html>