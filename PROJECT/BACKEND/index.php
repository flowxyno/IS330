<?php
// Start session management and include necessary functions
session_start();
require_once('model/database.php');
require_once('model/admin_db.php');

// Get the action to perform
$action = filter_input(INPUT_POST, 'action');

if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_main_menu';
    }
}

// If the user isn't logged in, force the user to login
if (!isset($_SESSION['is_valid_admin'])) {
    $action = 'login';
}

// Perform the specified action
switch($action) {
    case 'login':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        if (is_valid_admin_login($username, $password)) {
            $_SESSION['is_valid_admin'] = true;
            // storing the logged in userName into the session
            $_SESSION['logged_in_userName'] = $username;

            // Extracting the userID and firstName from the provided userName and storing it as user_ID & first_name
            $statement = $db->prepare("SELECT * FROM users WHERE userName = :userName");
            $statement->bindParam(":userName", $username);
            $statement->execute();
            $row = $statement->fetch();
            $user_ID = $row["userID"]; 
            $_SESSION['logged_in_userID'] = $user_ID;
            $first_name = $row["firstName"]; 
            $_SESSION['logged_in_firstName'] = $first_name;

            include('view/main_menu.php');
        } else {
            $login_message = 'You must login to view this page.';
            include('view/login.php');
        }
        break;
    case 'show_main_menu':
        include('view/main_menu.php');
        break;
    case 'show_new_user':
        include('view/new_user.php');
        break;
    case 'show_new_series':
        include('view/new_series.php');
        break;
    case 'show_new_episodes':
        include('view/new_episodes.php');
        break;
    case 'show_display_series':
        include('display_series.php');
        break;
    case 'logout':
        $_SESSION = array();   // Clear all session data from memory
        session_destroy();     // Clean up the session ID
        $login_message = 'You have been logged out.';
        include('view/login.php');
        break;
}
?>