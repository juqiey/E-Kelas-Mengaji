<?php
session_start();

if (!isset($_SESSION["auth"]) || $_SESSION["auth"] !== true) {
    header("Location: login.php");
    exit;
}

echo "Welcome, " . $_SESSION["name"] . "!<br>";
echo "<a href='logout.php'>Logout</a>";

// You can add more content or functionality here for logged-in users