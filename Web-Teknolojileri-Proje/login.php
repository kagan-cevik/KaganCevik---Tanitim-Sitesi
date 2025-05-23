<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'kullaniciler.php';

    $input_name = $_POST['username'] ?? '';  // login.html'de name="username" olmalı
    $input_password = $_POST['password'] ?? '';

    // Boşluk kontrolü
    if (empty($input_name) || empty($input_password)) {
        header("Location: login.html");
        exit();
    }

    // Email formatı ve domain kontrolü
    if (!filter_var($input_name, FILTER_VALIDATE_EMAIL) || !str_ends_with($input_name, "@sakarya.edu.tr")) {
        header("Location: login.html");
        exit();
    }

    // Giriş kontrolü
    if ($input_name == $username && $input_password == $password) {
        header("Location: git-login.html?username=" . urlencode($username));
        exit();
    } else {
        header("Location: gitme-login.html");
        exit();
    }
}
?>
