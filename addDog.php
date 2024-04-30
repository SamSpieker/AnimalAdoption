<?php 

include "header.php";
include "connect.php";

?>

<h2>Add Dog</h2>
<div class="m-3">
<form method="POST" action="newDog.php">

    <label for="name">Name</label>
    <input type="text" id="name" name="name" class="form-control">

    <label for="breed">Breed</label>
    <input type="text" id="breed" name="breed" class="form-control">

    <label for="sex">Sex</label>
    <input type="text" id="sex" name="sex" class="form-control">

    <label for="age">Age</label>
    <input type="text" id="age" name="age" class="form-control">

    <label for="color">Color</label>
    <input type="text" id="color" name="color" class="form-control">

    <label for="size">Size</label>
    <input type="text" id="size" name="size" class="form-control">

    <label for="description">Description</label>
    <input type="text" id="description" name="description" class="form-control">

    <label for="medicalInfo">Medical Information</label>
    <input type="text" id="medicalInfo" name="medicalInfo" class="form-control">

    <br>
    <button type="submit" class="btn btn-primary">Add Dog</button>
</form>
</div>
<?php

include "footer.php";

?>