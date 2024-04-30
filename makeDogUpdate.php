<?php
echo'Hello';
// Check if form is submitted
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Retrieve data from form
//     $id = $_POST['id'];
//     $updates = $_POST['updates']; // An associative array of field names and new values

//     // Prepare update statement
//     $sql = "UPDATE Dogtable SET ";

//     // Generate placeholders for each field
//     $fields = array_keys($updates);
//     $placeholders = array_map(function ($field) {
//         return "$field = ?";
//     }, $fields);
//     $sql .= implode(", ", $placeholders);
//     $sql .= " WHERE id = ?";

//     // Prepare and bind parameters
//     $stmt = $conn->prepare($sql);

//     // Generate types string for bind_param
//     $types = str_repeat("s", count($fields)) . "i";
//     $bindParams = array_merge([$types], array_values($updates), [$id]);

//     // Bind parameters dynamically
//     call_user_func_array(array($stmt, 'bind_param'), $bindParams);

//     // Execute the update
//     if ($stmt->execute()) {
//         echo "Record updated successfully";
//     } else {
//         echo "Error updating record: " . $conn->error;
//     }

//     // Close statement
//     $stmt->close();
// }

// // Close connection
// $conn->close();
?>


