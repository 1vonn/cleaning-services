<?php
// Connection to database
$database = "client";
$servername = "localhost";
$password = "";
$username = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $Full_Name = $_POST['name'];
    $Email = $_POST['email'];
    $Phone = $_POST['phone'];
    $Service = $_POST['service'];
    $Select_service_providers = $_POST['service_provider'];

    // Prepare SQL statement to insert data into the order_form table
    $stmt = $conn->prepare("INSERT INTO order_form (full_name, email, phone, service, service_provider) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $Full_Name, $Email, $Phone, $Service, $Select_service_providers);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <a href="index.html">Home</a>
            <a href="contact.php">Contact us</a>
            <a href="admin/login.php">Admin </a>
        </nav>
        <section class="hero">
            <div class="hero-content">
                <h1>Welcome to my website:</h1>
                <h2>House Cleaning and Dish Washing Services</h2>
                <h3>Quality services, Quality life</h3>
            </div>
        </section>
        <section id="order">
            <h2>Order Service</h2>
            <form id="order-form" method="post" action="contact.php">
                <label for="fName">Full Name:</label>
                <input type="text" id="fName" name="name" required><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" required><br><br>

                <label for="service">Select Service:</label>
                <select id="service" name="service" required>
                    <option value="">Select Service</option>
                    <option value="House Cleaning">House Cleaning</option>
                    <option value="Dish Washing">Dish Washing</option>
                </select><br><br>

                <label for="service_provider">Select Service Provider:</label>
                <select id="service_provider" name="service_provider" required>
                    <option value="">Select Service Provider</option>
                    <option value="Real Sisters House Cleaning Services">Real Sisters House Cleaning Services</option>
                    <option value="Havan House Cleaning Services">Havan House Cleaning Services</option>
                    <option value="Urban House Cleaning Services">Urban House Cleaning Services</option>
                    <option value="Dish Cleaning Service Providers">Dish Cleaning Service Providers</option>
                    <option value="Steel Dish Washing Services">Steel Dish Washing Services</option>
                    <option value="Real Brothers Dish Washing Services">Real Brothers Dish Washing Services</option>
                </select><br><br>

                <button type="submit">Submit Order</button>
            </form>
        </section>
    </header>
</body>
<script type="module" src="/main.js"></script>
<footer>
    <p>&copy; 2024 House Cleaning and Dish Washing Service Website</p>
</footer>
</html>
