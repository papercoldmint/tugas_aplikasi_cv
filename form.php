<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form CV</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; }
        form { background: white; padding: 20px; width: 50%; margin: auto; border-radius: 10px; box-shadow: 0px 0px 10px gray; text-align: left; }
        input, textarea { width: 100%; padding: 10px; margin: 5px 0; border-radius: 5px; border: 1px solid gray; }
        button { background: #0056b3; color: white; padding: 10px; border: none; cursor: pointer; width: 100%; }
        button:hover { background: #003d80; }
    </style>
</head>
<body>

<h2>Formulir CV</h2>
<form action="cv.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="nama" placeholder="Nama Lengkap" required>
    <input type="file" name="foto" accept="image/*" required>
    <input type="email" name="email_kontak" placeholder="Email" required>
    <input type="text" name="no_hp" placeholder="Nomor HP" required>
    <input type="text" name="alamat" placeholder="Alamat">
    <input type="text" name="linkedin" placeholder="LinkedIn">
    <textarea name="pendidikan" placeholder="Riwayat Pendidikan"></textarea>
    <textarea name="profile" placeholder="Deskripsi Singkat Tentang Anda"></textarea>
    <input type="text" name="skill" placeholder="Skill (pisahkan dengan koma)">
    <input type="text" name="pengalaman" placeholder="Pengalaman (pisahkan dengan koma)">
    <button type="submit">Simpan & Lihat CV</button>
</form>

</body>
</html>