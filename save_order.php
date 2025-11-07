<?php
$connection = new mysqli("localhost", "root", "", "powerpulse");

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$quantity = $_POST['quantity'];
$base = $_POST['base'];
$flavors = isset($_POST['flavors']) ? implode(", ", $_POST['flavors']) : '';
$boosters = isset($_POST['boosters']) ? implode(", ", $_POST['boosters']) : '';
$electrolytes = isset($_POST['electrolytes']) ? implode(", ", $_POST['electrolytes']) : '';
$sweeteners = isset($_POST['sweeteners']) ? implode(", ", $_POST['sweeteners']) : '';
$extras = isset($_POST['extras']) ? implode(", ", $_POST['extras']) : '';
$payment = $_POST['payment'];
$total_price = $_POST['totalPrice'];

$sql = "INSERT INTO orders (name, email, phone, quantity, base, flavors, boosters, electrolytes, sweeteners, extras, payment, total_price)
        VALUES ('$name', '$email', '$phone', '$quantity', '$base', '$flavors', '$boosters', '$electrolytes', '$sweeteners', '$extras', '$payment', '$total_price')";

if ($connection->query($sql) === TRUE) {
    echo "Order opgeslagen! Dank je wel.";
} else {
    echo "Error: " . $connection->error;
}

$connection->close();
?>
