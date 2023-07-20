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
    <link rel="icon" href="images/logo_title.png" type="image/png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alef">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
                <li class="menu"><a href="start.php"><img src="images/start.png" alt="Start">Start</a></li>
                <li class="menu"><a href="index.php"><img src="images/plans.png" alt="Plans">Plans</a></li>
                <li class="selected menu"><a href="#"><img src="images/highlights_selected.png" alt="Highlights">Highlights</a></li>
            </ul>
        </nav>
    </header>
    <main>
    <div class="margin_top">
        <div class="margin_left">
        <h1>Highlights</h1>
        <h4>20/06/2023</h4>
        </div>
        <div class="card mt-3 margin_left_right">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-red mr-2"></i>Heavy Load</h6>
            <span class="text-secondary">Decrease load weight</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-yellow mr-2"></i>Load Imbalance</h6>
            <span class="text-secondary">Make sure the arms angles match in both sides</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-gray mr-2"></i>Elbow Lock</h6>
            <span class="text-secondary">Don't lock the elbows during exercise</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-gray mr-2"></i>Resting Time</h6>
            <span class="text-secondary">Increase the resting time between sets</span>
            </li>
            </ul>
        </div>
            <h4 class="margin_left">20/02/2023</h4>
            <div class="card mt-3 margin_left_right">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-red mr-2"></i>Critical Alert</h6>
            <span class="text-secondary">How to FIXIT</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-yellow mr-2"></i>Important Alert</h6>
            <span class="text-secondary">How to FIXIT</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-yellow mr-2"></i>Important Alert</h6>
            <span class="text-secondary">How to FIXIT</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-gray mr-2"></i>Alert</h6>
            <span class="text-secondary">How to FIXIT</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-gray mr-2"></i>Alert</h6>
            <span class="text-secondary">How to FIXIT</span>
            </li>      
            </ul></div>
            <h4 class="margin_left">17/02/2023</h4>
            <div class="card mt-3 margin_left_right">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-red mr-2"></i>Critical Alert</h6>
            <span class="text-secondary">How to FIXIT</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-red mr-2"></i>Critical Alert</h6>
            <span class="text-secondary">How to FIXIT</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-yellow mr-2"></i>Important Alert</h6>
            <span class="text-secondary">How to FIXIT</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-gray mr-2"></i>Alert</h6>
            <span class="text-secondary">How to FIXIT</span>
            </li>
            </ul></div>
            <h4 class="margin_left">16/02/2023</h4>
            <div class="card mt-3 margin_left_right">
            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
            <h6 class="mb-0"><i class="fas fa-circle text-dot-red mr-2"></i>Critical Alert</h6>
            <span class="text-secondary">How to FIXIT</span>
            </li>
        </ul>
        </div>
    </div>
    </main>

    <footer>

    </footer>
</body>
</html>