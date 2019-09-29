<?php
if (!session_id()) {
    session_start();
}
if (isset($_SESSION['logged_in'])) {
    header('Location: dashboard.php');
}
header('Location: signin.php');
