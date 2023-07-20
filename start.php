<?php
    include 'db.php';
    include 'config.php';

    session_start();
        if(!isset($_SESSION["user_id"])){
            header('Location: ' . URL . 'login.php');
        }
    $user_id = $_SESSION["user_id"];
    $query = "SELECT profile FROM tbl_223_users WHERE id = $user_id";
    $result = mysqli_query($connection, $query);
    $user_data = mysqli_fetch_assoc($result);
    $profile_image_path = $user_data['profile'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="images/logo_title.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/start.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <title>FIXIT</title>
</head>
<body>
    <header>
        <a href="#" id="logo"></a>
        <nav>
            <ul>
                <li class="menu"><a href="profile.php"><img src="<?php echo $profile_image_path; ?>" class="profile_img" alt="Profile">Profile</a></li>
                <li class="menu"><a href="history.php"><img src="images/history.png" alt="History">History</a></li>
                <li class="selected menu"><a href="#"><img src="images/start_selected.png" alt="Start">Start</a></li>
                <li class="menu"><a href="index.php"><img src="images/plans.png" alt="Plans">Plans</a></li>
                <li class="menu"><a href="highlights.php"><img src="images/highlights.png" alt="Highlights">Highlights</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <div class="margin_left_right margin_top">
    <div class="card-group" id="muscles-container">
    </div>
    </div>
    </main>
    <footer>

    </footer>
</body>
</html>