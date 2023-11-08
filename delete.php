<?php

// Connect to the database
$db = new mysqli('localhost', 'root', '', 'student_record');

// Check connection
if ($db->connect_error) {
    die('Connection failed: ' . $db->connect_error);
}

// Delete the student from the database
$id = $_GET['id'];
$sql = "DELETE FROM students WHERE id=$id";

if ($db->query($sql) === TRUE) {
    echo "Data has been succesfuly delete";
} 