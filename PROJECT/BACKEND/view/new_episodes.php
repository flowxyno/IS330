<?php
    require_once('util/secure_conn.php');  // require a secure connection
    require_once('util/valid_admin.php');  // require a valid admin user

    if (isset($_POST['new_episodes'])) {
        // Database connection
        include "model/database.php";
    
        // Get user inputs from the form
        $episodeNumber = $_POST['episodeNumber'];
        $episodeTitle = $_POST['episodeTitle'];
        $episodeSynop = $_POST['episodeSynop'];
        $seriesID = $_POST['seriesID'];
    
        // Insert episode information into the 'episodes' table
        $insertEpisodeQuest = "INSERT INTO episodes (seriesID, episodeNumber, episodeTitle, episodeSynop) VALUES (:seriesID, :episodeNumber, :episodeTitle, :episodeSynop)";
        $statement = $db->prepare($insertEpisodeQuest);
        $statement->bindParam(':seriesID', $seriesID);
        $statement->bindParam(':episodeNumber', $episodeNumber);
        $statement->bindParam(':episodeTitle', $episodeTitle);
        $statement->bindParam(':episodeSynop', $episodeSynop);

        $statement->execute();

        echo '<script>alert("Episode added successfully");</script>';
    
        // Close the database connection
        $statement->closeCursor(); 
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Left off: Insert Episodes</title>
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
            <h1>Left off: Insert Episodes</h1>
        </header>
        <main>
            <div class="container"> 
                <div class="nav-menu">
                    <?php 
                        include 'util/nav_menu.php';
                    ?>
                </div>
                <div class="form-container">
                    <h1>New Episodes</h1>

                    <!-- Form to handle the users input for the series -->
                    <form action="index.php?action=show_new_episodes" method="post" id="new_episode_form" class="aligned">

                        <label for="episodeNumber">Episode Number:</label>
                        <input type="number" name="episodeNumber" min="0" step="1" required><br><br>   
                    
                        <label for="episodeTitle">Episode Title:</label>
                        <input type="text" name="episodeTitle" required><br><br>

                        <label for="episodeSynop">Episode Synopsis:</label>
                        <textarea name="episodeSynop" rows="4" cols="50" required></textarea><br><br>

                        <label for="seriesID">Select Series:</label>
                        <select name="seriesID" required>
                            <option value=""></option>
                            <?php
                            // Establish database connection
                            include "model/database.php";

                            // Retrieve tag data
                            $seriesQuest = "SELECT seriesID, seriesName FROM series";
                            $seriesResult = $db->query($seriesQuest);

                                // Display tagNames as options for the dropdown menu
                                while ($row = $seriesResult->fetch()) {


                                    echo "<option value='" . $row['seriesID'] . "'>" . htmlspecialchars($row['seriesName']) . "</option>";
                                }

                            // Close the database connection
                            $seriesResult->closeCursor();
                            ?>
                        </select><br><br>
                        <label>&nbsp;</label>
                        <input type="submit" name="new_episodes" value="Submit"></input>
                    </form>
                </div>
            </div>
            <br>
        </main>
    </body>
</html>
