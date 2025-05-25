<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'kullanicilar.php';

    $input_name = $_POST['username'] ?? '';
    $input_password = $_POST['password'] ?? '';

    // Email domain kontrolü biraz daha esnek yapalım:
    if (!filter_var($input_name, FILTER_VALIDATE_EMAIL) ||
       (!str_ends_with($input_name, "@ogr.sakarya.edu.tr"))) {
        header("Location: gitme-login.html");
        exit();
    }

    if ($input_name == $username && $input_password == $password) {
        header("Location: git-login.html?username=" . urlencode($username));
        exit();
    } else {
        header("Location: gitme-login.html");
        exit();
    }
}
?>