<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/logo_title.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
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
    <main>
        <?php
        if (isset($_POST['exercises'])) {
            $exercises = $_POST["exercises"];
            echo "<h1 style='margin-top: 10%;margin-left: 5%;'>Starting Workout With These Exercises:</h1>";
            echo "<ul style='margin-left: 5%;'>";
            foreach ($exercises as $exercise) {
                echo "<li>$exercise</li>";
            }
            echo "</ul>";
        } else {
            echo "<h1 style='margin-top: 10%;margin-left: 5%;'>No exercises submitted!</h1>";
        }
        ?>
    </main>
</body>
</html>