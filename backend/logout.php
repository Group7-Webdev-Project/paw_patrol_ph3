<?php
    session_start();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to login
    header("Location: login.php?logged_out=1");
    exit();
?>
