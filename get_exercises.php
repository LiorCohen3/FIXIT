<?php

include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);
    $muscle = $data['muscle'];

    $query = "SELECT * FROM tbl_223_exercises WHERE muscle = '$muscle'";

    $result = mysqli_query($connection, $query);

    $exercises = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $exercises[] = $row;
    }

    mysqli_close($connection);

    header('Content-Type: application/json');
    echo json_encode($exercises);
}
?>
