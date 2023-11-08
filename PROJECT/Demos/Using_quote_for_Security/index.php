<?php

?>

Hello

<?php

    $dsn = 'mysql:host=localhost;dbname=demo';

    $username = 'root';

    $password = '';

    try {

        $db = new PDO($dsn, $username, $password);

    } catch (PDOException $e) {

        echo "There was an error";

        exit();

    }

    // Prepare the SQL statement for execution

    $stmt = $db->prepare("SELECT * FROM Starships");

    

    // Execute the prepared statement

    $stmt->execute();

    // Fetch all of the remaining rows in the result set and display them

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        echo "ID: " . $row['ID'] . "<br>";

        echo "Name: " . $row['Name'] . "<br>";

        echo "Class: " . $row['Class'] . "<br>";

        echo "Captain: " . $row['Captain'] . "<br>";

        echo "First Launch: " . $row['FirstLaunch'] . "<br><br>";

    }

?>

<form action="insert_starship.php" method="POST">
        <label for="id">ID:</label>
        <input type="number" id="id" name="id" required><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="class">Class:</label>
        <input type="text" id="class" name="class" required><br><br>

        <label for="captain">Captain:</label>
        <input type="text" id="captain" name="captain" required><br><br>

        <label for="first_launch">First Launch:</label>
        <input type="date" id="first_launch" name="first_launch" required><br><br>

        <input type="submit" value="Add Starship">
    </form>

It Worked!!!