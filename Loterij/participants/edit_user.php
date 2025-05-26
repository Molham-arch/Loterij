<?php

include "../inc/conn.php";

$errors = [];
$user = null;

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT firstName, lastName, email FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found!";
        exit;
    }
    $stmt->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];

    if (empty($firstName)) {
        $errors['firstNameErr'] = "First name is required";
    }
    if (empty($lastName)) {
        $errors['lastNameErr'] = "Last name is required";
    }
    if (empty($email)) {
        $errors['emailErr'] = "Email is required";
    }

    if (empty($errors)) {
        $sql = "UPDATE users SET firstName = ?, lastName = ?, email = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $firstName, $lastName, $email, $id);

        if ($stmt->execute()) {
            header("Location: participants.php");
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Edit Participants</title>
</head>

<body>

    <div class="container mt-5">
        <a href="participants.php" class="btn btn-secondary mb-4">Back to Main</a>
        <h1 class="text-center">Edit Participant</h1>
        <?php if ($user): ?>
            <form action="edit_user.php" method="POST" class="mt-4">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" name="firstName" id="firstName"
                        class="form-control <?php echo !empty($errors['firstNameErr']) ? 'is-invalid' : ''; ?>"
                        value="<?php echo htmlspecialchars($user['firstName']); ?>">
                    <div class="invalid-feedback"><?php echo $errors['firstNameErr'] ?? ''; ?></div>
                </div>

                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" name="lastName" id="lastName"
                        class="form-control <?php echo !empty($errors['lastNameErr']) ? 'is-invalid' : ''; ?>"
                        value="<?php echo htmlspecialchars($user['lastName']); ?>">
                    <div class="invalid-feedback"><?php echo $errors['lastNameErr'] ?? ''; ?></div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                        class="form-control <?php echo !empty($errors['emailErr']) ? 'is-invalid' : ''; ?>"
                        value="<?php echo htmlspecialchars($user['email']); ?>">
                    <div class="invalid-feedback"><?php echo $errors['emailErr'] ?? ''; ?></div>
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
                <a href="participants.php" class="btn btn-secondary">Cancel</a>
            </form>
        <?php else: ?>
            <p class="text-center">User not found.</p>
        <?php endif; ?>
    </div>

    <script src="../js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php

include "../inc/db_close.php";
?>
