<?php
session_start();
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mangamuse</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="icon" href="img/MangaMuse_White-Book.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body class="<?php echo $is_admin ? 'admin' : ''; ?>">
    <?php include 'partials/header.php'; ?> <!-- Include header partial -->
    <main>
        <div class="trending-slider-container">
        <?php if ($is_admin): ?>
            <p>Trending 🔥<span><img src="img/cog.png" alt="cog" class="admin-cog" onclick="toggleEditMenu('trending')"></span></p>
            <div id="trending-edit-menu" class="edit-menu">
                <form id="trending-edit-form" enctype="multipart/form-data">
                    <label for="trending-image">Image URL:</label>
                    <input type="text" id="trending-image" name="image">
                    <label for="trending-file">Upload Image:</label>
                    <input type="file" id="trending-file" name="file">
                    <label for="trending-title">Title:</label>
                    <input type="text" id="trending-title" name="title">
                    <button type="button" onclick="addTrendingItem()">Add</button>
                    <button type="button" onclick="updateTrendingItem()">Update</button>
                    <button type="button" onclick="deleteTrendingItem()">Delete</button>
                </form>
            </div>
        <?php else: ?>
            <p>Trending 🔥</p>
        <?php endif; ?>
            <div class="trending-slider">
                <button class="slider-button left">&#9664;</button>
                <div class="trending-item">
                    <img src="anime_img/DanDaDan.webp" alt="DanDaDan">
                    <p>DanDaDan</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/Detective_Conan.webp" alt="Detective Conan">
                    <p>Detective Conan</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/sword_art_online.jpg" alt="Swort Art Online">
                    <p>Sword Art Online</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/Blue_Lock_vs_U-20.webp" alt="Blue Lock Season 2">
                    <p>Blue Lock Season 2</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/Tower_of_God_season_2.webp" alt="Tower of God Season 2">
                    <p>Tower of God Season 2</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/Yoru_wa_Neko_to_Issho.webp" alt="Yoru wa Neko to Issho">
                    <p>Yoru wa Neko to Issho</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/nom_trop_long.webp" alt="Cheat Skill Level Up">
                    <p>Cheat Skill Level Up</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/SNK.webp" alt="Attack on Titan">
                    <p>Attack on Titan</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/naruto_shippuden.webp" alt="Naruto Shippuden">
                    <p>Naruto Shippuden</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/DBZ.jpg" alt="Dragon Ball Z">
                    <p>Dragon Ball Z</p>
                </div>
                <button class="slider-button right">&#9654;</button>
            </div>
        </div>
        <div class="upcoming-slider-container">
        <?php if ($is_admin): ?>
            <p>Upcoming ⌛<span><img src="img/cog.png" alt="cog" class="admin-cog" onclick="toggleEditMenu('upcoming')"></span></p>
            <div id="upcoming-edit-menu" class="edit-menu">
                <form id="upcoming-edit-form" enctype="multipart/form-data">
                    <label for="upcoming-image">Image URL:</label>
                    <input type="text" id="upcoming-image" name="image">
                    <label for="upcoming-file">Upload Image:</label>
                    <input type="file" id="upcoming-file" name="file">
                    <label for="upcoming-title">Title:</label>
                    <input type="text" id="upcoming-title" name="title">
                    <button type="button" onclick="addUpcomingItem()">Add</button>
                    <button type="button" onclick="updateUpcomingItem()">Update</button>
                    <button type="button" onclick="deleteUpcomingItem()">Delete</button>
                </form>
            </div>
        <?php else: ?>
            <p>Upcoming ⌛</p>
        <?php endif; ?>
            <div class="upcoming-slider">
                <button class="slider-button left">&#9664;</button>
                <div class="trending-item">
                    <img src="anime_img/DanDaDan.webp" alt="DanDaDan">
                    <p>DanDaDan</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/Detective_Conan.webp" alt="Detective Conan">
                    <p>Detective Conan</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/sword_art_online.jpg" alt="Swort Art Online">
                    <p>Sword Art Online</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/Blue_Lock_vs_U-20.webp" alt="Blue Lock Season 2">
                    <p>Blue Lock Season 2</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/Tower_of_God_season_2.webp" alt="Tower of God Season 2">
                    <p>Tower of God Season 2</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/Yoru_wa_Neko_to_Issho.webp" alt="Yoru wa Neko to Issho">
                    <p>Yoru wa Neko to Issho</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/nom_trop_long.webp" alt="Cheat Skill Level Up">
                    <p>Cheat Skill Level Up</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/SNK.webp" alt="Attack on Titan">
                    <p>Attack on Titan</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/naruto_shippuden.webp" alt="Naruto Shippuden">
                    <p>Naruto Shippuden</p>
                </div>
                <div class="trending-item">
                    <img src="anime_img/DBZ.jpg" alt="Dragon Ball Z">
                    <p>Dragon Ball Z</p>
                </div>
                <button class="slider-button right">&#9654;</button>
            </div>
        </div>
    </main>
    <?php include 'partials/footer.php'; ?> <!-- Include footer partial -->
    <script src="js/scripts.js"></script>
</body>
</html>
