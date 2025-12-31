<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_database"; 


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Lidhja dështoi: " . $conn->connect_error);
}

$emri_studentit = $_POST['emriStudentit'];
$numri_id = $_POST['numriID'];
$semestri = $_POST['semestri'];
$data_regjistrimit = $_POST['data'];
$lendet = $_POST['lendet'];
$pershkrimi = $_POST['pershkrimi'];


$sql = "INSERT INTO regjistrimi_semestrit (emri_studentit, numri_id, semestri, data_regjistrimit, lendet, pershkrimi) 
        VALUES ('$emri_studentit', '$numri_id', '$semestri', '$data_regjistrimit', '$lendet', '$pershkrimi')";

if ($conn->query($sql) === TRUE) {
    echo "Regjistrimi u krye me sukses!";
    header("refresh:2;url=dashboard.php");
} else {
    echo "Gabim: " . $conn->error;
}


$conn->close();
?>
