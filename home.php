<!DOCTYPE html>
<html>

<head>
    <title>Animal Adoption Home Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <?php include 'header.php' ?>
    <h1>Welcome to Animal Adoption!</h1>
	<p>This website allows you to browse our selection of animals up for adoption. Login or Register to start!</p>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        // User is logged in
        echo '<a href="logout.php"><button class="btn btn-primary">Log out</button></a><br /><br />';
        echo '<a href="doglist.php"><button href="doglist.php.php" class="btn btn-primary">Dog List</button></a>';
    } else {
        // User is not logged in
        echo '<a href="login.php" ><button class="btn btn-primary">Log in</button><a/><br /><br />';
        echo '<a href="register.php"><button href="register.php" class="btn btn-primary">Register</button></a>';
    }
    ?>
    <p><img src="images/dog1.jpeg" alt="Cute dog"><img src="images/dog2.jpeg" alt="Another dog"><img src="images/dog3.jpeg" alt="Third dog"></p>
    <?php include 'footer.php' ?>
</body>

</html>