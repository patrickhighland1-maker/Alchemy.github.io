<?php
if ($_POST['email']) {
    $email = trim($_POST['email']);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = 'subscribers.txt';
        $current = file_exists($file) ? file_get_contents($file) : '';
        if (strpos($current, $email) === false) {
            file_put_contents($file, $email . PHP_EOL, FILE_APPEND);
            echo "<p style='color: #ffd700; font-weight: bold;'>Thanks! You're subscribed.</p>";
        } else {
            echo "<p style='color: #ccc;'>You're already subscribed!</p>";
        }
    } else {
        echo "<p style='color: red;'>Please enter a valid email.</p>";
    }
} else {
    echo "<p style='color: red;'>Email is required.</p>";
}
?>