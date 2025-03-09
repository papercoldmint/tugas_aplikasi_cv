<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    
    if (!empty($email) && !empty($password)) {
        $domain = substr(strrchr($email, "@"), 1);
        
        if ($password === $domain) {
            $_SESSION['email'] = $email;
            header('Location: form.php');
            exit();
        } else {
            $error = "Email atau password salah.";
        }
    } else {
        $error = "Harap isi semua kolom.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #007BFF; }
        .container { background: white; padding: 20px; border-radius: 10px; box-shadow: 0px 0px 10px gray; width: 300px; }
        .error { color: red; }
        input, button { width: 100%; margin: 5px 0; padding: 8px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST">
            <label>Email:</label>
            <input type="email" name="email" required><br>
            <label>Password:</label>
            <input type="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>