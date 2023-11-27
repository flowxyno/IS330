<?php
    require_once('util/secure_conn.php');  // require a secure connection
    require_once('util/valid_admin.php');  // require a valid admin user

    if (isset($_POST['tracker_update'])) {
        // Database connection
        include "model/database.php";
    
        // Get user inputs from the form
        $seriesID = $_POST['seriesID']; // variable isn't needed now
        $episodeID = $_POST['episodeID'];
        $trackerID = $_POST['trackerID'];
    
        // update tracker information at the level of the specific trackerID
        $updateQuest = "UPDATE seriesTrackers SET episodeID = :episodeID WHERE trackerID = :trackerID";
        $statement = $db->prepare($updateQuest);
        $statement->bindParam(':episodeID', $episodeID);
        $statement->bindParam(':trackerID', $trackerID);

        $statement->execute();

        echo '<script>alert("Tracker Updated successfully");</script>';
    
        // Close the database connection
        $statement->closeCursor(); 
    }

    if (isset($_POST['new_tracker_insert'])) {
        // Database connection
        include "model/database.php";
    
        // Get user inputs from the form and session
        $userID = $_SESSION['logged_in_userID'];
        $seriesID = $_POST['seriesID'];
        $episodeID = $_POST['episodeID'];
    
        // Insert data into a new trackerID
        $insertQuest = "INSERT INTO seriesTrackers (userID, seriesID, episodeID) VALUES (:userID, :seriesID, :episodeID)";
        $statement = $db->prepare($insertQuest);
        $statement->bindParam(':userID', $userID);
        $statement->bindParam(':seriesID', $seriesID);
        $statement->bindParam(':episodeID', $episodeID);

        $statement->execute();

        echo '<script>alert("Tracker Updated successfully");</script>';
    
        // Close the database connection
        $statement->closeCursor(); 
    }
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #999DA0;
        }
    </style>
    <script>
        function updateEpisodes() {
            var seriesID = document.getElementById("series").value;
            var episodeDropdown = document.getElementById("episode");

            // Clear existing options
            episodeDropdown.innerHTML = "";

            // Fetch episodes for the selected series using AJAX
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var episodes = JSON.parse(xhr.responseText);

                    // Add new options to the episode dropdown
                    episodes.forEach(function (episode) {
                        var option = document.createElement("option");
                        option.value = episode.episodeID;
                        option.text = episode.episodeTitle;
                        episodeDropdown.add(option);
                    });
                }
            };

            xhr.open("GET", "get_episodes.php?seriesID=" + seriesID, true);
            xhr.send();
        }
    </script>
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
                    
                    <!--This table contains the seriesTracker information for the logged in user-->
                    <table>
                        <thead>
                            <tr>
                                <th>Cover Art</th>
                                <th>Series Information</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        $user_name = $_SESSION['logged_in_userName'];
                        $user_ID = $_SESSION['logged_in_userID'];
                        $first_name = $_SESSION['logged_in_firstName'];

                        echo "<h1>Welcome $first_name, here are your currently viewed Series</h1>";

                        //Query to gather the data needed for the page from the database
                        $quest = "SELECT series.coverArt, series.seriesID, series.seriesName, episodes.episodeID, episodes.episodeNumber, episodes.episodeTitle, episodes.episodeSynop, seriesTrackers.trackerID
                        FROM seriesTrackers
                        INNER JOIN series ON seriesTrackers.seriesID = series.seriesID
                        INNER JOIN episodes ON seriesTrackers.episodeID = episodes.episodeID
                        WHERE seriesTrackers.userID = :loggedInID";

                        // Use a prepared statement to prevent SQL injection
                        $stmt = $db->prepare($quest);
                        $stmt->bindParam(':loggedInID', $user_ID);
                        $stmt->execute();

                        //logic to iterate through the returned data from the query and populate the table 
                        if ($stmt->rowCount() > 0) {
                            while ($row = $stmt->fetch()) {
                                echo "<tr>";
                                echo "<td><img src='{$row['coverArt']}' alt='Cover Art' style='max-width: 100px;'></td>";
                                echo "<td>";
                                echo "<strong><u>".htmlspecialchars($row['seriesName'])."</u></strong><br><br>";
                                echo "<strong>Last Episode Watched:&ensp;</strong>".htmlspecialchars($row['episodeNumber'])."<br><br>";
                                echo "<strong>Title:&ensp;</strong>".htmlspecialchars($row['episodeTitle'])."<br><br>";
                                echo "<strong>Synopsis:&ensp;</strong>".htmlspecialchars($row['episodeSynop'])."<br><br>";

                                
                                // Start of the seriesTracker update form
                                echo "<form method='POST' action='index.php?action=show_main_menu'>";
                                //echo "<input type='hidden' name='userID' value='$user_ID'>";  // uses the userID from the sessions logged in user
                                echo "<input type='hidden' name='trackerID' value='{$row['trackerID']}'>"; //pass in the trackerID of the row you want to change
                                echo "<input type='hidden' name='seriesID' value='{$row['seriesID']}'>"; // uses the seriesID from the current row in the loop
                                echo "Please select the last episode you watched to update your tracker: <select name='episodeID'>";

                                // Retrieve all episodeNumber values for the current seriesID
                                $episodeQuest = "SELECT episodeID, episodeNumber FROM episodes WHERE seriesID = :seriesID";
                                $episodeStmt = $db->prepare($episodeQuest);
                                $episodeStmt->bindParam(':seriesID', $row['seriesID']);
                                $episodeStmt->execute();

                                // Display episode numbers for the current rows series and select the currently watched one
                                while ($episodeRow = $episodeStmt->fetch()) {
                                    $selected = ($episodeRow['episodeID'] == $row['episodeID']) ? "selected" : "";
                                    $episodeID = $episodeRow['episodeID'];
                                    $episodeNumber = htmlspecialchars($episodeRow['episodeNumber']);
                                    echo "<option value='$episodeID' $selected>$episodeNumber</option>";
                                }

                                echo "</select>";
                                echo "&nbsp;&nbsp;";
                                echo "<input type='submit' name='tracker_update' value='Update'>";
                                echo "</form>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<br>";
                            echo "<tr><td colspan='2'>No series tracker data found for the current user</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>    

                    <br>
                    <br>

                    <!--This table contains the form to add data to a new series tracker-->
                    <table>
                        <thead>
                            <h1>To Start Tracking a new series provide the series and episode number</h1>
                        </thead>
                        <tr>
                            <td>
                                <form action="index.php?action=show_main_menu" method="post" class="aligned">
                                    <label for="series">Select Series:</label>
                                    <select name="seriesID" id="series" onchange="updateEpisodes()">
                                        <option value=""></option>
                                        <?php
                                            $result = $db->query("SELECT seriesID, seriesName FROM series");

                                            while ($row = $result->fetch()) {
                                                echo "<option value='" . $row["seriesID"] . "'>" . htmlspecialchars($row['seriesName']) . "</option>";
                                            }
                                        ?>
                                    </select>

                                    <br><br>

                                    <label for="episode">Select Episode:</label>
                                    <select name="episodeID" id="episode">
                                        <!-- Options will be dynamically populated using JavaScript -->
                                    </select>

                                    <br><br>

                                    <input type="submit" name="new_tracker_insert" value="Submit">
                                </form>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>




<