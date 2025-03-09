<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST['nama']);
    $email_kontak = htmlspecialchars($_POST['email_kontak']);
    $no_hp = htmlspecialchars($_POST['no_hp']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $linkedin = htmlspecialchars($_POST['linkedin']);
    $pendidikan = nl2br(htmlspecialchars($_POST['pendidikan']));
    $profile = nl2br(htmlspecialchars($_POST['profile']));
    $skills = explode(",", $_POST['skill']);
    $pengalaman = explode(",", $_POST['pengalaman']);

    // Mengunggah dan menyimpan gambar
    $foto = "default.jpg"; // Default jika tidak ada gambar
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $uploadDir = "uploads/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $foto = $uploadDir . basename($_FILES["foto"]["name"]);
        move_uploaded_file($_FILES["foto"]["tmp_name"], $foto);
    }
} else {
    header("Location: form.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CV - <?php echo $nama; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; display: flex; justify-content: center; align-items: center; height: 100vh; }
        .cv-container { display: flex; width: 800px; background: white; border-radius: 10px; box-shadow: 0px 0px 10px gray; }
        .left { background: #FFD700; padding: 20px; width: 30%; text-align: center; border-top-left-radius: 10px; border-bottom-left-radius: 10px; }
        .right { padding: 20px; width: 70%; border-top-right-radius: 10px; border-bottom-right-radius: 10px; }
        img { width: 120px; height: 120px; object-fit: cover; border-radius: 50%; display: block; margin: 0 auto 10px; }
        h2 { color: #333; }
        h3 { color: #0056b3; }
        ul { padding-left: 20px; }
        .section { margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="cv-container">
        <div class="left">
            <img src="<?php echo $foto; ?>" alt="Foto Profil">
            <div class="section">
                <h3>Kontak</h3>
                <ul>
                    <li>Email: <?php echo $email_kontak; ?></li>
                    <li>No HP: <?php echo $no_hp; ?></li>
                    <li>Alamat: <?php echo $alamat; ?></li>
                    <li>LinkedIn: <?php echo $linkedin; ?></li>
                </ul>
            </div>
            <div class="section">
                <h3>Pendidikan</h3>
                <p><?php echo $pendidikan; ?></p>
            </div>
            <div class="section">
                <h3>Skill</h3>
                <ul>
                    <?php foreach ($skills as $skill) { echo "<li>" . htmlspecialchars(trim($skill)) . "</li>"; } ?>
                </ul>
            </div>
        </div>
        <div class="right">
            <h2><?php echo $nama; ?></h2>
            <div class="section">
                <h3>Profil</h3>
                <p><?php echo $profile; ?></p>
            </div>
            <div class="section">
                <h3>Pengalaman</h3>
                <ul>
                    <?php foreach ($pengalaman as $exp) { echo "<li>" . htmlspecialchars(trim($exp)) . "</li>"; } ?>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
