<?php
    include 'db.php';
    include 'config.php';
    session_start();

    if (!isset($_SESSION["user_id"])) {
        header('Location: ' . URL . 'login.php');
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["plan_id"])) {
            $plan_id = $_POST["plan_id"];

            $name = $_POST["name"];
            $length = $_POST["length"];
            $difficulty = $_POST["difficulty"];
            $division = $_POST["division"];

            $update_query = "UPDATE tbl_223_plans SET name = '$name', length = '$length', difficulty = '$difficulty', division = '$division' WHERE id = $plan_id";
            $update_result = mysqli_query($connection, $update_query);

            if ($update_result) {
                header('Location: ' . URL . 'index.php');
                exit();
            } else {
                echo "Error updating plan details: " . mysqli_error($connection);
                header('Location: ' . URL . 'index.php');
            }
        }
    } else {
        header('Location: ' . URL . 'index.php');
        exit();
    }
?>






