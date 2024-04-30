<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dog Details Page</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <?php include 'header.php' ?>
        <div class="container mt-5">
            <h1 class="text-center mb-4">Dog Details</h1>

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <?php
                    // Include database connection file
                    include_once 'connect.php';

                    // Check if dog name parameter is set in the URL
                    if(isset($_GET['name'])) {
                        // Get the dog's name from the URL parameter
                        $dog_name = mysqli_real_escape_string($database, $_GET['name']);

                        // Construct SQL query to fetch details of the selected dog
                        $sql = "SELECT * FROM Dogtable WHERE DogName = '$dog_name'";
                        $result = mysqli_query($database, $sql);

                        // Check if a dog with the provided name exists
                        if(mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <h2><?php echo $row['DogName']; ?></h2>
                                    <img src="images/dog1.jpeg" alt="Dog Image" class="img-fluid mb-3">
                                </div>
                                <div class="col-md-6">
                                    <p><strong>ID:</strong> <?php echo $row['DogID']; ?></p>
                                    <p><strong>Breed:</strong> <?php echo $row['DogBreed']; ?></p>
                                    <p><strong>Sex:</strong> <?php echo $row['DogSex']; ?></p>
                                    <p><strong>Age:</strong> <?php echo $row['DogAge']; ?></p>
                                    <p><strong>Color:</strong> <?php echo $row['DogColor']; ?></p>
                                    <p><strong>Size:</strong> <?php echo $row['DogSize']; ?></p>
                                    <p><strong>Description:</strong> <?php echo $row['DogDescription']; ?></p>
                                    <p><strong>Medical Info:</strong> <?php echo $row['DogMedical']; ?></p>
                                </div>
                            </div>
                            <?php
                        } else {
                            echo "<p>Dog not found.</p>";
                        }
                    } else {
                        echo "<p>No dog selected.</p>";
                    }

                    // Close database connection
                    mysqli_close($database);
                    ?>
                </div>
            </div>
        </div>
        <?php include 'footer.php' ?>
    </body>
</html>