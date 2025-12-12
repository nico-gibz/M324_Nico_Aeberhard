<?php
$servername = "mysql-demo";
$username = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');
$dbname = getenv('MYSQL_DATABASE');

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("<h1 style='color:red;'>Connection failed: " . $conn->connect_error . "</h1>");
}

// CREATE
if (isset($_POST['create'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $conn->query("INSERT INTO users (name, email) VALUES ('$name', '$email')");
    header("Location: index.php");
    exit;
}

// UPDATE
if (isset($_POST['update'])) {
    $id = (int)$_POST['id'];
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
    header("Location: index.php");
    exit;
}

// DELETE
if (isset($_POST['delete'])) {
    $id = (int)$_POST['id'];
    $conn->query("DELETE FROM users WHERE id=$id");
    header("Location: index.php");
    exit;
}

// FETCH USERS
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Users Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="container">
    <header>
        <h1>Users Dashboard</h1>
        <button id="toggle-dark" title="Toggle dark mode">
            <i class="fa-solid fa-sun" id="dark-icon"></i>
        </button>
    </header>

    <div class="card table-card">
        <div class="table-container">
            <table>
                <thead>
                    <tr class="header-row">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<form method='post'>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td><input type='text' name='name' value='".htmlspecialchars($row['name'])."'></td>";
                            echo "<td><input type='email' name='email' value='".htmlspecialchars($row['email'])."'></td>";
                            echo "<td class='actions'>
                                    <input type='hidden' name='id' value='".$row['id']."'>
                                    <input type='submit' name='update' value='Update'>
                                    <input type='submit' name='delete' value='Delete' onclick=\"return confirm('Are you sure?')\">
                                  </td>";
                            echo "</form>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No users found</td></tr>";
                    }
                    ?>
                    <tr class="new-row">
                        <form method="post">
                            <td>New</td>
                            <td><input type="text" name="name" placeholder="Name" required></td>
                            <td><input type="email" name="email" placeholder="Email" required></td>
                            <td><input type="submit" name="create" value="Add"></td>
                        </form>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="scripts.js"></script>
</body>
</html>
<?php $conn->close(); ?>
