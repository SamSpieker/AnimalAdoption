<?php

include "header.php";
include "connect.php";

$result = mysqli_query($database, "SELECT * FROM Dogtable");

?>






<body>
<h1>Dog List</h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Breed</th>
        <th>Sex</th>
        <th>Age</th>
        <th>Color</th>
        <th>Size</th>
        <th>Description</th>
        <th>Medical Information</th>
        <th colspan="2">Options</th>
    </tr>
<?php while ($row = mysqli_fetch_array($result)) : ?>
    <tr>
        <td><?= $row['DogID'] ?></td>
        <td><?= $row['DogName'] ?></td>
        <td><?= $row['DogBreed'] ?></td>
        <td><?= $row['DogSex'] ?></td>
        <td><?= $row['DogAge'] ?></td>
        <td><?= $row['DogColor'] ?></td>
        <td><?= $row['DogSize'] ?></td>
        <td><?= $row['DogDescription'] ?></td>
        <td><?= $row['DogMedical'] ?></td>
        <?php
        echo "<td><a href='editDog.php?id={$row["DogID"]}'>Edit</a></td>";
        echo "<td><a href='deleteDog.php?id={$row["DogID"]}'>Delete</a></td>";
        ?>
    </tr>

<?php endwhile; ?>
</table>

<a href="addDog.php"><button class="btn btn-primary">Add New Dog</button></a>

<?php include 'footer.php'; ?>