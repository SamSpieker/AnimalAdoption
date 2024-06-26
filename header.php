<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="home.php">Home</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <?php
                        session_start();
                        if (isset($_SESSION['username'])) {
                            // User is logged in
                            echo '<li class="nav-item">
                                            <a class="nav-link" href="logout.php">Logout</a>
                                        </li>';
                            echo '<li class="nav-item">
                                            <a class="nav-link" href="doglist.php">Dog List</a>
                                        </li>';
                            echo '<li class="nav-item">
                                            <a class="nav-link" href="messages.php">Messages</a>
                                        </li>';

                        } else {
                            // User is not logged in
                            echo '<li class="nav-item">
                                            <a class="nav-link" href="login.php">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="register.php">Register</a>
                                        </li>';
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <?php
                        // TO-DO Require user_type of admin to access this
                        echo '<li class="nav-item">
                            <a class="nav-link" href="admin.php">Admininstration</a>
                        </li>';

                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>