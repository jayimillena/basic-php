<?php

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'student_record');

// Check connection
if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

// Add the student to the database
if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO students (name) VALUES ('$name')";

    if ($db->query($sql) === TRUE) {
        echo "Student added successfully.";
        header('Location: index.php');
        exit();
    } else {
        echo "Error adding student: " . $db->error;
    }
}

echo "<h1>Add Student</h1>";

echo "<form method='post'>";
echo "<label for='name'>Name:</label>";
echo "<input type='text' id='name' name='name' required>";
echo "<br>";
echo "<button type='submit'>Add Student</button>";
echo "</form>";

$db->close();

?>