<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Student_Information_System";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS Users (
    userID INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    role ENUM('admin', 'user') NOT NULL
)";
$conn->query($sql);

// CRUD Operations

// Create
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addUser"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "INSERT INTO Users (username, password, role) VALUES ('$username', '$password', '$role')";
    if ($conn->query($sql) === TRUE) {
        echo "User added successfully";
    } else {
        echo "Error adding user: " . $conn->error;
    }
}

// Read
function getUserDetails($userID) {
    global $conn;
    $sql = "SELECT * FROM Users WHERE userID = $userID";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_assoc();
    } else {
        return false;
    }
}

// Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["updateUser"])) {
    $userID = $_POST["userID"];
    $newUsername = $_POST["newUsername"];
    $newPassword = $_POST["newPassword"];
    $newRole = $_POST["newRole"];

    $sql = "UPDATE Users SET username='$newUsername', password='$newPassword', role='$newRole' WHERE userID=$userID";
    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully";
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

// Delete
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["deleteUser"])) {
    $userID = $_POST["userID"];

    $sql = "DELETE FROM Users WHERE userID = $userID";
    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }
}

$conn->close();
?>










<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Student Information System</title>
    <style>
        body {
            background-color: #0A5F0C; /* Set your desired background color */
        }

        .card {
            background-color: #ffffff; /* Set card background color */
        }

        .container {
            background-color: #00B000; /* Set container background color */
            padding: 250px;
            border-radius: 550px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <h2 class="mb-4">Student Information System</h2>

        <!-- Users CRUD operations -->
        <div class="card mb-4">
            <div class="card-header">
                Users
            </div>
            <div class="card-body">
                    <h5>Add User</h5>
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Role:</label>
                        <select name="role" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <button type="submit" name="addUser" class="btn btn-primary">Add User</button>
                </form>

                <!-- Display User Details -->
                <h5>User Details</h5>
                <form method="post" action="" class="mb-3">
                    <div class="form-group">
                        <label for="userID">User ID:</label>
                        <input type="text" name="userID" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-info">View Details</button>
                </form>
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userID"])) {
                        $userID = $_POST["userID"];
                        $userDetails = getUserDetails($userID);

                        if ($userDetails) {
                            echo "<pre>";
                            print_r($userDetails);
                            echo "</pre>";
                        } else {
                            echo "User not found.";
                        }
                    }
                ?>

                <!-- Update User Form -->
                <form method="post" action="" class="mt-3 mb-3">
                    <h5>Update User</h5>
                    <div class="form-group">
                        <label for="userID">User ID:</label>
                        <input type="text" name="userID" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="newUsername">New Username:</label>
                        <input type="text" name="newUsername" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="newPassword">New Password:</label>
                        <input type="password" name="newPassword" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="newRole">New Role:</label>
                        <select name="newRole" class="form-control" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <button type="submit" name="updateUser" class="btn btn-warning">Update User</button>
                </form>

                <!-- Delete User Form -->
                <form method="post" action="">
                    <h5>Delete User</h5>
                    <div class="form-group">
                        <label for="userID">User ID:</label>
                        <input type="text" name="userID" class="form-control" required>
                    </div>
                    <button type="submit" name="deleteUser" class="btn btn-danger">Delete User</button>
                </form>
                </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>