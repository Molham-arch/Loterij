<?php

include "./inc/conn.php";
include "./inc/form_handle.php";
include "./inc/select.php";
include "./inc/db_close.php";



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>Winner</title>
</head>

<body>




    <div class="container">

        <div class="header-section">
            <img src="./images/jason-leung-Xaanw0s0pMk-unsplash.jpg" alt="Profile" class="profile-img">
            <h1 class="mt-3">Win with Us</h1>
            <p>Enter for a chance to win a free program license in our lottery draw.</p>
            <p class="text-danger">Hurry up! Limited time offer.</p>
            <h3 id="countdown"></h3>

        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-8 main-container">
                <div class="row">
                    <div class="col-md-6">
                        <h5>Follow the steps to enter:</h5>
                        <ul class="instructions">
                            <li>Like and share our official page on social media.</li>
                            <li>Fill in your details below to register.</li>
                            <li>Winners will be announced within 24 hours.</li>
                            <li>Stay tuned and good luck!</li>
                        </ul>
                    </div>

                    <div class="col-md-6">
                        <h5>Please enter your details:</h5>
                        <form action="index.php" method="POST">
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control <?php echo !empty($errors['fnameErr']) ? 'is-invalid' : ''; ?>"
                                    name="fname" id="fname" placeholder="First Name"
                                    value="<?php echo htmlspecialchars($_POST['fname'] ?? ''); ?>">
                                <label for="fname">First Name</label>
                                <div class="form-text text-danger"><?php echo $errors['fnameErr']; ?></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control <?php echo !empty($errors['lnameErr']) ? 'is-invalid' : ''; ?>"
                                    name="lname" id="lname" placeholder="Last Name"
                                    value="<?php echo htmlspecialchars($_POST['lname'] ?? ''); ?>">
                                <label for="lname">Last Name</label>
                                <div class="form-text text-danger"><?php echo $errors['lnameErr']; ?></div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email"
                                    class="form-control <?php echo !empty($errors['emailErr']) ? 'is-invalid' : ''; ?>"
                                    name="email" id="email" placeholder="name@example.com"
                                    value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
                                <label for="email">Email Address</label>
                                <div class="form-text text-danger"><?php echo $errors['emailErr']; ?></div>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" name="submit">Submit Entry</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



    </div>
    <div class="loader-content">

        <div class="loader">
            <canvas id="circularLoader" width="200" height="200"></canvas>
        </div>


    </div>

    <div class="text-center mt-5">

        <div class="text-center mt-5">
            <button id="winner" type="button" class="btn btn-primary me-2">
                Check Draw Winner
            </button>
            <a href="./participants/participants.php" class="btn btn-primary">
                See all participants
            </a>
        </div>

        <div class="modal fade text-center" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="moal-title fs-5 fw-lighter" id="modalLabel">The winner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class=" modal-body">
                        <?php foreach ($users as $user) { ?>
                        <h1 class="display-1">
                            <?php echo htmlspecialchars($user['firstName']) . ' ' . htmlspecialchars($user['lastName']); ?>
                        </h1>
                        <?php } ?>
                    </div>

                </div>
            </div>
        </div>




        <div id="cards" class="row mt-4 container m-auto">
            <div class="col-sm-6 mb-4">
                <div class="card bg-light">
                    <div class="card-body">
                        <h5 class="card-title">

                        </h5>
                        <p class="card-text text-center">
                            <?php echo htmlspecialchars($user['email']); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer mt-5 text-center py-3">
            <p class="mb-0">&copy; Developed by Molham</p>
        </footer>




        <audio id="celebrationSound" src="./sounds/videoplayback.m4a" preload="auto"></audio>
        <script src="https://cdn.jsdelivr.net/npm/@tsparticles/confetti@3.0.3/tsparticles.confetti.bundle.min.js">
        </script>
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="./js/loader.js"></script>
        <script src="./js/script.js"></script>
</body>

</html>