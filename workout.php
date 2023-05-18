<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data here
    // Access the form fields using $_POST superglobal

    // For example, to get the value of a field with name "duration":
    $duration = $_POST['duration'];

    // Perform any necessary operations with the form data

    // Return a response to the client
    echo 'Form submitted successfully!';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workout</title>
</head>
<body>
    <header>
        <a href="#" id="logo"></a>
        <nav>
            <ul>
                <li class="menu"><a href="#"><img src="images/jack.jpg" class="jack" alt="Profile">Profile</a></li>
                <li class="menu"><a href="#"><img src="images/history.png" alt="History">History</a></li>
                <li class="selected menu"><a href="#"><img src="images/start_selected.png" alt="Start">Start</a></li>
                <li class="menu"><a href="#"><img src="images/plans.png" alt="Plans">Plans</a></li>
                <li class="menu"><a href="#"><img src="images/highlights.png" alt="Highlights">Highlights</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>