<?php
    include 'db.php';
    include 'config.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['plan_id'])) {
            $planId = $_POST['plan_id'];
            $deleteQuery = "DELETE FROM tbl_223_plans WHERE id = $planId";
            $result = mysqli_query($connection, $deleteQuery);

            if ($result) {
                header('Location: ' . URL . 'index.php');
                exit;
            } else {
                echo "Error deleting plan: " . mysqli_error($connection);
                header('Location: ' . URL . 'index.php');
            }
        } else {
            echo "Invalid request. Plan ID is missing.";
            header('Location: ' . URL . 'index.php');
        }
    } else {
        echo "Invalid request method.";
        header('Location: ' . URL . 'index.php');
    }
?>
