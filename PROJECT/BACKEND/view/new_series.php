<?php
    require_once('util/secure_conn.php');  // require a secure connection
    require_once('util/valid_admin.php');  // require a valid admin user

    if (isset($_POST['new_series'])) {
        // Database connection
        include "model/database.php";
    
        // Get user inputs from the form
        $seriesName = $_POST['seriesName'];
        $synop = $_POST['synop'];
        $coverArt = $_POST['coverArt'];
        $tagID = $_POST['tagID'];
    
        // Insert series information into the 'series' table
        $insertSeriesQuest = "INSERT INTO series (seriesName, synop, coverArt) VALUES (:seriesName, :synop, :coverArt)";
        $statement = $db->prepare($insertSeriesQuest);
        $statement->bindParam(':seriesName', $seriesName);
        $statement->bindParam(':synop', $synop);
        $statement->bindParam(':coverArt', $coverArt);

        $statement->execute();
    
            // Get the last inserted seriesID
            $seriesID = $db->lastInsertId();
    
            // Insert series and tag association into the 'seriesTags' table
            $insertSeriesTagsQuest = "INSERT INTO seriesTags (seriesID, tagID) VALUES (:seriesID, :tagID)";
            $statement = $db->prepare($insertSeriesTagsQuest);
            $statement->bindParam(':seriesID', $seriesID);
            $statement->bindParam(':tagID', $tagID);

            $statement->execute();

            echo '<script>alert("Series added successfully");</script>';
    
        // Close the database connection
        $statement->closeCursor(); 
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Left off: Insert Series</title>
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
            <h1>Left off: Insert New Series</h1>
        </header>
        <main>
            <div class="container"> 
                <div class="nav-menu">
                    <?php 
                        include 'util/nav_menu.php';
                    ?>
                </div>
                <div class="form-container">
                    <h1>New Series</h1>

                    <!-- Form to handle the users input for the series -->
                    <form action="index.php?action=show_new_series" method="post" id="new_series_form" class="aligned">

                        <label for="seriesName">Series Name:</label>
                        <input type="text" name="seriesName" required><br><br>

                        <label for="synopsis">Synopsis:</label>
                        <textarea name="synop" rows="4" cols="50" required></textarea><br><br>

                        <label for="coverArt">Cover Art URL:</label>
                        <input type="text" name="coverArt" required><br><br>

                        <label for="tagID">Select Tag:</label>
                        <select name="tagID" required>
                            <option value=""></option>
                            <?php
                            // Establish database connection
                            include "model/database.php";

                            // Retrieve tag data
                            $tagQuest = "SELECT tagID, tagName FROM tags";
                            $tagResult = $db->query($tagQuest);

                                // Display tagNames as options for the dropdown menu
                                while ($row = $tagResult->fetch()) {
                                    echo "<option value='" . $row['tagID'] . "'>" . $row['tagName'] . "</option>";
                                }

                            // Close the database connection
                            $tagResult->closeCursor();
                            ?>
                        </select><br><br>
                        <label>&nbsp;</label>
                        <input type="submit" name="new_series" value="Submit"></input>
                    </form>
                </div>
            </div>
            <br>
        </main>
    </body>
</html>