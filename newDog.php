<?php 

include "header.php";
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //Get form data
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $color = $_POST['color'];
    $size = $_POST['size'];
    $description = $_POST['description'];
    $medicalInfo = $_POST['medicalInfo'];
}


$sql = "insert into Dogtable (DogName, DogBreed, DogSex, DogAge, DogColor, 
DogSize, DogDescription, DogMedical)
values ('$name', '$breed', '$sex', '$age'
, '$color', '$size', '$description', '$medicalInfo');";

if (mysqli_query($database, $sql)) {
    echo "<h3>Record successfully added.</h3>";


} else {
    echo "Error: " . $sql . "<br>" . $database->error;
}

?>

<a href='admin.php'><button class="btn btn-success">Return</button></a>




<?php

include "footer.php";

?>