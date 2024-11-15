<?php
// Improve the logout functionality later

session_destroy();
header("Location: ../home");
exit;
?>