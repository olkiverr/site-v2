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
        <form action="">
            <?php if (!$is_connected): ?>
            <label for="">Name:</label>
            <input type="text" name="" id="">
            <label for="">Email:</label>
            <input type="email" name="" id="">
            <?php endif ?>
            <label for="">Message:</label>
            <textarea name="" id=""></textarea>
            <button type="submit">Send</button>
        </form>
    </main>
    <?php include '../partials/footer.php' ?>
</body>
</html>