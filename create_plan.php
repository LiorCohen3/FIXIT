<?php
    include 'db.php';
    include 'config.php';
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header('Location: ' . URL . 'login.php');
        exit();
    }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $length = $_POST["length"];
    $difficulty = $_POST["difficulty"];
    $division = $_POST["division"];
    $level = $_POST["level"];
    $image = $_POST["image"];


    $query = "INSERT INTO tbl_223_plans (name, length, difficulty, division, level, image) VALUES ('$name', '$length', '$difficulty', '$division', '$level', '$image')";
    $result = mysqli_query($connection, $query);

    if ($result) {
        header('Location: ' . URL . 'index.php');
        exit();
    } else {
        echo "Error creating plan: " . mysqli_error($connection);
        header('Location: ' . URL . 'index.php');
    }
}
?>
