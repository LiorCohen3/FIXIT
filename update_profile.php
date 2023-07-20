<?php
    include 'db.php';
    include 'config.php';

    session_start();
    if (!isset($_SESSION["user_id"])) {
        header('Location: ' . URL . 'login.php');
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $user_id = $_SESSION["user_id"];
        $new_name = $_POST["name"];
        $new_email = $_POST["email"];

        $update_query = "UPDATE tbl_223_users SET name = '$new_name', email = '$new_email' WHERE id = $user_id";
        $update_result = mysqli_query($connection, $update_query);

        if ($update_result) {
            header('Location: profile.php');
            exit();
        } else {
            echo "Error updating profile. Please try again.";
        }
    }
?>
