<?php
    require_once('util/secure_conn.php');  // require a secure connection
    require_once('util/valid_admin.php');  // require a valid admin user
    require_once('model/admin_db.php'); // required to pass data to the add_admin function

   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Capture form data
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            // Call the add_admin function with the captured data
            $result = add_admin($fname, $lname, $username, $password);
    
            if ($result) {
                // Display success message
                echo '<script>alert("User added successfully");</script>';
                
            } else {
                // Display failure message
                echo '<script>alert("User Add Failed!!");</script>';
            }
   }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Left off: Insert Users</title>
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
                    <h1>New User</h1>

                    <!-- change the action value to something other than login -->
                    <form action="index.php?action=show_new_user" method="post" id="new_user_form" class="aligned">
                    
                        <label>First Name:</label>
                        <input type="text" class="text" name="fname">
                        <br>

                        <label>Last Name:</label>
                        <input type="text" class="text" name="lname">
                        <br>

                        <label>Username:</label>
                        <input type="text" class="text" name="username">
                        <br>

                        <label>Password:</label>
                        <input type="password" class="text" name="password">
                        <br>
                        <br>

                        <label>&nbsp;</label>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
            <br>
        </main>
    </body>
</html>