<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD STUDENTINFO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            padding: 50px;
        }
        .form-container {
            max-width: 250px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="form-container">
        <h2 class="mb-4">Add User</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <!-- New input field for ID -->
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <!-- Existing input fields for username and email -->
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <!-- Submit button -->
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "studentinfo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST["submit"])) {
    handleFormSubmission($conn);
}
displayUsersTable($conn);

$conn->close();

function handleFormSubmission($conn) {
    // Retrieve values from the form
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Insert data into the users table
    $sql = "INSERT INTO users (id, username, email) VALUES ('$id', '$username', '$email')";

    // Check if the query was successful
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success mt-4' role='alert'>New record created successfully</div>";
    } else {
        echo "<div class='alert alert-danger mt-4' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
}

function displayUsersTable($conn) {
    $sql = "SELECT id, username, email FROM users";
    $result = $conn->query($sql);

    echo "<h2 class='mt-4'>Users</h2>";

    if ($result->num_rows > 0) {
        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-dark'><tr><th>ID</th><th>Username</th><th>Email</th></tr></thead><tbody>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }

        echo "</tbody></table>";
    } else {
        echo "<p class='mt-4'>0 results</p>";
    }
}
?>

</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
