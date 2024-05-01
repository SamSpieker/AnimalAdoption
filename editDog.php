<?php

include "header.php";
include "connect.php";

$id = $_GET['id'];
$sql = "SELECT * FROM Dogtable WHERE DogID = $id";
$result = $database->query($sql);
$row = $result->fetch_assoc();
?>



<h2>Edit Dog Record</h2>
<div class="m-3">
    <form method="POST" action=<?php echo "makeDogUpdate.php?id=$id"; ?>>

        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value=<?= $row['DogName'] ?>>

        <label for="breed">Breed</label>
        <input type="text" id="breed" name="breed" class="form-control" value=<?= $row['DogBreed'] ?>>

        <label for="sex">Sex</label>
        <input type="text" id="sex" name="sex" class="form-control" value=<?= $row['DogSex'] ?>>

        <label for="age">Age</label>
        <input type="text" id="age" name="age" class="form-control" value=<?= $row['DogAge'] ?>>

        <label for="color">Color</label>
        <input type="text" id="color" name="color" class="form-control" value=<?= $row['DogColor'] ?>>

        <label for="size">Size</label>
        <input type="text" id="size" name="size" class="form-control" value=<?= $row['DogSize'] ?>>

        <label for="description">Description</label>
        <input type="text" id="description" name="description" class="form-control" value=<?= $row['DogDescription'] ?>>

        <label for="medicalInfo">Medical Information</label>
        <input type="text" id="medicalInfo" name="medicalInfo" class="form-control" value=<?= $row['DogMedical'] ?>>

        <br>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

    <?php
    include "footer.php";
    ?>