<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $dsn = 'mysql:host=localhost;dbname=demo';
    $username = 'root';
    $password = '';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        echo "There was an error";
        exit();
    }

    // Get values from the form
    $id = $_POST["id"];
    $name = $_POST["name"];
    $class = $_POST["class"];
    $captain = $_POST["captain"];
    $first_launch = $_POST["first_launch"];

    // SQL query to insert a new Starship record into the database
    $sql = "INSERT INTO starships (ID, Name, Class, Captain, FirstLaunch)
            VALUES (".$id.", '".$name."', '".$class."', '".$captain."', '".$first_launch."')";

    // Prepare and execute the SQL statement
    $stmt = $db->prepare($sql);
    //$stmt->bind_param("issss", $id, $name, $class, $captain, $first_launch);
    
    if ($stmt->execute()) {
        echo "New Starship added successfully!";
    } else {
        echo "Error";
    }

} else {
    // If the form is not submitted, display an error message
    echo "Error: Form not submitted.";
}
?>
