<?php

include "header.php";
include "connect.php";

//Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve data from form
    $id = $_GET['id'];
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $description = $_POST['description'];
    $medicalInfo = $_POST['medicalInfo'];


    $sql = "update Dogtable
    set DogName = '$name', DogBreed = '$breed', DogSex = '$sex', DogAge = $age, DogColor = '$color',
    DogSize = '$size', DogDescription = '$description', DogMedical = '$medicalInfo'
    where DogID = $id;";

    if (mysqli_query($database, $sql)) {
        header("Location: manageDogs.php");
    } else {
        echo "
        <h1>Error saving record</h1>
        <p>Please return to the previous page</p>
        <a href='editDog.php?id=$id'><button class='btn btn-primary'>Return</button></a>

        ";
    }
}

include "footer.php";
