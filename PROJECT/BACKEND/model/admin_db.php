<?php
function add_admin($fname, $lname, $username, $password) {
    global $db;

    if(strlen($username) < 5 || $password == ''){
        return False;
    }

    $hash = password_hash($password, PASSWORD_DEFAULT);
    $insertuserquest = 'INSERT INTO users (firstName, lastName, userName, passwordHash)
              VALUES (:fname, :lname, :username, :password)';
    $statement = $db->prepare($insertuserquest);
    $statement->bindValue(':fname', $fname);
    $statement->bindValue(':lname', $lname);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $hash);
    $statement->execute();
    $statement->closeCursor();

    return True;
}

function is_valid_admin_login($username, $password) {
    global $db;
    
    // Note: Remove this before security review
    /* $hash = password_hash($password, PASSWORD_DEFAULT);
    echo $hash; */ 

    $query = 'SELECT passwordHash FROM users
              WHERE userName = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();

    if($row === False)
    {
        return False;
    }

    $hash = $row['passwordHash'];
    return password_verify($password, $hash);
}
?>