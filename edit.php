<?php

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'student_record');

// Check connection
if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

// Get the student to be edited
$id = $_GET['id'];
$sql = "SELECT * FROM students WHERE id=$id";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Student not found.";
    exit();
}

// Update the student in the database
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "UPDATE students SET name='$name' WHERE id=$id";

    if ($db->query($sql) === TRUE) {
        echo "Student updated successfully.";
        header('Location: index.php');
        exit();
    } else {
        echo "Error updating student: " . $db->error;
    }
}

echo "<h1>Edit Student</h1>";

echo "<form method='post'>";
echo "<label for='name'>Name:</label>";
echo "<input type='text' id='name' name='name' value='" . $row['name'] . "' required>";
echo "<br>";
echo "<button type='submit'>Update Student</button>";
echo "</form>";

$db->close();

?>