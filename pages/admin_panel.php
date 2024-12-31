<?php
session_start();
if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: /site-v2-crud/index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/admin-panel.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="icon" href="../img/MangaMuse_White-Book.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../partials/header.php'; ?> <!-- Include header partial -->
    <div class="admin-panel">
        <h2>Admin Panel</h2>
        <div class="tabs">
            <div class="tab active-tab" data-tab="users">Users</div>
            <div class="tab" data-tab="settings">Settings</div>
        </div>
        <div class="tab-content active-tab" id="users">
            <h3>Manage Users</h3>
            <input type="text" id="userSearch" placeholder="Search for users..." onkeyup="searchUsers()">
            <button onclick="location.href='add_user.php?tab=users'">Add User</button>
            <?php
            // Fetch users from the database
            include '../php/db.php';
            $sql = "SELECT id, username, email, is_admin FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table id='usersTable'>";
                echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>Admin</th><th>Actions</th></tr>";
                while($row = $result->fetch_assoc()) {
                    $isAdmin = $row["is_admin"] ? "Yes" : "No";
                    echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td><td>" . $isAdmin . "</td><td><a href='edit_user.php?id=" . $row["id"] . "&tab=users' class='button'>Edit</a> <a href='../php/delete_user.php?id=" . $row["id"] . "&tab=users' class='button'>Delete</a></td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            ?>
        </div>
        <div class="tab-content" id="settings">
            <h3>Site Settings</h3>
            <form>
                <label for="site-name">Site Name</label>
                <input type="text" id="site-name" name="site-name">
                <label for="admin-email">Admin Email</label>
                <input type="email" id="admin-email" name="admin-email">
                <button type="submit">Save Settings</button>
            </form>
        </div>
    </div>
    <?php include '../partials/footer.php'; ?> <!-- Include footer partial -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');

            tabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    tabs.forEach(t => t.classList.remove('active-tab'));
                    tabContents.forEach(tc => tc.classList.remove('active-tab'));

                    tab.classList.add('active-tab');
                    document.getElementById(tab.dataset.tab).classList.add('active-tab');
                });
            });
        });
    </script>
    <script src="../js/admin-panel.js"></script>
</body>
</html>
