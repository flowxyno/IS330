<!DOCTYPE html>
<html>
<head>
    <title>Series Trackers</title>
</head>
<body>

    <?php
    // Include the database connection code
    include "db_connection.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $selectedUserID = $_POST['user'];

        //queries that DB  for all of the column data in reference to the passed in userID
        $usernamequery = "SELECT * FROM users
        WHERE userID= $selectedUserID";

        $stmt = $conn->prepare($usernamequery);

        $stmt->execute();

        //Pulls the needed data out of the retrieved query data
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $username = $row['firstName'];

        //displays the querried data in the location that you wanted
        echo "<h1>Series Trackers for $username</h1>";

        // Fetch series trackers for the selected user
        $query = "SELECT series.seriesName, episodes.episodeTitle, seriesTrackers.lastWatched
                  FROM seriesTrackers
                  INNER JOIN series ON seriesTrackers.seriesID = series.seriesID
                  INNER JOIN episodes ON seriesTrackers.episodeID = episodes.episodeID
                  WHERE seriesTrackers.userID = :selectedUserID";

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':selectedUserID', $selectedUserID, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<ul>";
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<li>{$row['seriesName']} - {$row['episodeTitle']} (Last Watched: {$row['lastWatched']})</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No series trackers found for the selected user.</p>";
        }
    } else {
        echo "<p>Please select a user from the dropdown.</p>";
    }
    ?>
</body>
</html>