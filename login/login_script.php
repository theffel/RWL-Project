<?php
/**
 * This file provides the business functionality for the login index.php page.
 *
 * PHP version 5
 *
 *
 * @category    CategoryName
 * @package     PackageName
 * @author      Zachary Theriault
 * @copyright   2015 sCIS
 * @license     http://php.net/license/3_01.txt  PHP License 3.01
 * @version     x.xx
 * @link        http://pear.php.net/package/PackageName
 * @since       2015-01-12
 */

// Start the session
session_start();

// Destroy the session and clear the session cookie
if (isset($_GET['action'])) {
    if ($_GET['action'] == 'logout') {
        // Kill the server-side session
        session_destroy();
        // Kill the client-side cookie that stores the session ID
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
    }
    header('location:index.php');
}

// Login information variables
$host = "localhost";
$name = "rwl_user";
$pass = "rwl_pass";
$db = "rwl";

// Create connection to the database
@$db = new mysqli($host, $name, $pass, $db);

// Display message if there is an error connecting to the database
if (mysqli_connect_errno()) {
    echo '<h1>Error: Could not connect to database. Please try again later.</h1>';
    exit;
}

if (isset($_POST['submit'])) {

    // Define $username and $password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // To protect MySQL injection for security purposes
    $username = $db->real_escape_string($_POST['username']);
    $password = $db->real_escape_string($_POST['password']);

    // Create query
    $query = "SELECT COUNT(*) FROM Users WHERE Username='" .$username ."' AND Password=sha1('" .$password ."')";
    $result = $db->query($query);

        $row = $result->fetch_row();

        // If the login was successful
        if ($row[0] == 1) {
            $loggedIn = true;

            // Store the login boolean and the username of the logged in user in the session
            $_SESSION['loggedIn'] = $loggedIn;
            $_SESSION['username'] = $username;
            // Go to the index.php
            header("location: ../index.php");
        }
        // If the login was not successful
        else {
            header("location: index.php");
        }
    }
?>