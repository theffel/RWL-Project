<?php
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

// Include the database.php file
include('database.php');
?>