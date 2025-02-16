<?php
$errors = [
    'fnameErr' => '',
    'lnameErr' => '',
    'emailErr' => ''
];

if (isset($_POST['submit'])) {
    $firstName = mysqli_real_escape_string($conn, $_POST['fname']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (empty($firstName)) {
        $errors['fnameErr'] = "Please insert your first name";
    }
    if (empty($lastName)) {
        $errors['lnameErr'] = "Please insert your last name";
    }
    if (empty($email)) {
        $errors['emailErr'] = "Please insert your email";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['emailErr'] = "Please insert a correct email";
    }

    if (empty($errors['fnameErr']) && empty($errors['lnameErr']) && empty($errors['emailErr'])) {
        $sql = "INSERT INTO users (`firstName`, `lastName`, `email`)
                VALUES ('$firstName', '$lastName', '$email')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
