<?php
session_start();
include '../php/db.php';

if (isset($_SESSION['user'])) {
    $is_connected = isset($_SESSION['user']);
} else {
    $is_connected = false;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/contact.css">
    <link rel="shortcut icon" href="../img/MangaMuse_White-Book.png" type="image/x-icon">
    <title>Contact - Mangamuse</title>
</head>
<body>
    <?php include '../partials/header.php' ?>
    <main>
        <form action="../php/send_mail.php" method="POST">
            <?php if (!$is_connected): ?>
            <input placeholder="Name" type="text" name="name" id="">
            <input placeholder="Email" type="email" name="email" id="">
            <?php endif ?>
            <textarea placeholder="Type your message here... " name="message" id=""></textarea>
            <button type="submit">Send</button>
        </form>
    </main>
    <?php include '../partials/footer.php' ?>
</body>
</html>