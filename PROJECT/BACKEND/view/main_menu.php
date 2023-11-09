<?php
    require_once('util/secure_conn.php');  // require a secure connection
    require_once('util/valid_admin.php');  // require a valid admin user
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Left off: Main Menu</title>
        <link rel="stylesheet" type="text/css" href="main.css"/>
        <style>
        .container {
            display: flex;
        }
        .nav-menu {
            flex: 1;
        }
        .form-container {
            flex: 1.5;
        }
    </style>
    </head>
    <body>
        <header>
            <h1>Where did I leave off!!</h1>
        </header>
        <main>
            <div class="container"> 
                <div class="nav-menu">
                    <?php 
                        include 'util/nav_menu.php';
                    ?>
                </div>
                <div class="form-container">
                    <?php 
                    $user_name = $_SESSION['logged_in_userName'];
                    $user_ID = $_SESSION['logged_in_userID'];
                    $first_name = $_SESSION['logged_in_firstName'];

                    echo "<h1>Welcome $first_name, here are your currently viewed Series</h1>";


                    $quest = "SELECT series.seriesName, series.coverArt, episodes.episodeNumber, episodes.episodeTitle, episodes.episodeSynop, seriesTrackers.lastWatched
                    FROM seriesTrackers
                    INNER JOIN series ON seriesTrackers.seriesID = series.seriesID
                    INNER JOIN episodes ON seriesTrackers.episodeID = episodes.episodeID
                    WHERE seriesTrackers.userID = :loggedInID";

                    // Use a prepared statement to prevent SQL injection
                    $stmt = $db->prepare($quest);
                    $stmt->bindParam(':loggedInID', $user_ID);
                    $stmt->execute();

                    if ($stmt->rowCount() > 0) {
                        echo "<ul>";
                        while ($row = $stmt->fetch()) {
                            echo "<li>{$row['coverArt']} - {$row['seriesName']} (Last Watched: {$row['lastWatched']})</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "<br>";
                        echo "<p>No series trackers found for the current user.</p>";
                    }
                    ?>

                </div>
            </div>
        </main>
    </body>
</html>