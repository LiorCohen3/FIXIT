<?php
    include 'db.php';
    include 'config.php';

    session_start();
        if(!isset($_SESSION["user_id"])){
            header('Location: ' . URL . 'login.php');
        }
    $user_id = $_SESSION["user_id"];
    $query = "SELECT profile, type FROM tbl_223_users WHERE id = $user_id";
    $result = mysqli_query($connection, $query);
    $user_data = mysqli_fetch_assoc($result);
    $profile_image_path = $user_data['profile'];
    $user_type = $user_data['type'];
    $is_admin = ($user_type === 'admin');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/logo_title.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>FIXIT</title>
</head>
<body>
    <header>
        <a href="#" id="logo"></a>
        <nav>
            <ul>
            <?php if ($is_admin): ?>
                <li class="menu"><a href="profile.php"><img src="<?php echo $profile_image_path; ?>" class="profile_img" alt="Profile">Profile</a></li>
                <li class="menu"><a href="index.php"><img src="images/plans.png" alt="Plans">Plans</a></li>
                <li class="selected menu"><a href="#"><img src="images/start_selected.png" alt="Start">Exercises</a></li>
            <?php else: ?>
                <li class="menu"><a href="profile.php"><img src="<?php echo $profile_image_path; ?>" class="profile_img" alt="Profile">Profile</a></li>
                <li class="menu"><a href="history.php"><img src="images/history.png" alt="History">History</a></li>
                <li class="selected menu"><a href="#"><img src="images/start_selected.png" alt="Start">Start</a></li>
                <li class="menu"><a href="index.php"><img src="images/plans.png" alt="Plans">Plans</a></li>
                <li class="menu"><a href="highlights.php"><img src="images/highlights.png" alt="Highlights">Highlights</a></li>
            <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <div class="margin_top margin_left">
        <?php
            if (isset($_POST["selectedPlan"])) {
            $planId = $_POST["selectedPlan"];
            $query = "SELECT e.name FROM tbl_223_exercises AS e
                        JOIN tbl_223_plan_exercises AS pe ON e.id = pe.exercise_id
                        WHERE pe.plan_id = $planId;";
            $result = mysqli_query($connection, $query);
            echo "<h1>Starting workout with the next exercises:</h1>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>" . $row['name'] . "</p>";
            }

        } elseif (isset($_GET["exercise_id"])) {
            $exerciseId = $_GET["exercise_id"];
            $query = "SELECT * FROM tbl_223_exercises WHERE id = $exerciseId";
            $result = mysqli_query($connection, $query);
            $exercise = mysqli_fetch_assoc($result);

            echo "<h1>Starting workout with the following exercise:</h1>";
            echo $exercise['name'];

        } else {
            echo "<h1>No workout data provided.</h1>";
            // header('Location: ' . URL . 'index.php');
        }
        ?>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>