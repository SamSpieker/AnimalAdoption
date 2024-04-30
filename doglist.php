<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dog List</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <?php include 'header.php'  ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Available Dogs</h1>

        <!-- Search Form -->
        <form method="GET" class="mb-4">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="breed">Search by Breed</label>
                    <input type="text" class="form-control" id="breed" name="breed" placeholder="Enter breed">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="age">Search by Age</label>
                    <input type="number" class="form-control" id="age" name="age" placeholder="Enter age">
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Search</button>
        </form>

        <!-- Dog List Table -->
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Breed</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Include database connection file
                    include_once 'connect.php';

                    // Construct SQL query based on search criteria
                    $sql = "SELECT DogName AS name, DogBreed AS breed FROM Dogtable";
                    if (isset($_GET['breed']) && !empty($_GET['breed'])) {
                        $breed = mysqli_real_escape_string($database, $_GET['breed']);
                        $sql .= " WHERE DogBreed LIKE '%$breed%'";
                    }
                    if (isset($_GET['age']) && !empty($_GET['age'])) {
                        $age = mysqli_real_escape_string($database, $_GET['age']);
                        $sql .= isset($_GET['breed']) && !empty($_GET['breed']) ? " AND DogAge = $age" : " WHERE DogAge = $age";
                    }

                    $result = mysqli_query($database, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            // You can replace the image source with the actual path to your dog images
                            echo "<td><img src='images/dog1.jpeg' alt='Dog Image' class='img-thumbnail' style='width: 100px; height: 100px;'></td>";
                            echo "<td><a href='dogdetails.php?name=" . urlencode($row['name']) . "'>" . $row['name'] . "</a></td>";
                            echo "<td>" . $row['breed'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No dogs found</td></tr>";
                    }

                    // Close database connection
                    mysqli_close($database);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>