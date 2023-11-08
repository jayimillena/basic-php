<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<a href="add.php">Add student</a>
<?php

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'student_record');

// Check connection
if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

// Get the list of students
$sql = "SELECT * FROM students";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Action</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo
 
"<tr>";
        echo
 
"<td>" . $row['id'] . "</td>";
        echo
 
"<td>" . $row['name'] . "</td>";
        echo
 
"<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No students found.";
}

$db->close();

?>
</body>
</html>

