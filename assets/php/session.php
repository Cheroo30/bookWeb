<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in
    http_response_code(200); // OK
} else {
    // User is not logged in
    http_response_code(401); // Unauthorized
}
?>
