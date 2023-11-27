<?php
// Database connection
include "model/database.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["seriesID"])) {
    $seriesID = $_GET["seriesID"];

    // Perform a database query to get episodes for the selected series
    $stmt = $db->prepare("SELECT episodeID, episodeTitle FROM episodes WHERE seriesID = :seriesID"); //TODO: secure this with bindParam
    $stmt->bindParam(':seriesID', $seriesID);

    $stmt->execute();

    $episodes = array();

    while ($row = $stmt->fetch()) {
        $episodes[] = $row;
    }

    // Return the episodes in JSON format
    echo json_encode($episodes);
}
?>