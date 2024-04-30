<?php
include "header.php";
include "connect.php";


?>


<div class="m-5">
<?php

//Check if ID is provided
if (!isset($_GET['id'])) {
    echo "No record ID provided.";
    exit();
}

//Delete the record
$id = $_GET['id'];
$sql = "DELETE FROM Dogtable WHERE DogID = $id";

if ($database->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $database->error;
}

?>
<br>
<a href="admin.php"><button class="btn btn-success">Return</button></a>

</div>