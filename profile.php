<?php
    include 'db.php';
    include 'config.php';

    session_start();
        if(!isset($_SESSION["user_id"])){
            header('Location: ' . URL . 'login.php');
        }

// Retrieve user profile image path from the database
$user_id = $_SESSION["user_id"];
$query = "SELECT * FROM tbl_223_users WHERE id = $user_id";
$result = mysqli_query($connection, $query);
$user_data = mysqli_fetch_assoc($result);
$profile_image_path = $user_data['profile'];
$full_name = $user_data['name'];
$email = $user_data['email'];
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="assets/edit.js"></script>
    <title>FIXIT</title>
</head>
<body>
    <header>
        <a href="#" id="logo"></a>
        <nav>
            <ul>
            <?php if ($is_admin): ?>
                <li class="selected menu"><a href="#"><img src="<?php echo $profile_image_path; ?>" class="profile_img" alt="Profile">Profile</a></li>
                <li class="menu"><a href="index.php"><img src="images/plans.png" alt="Plans">Plans</a></li>
                <li class="menu"><a href="start.php"><img src="images/start.png" alt="Start">Exercises</a></li>
            <?php else: ?>
                <li class="selected menu"><a href="#"><img src="<?php echo $profile_image_path; ?>" class="profile_img" alt="Profile">Profile</a></li>
                <li class="menu"><a href="history.php"><img src="images/history.png" alt="History">History</a></li>
                <li class="menu"><a href="start.php"><img src="images/start.png" alt="Start">Start</a></li>
                <li class="menu"><a href="index.php"><img src="images/plans_selected.png" alt="Plans">Plans</a></li>
                <li class="menu"><a href="highlights.php"><img src="images/highlights.png" alt="Highlights">Highlights</a></li>
            <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
    <div class="container margin_top">
    <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="<?php echo $profile_image_path; ?>" alt="Beautiful" class="rounded-circle" width="150">
                        <div class="mt-3">
                        <h4><?php echo $full_name; ?></h4>
                        <?php if ($is_admin): ?>
                            <p class="text-secondary mb-1">Admin</p>
                        <?php else: ?>
                            <p class="text-secondary mb-1">Beginner Trainee</p>
                        <?php endif; ?>
                        <form action="logout.php" method="post">
                            <button class="btn btn-outline-primary" type="submit">Logout</button>
                        </form>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                        <span class="text-secondary">https://Example.com</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                        <span class="text-secondary">@Example</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
                        <span class="text-secondary">Example</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                        <span class="text-secondary">Example</span>
                    </li>
                    </ul>
                </div>
                </div>
                <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Full Name</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $full_name; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Email</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        <?php echo $email; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Phone</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        111-11111
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Mobile</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        111-11111
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                        Shenkar
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="mt-3">
                            <button id ="editButton" class="btn btn-info" onclick="openEditModal()">Edit</button>
                        </div>
                    </div>
                    </div>
                </div>
                <?php if (!$is_admin): ?>
                <div class="row gutters-sm">
                    <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3">Progress</h6>
                            <canvas id="lineChart"></canvas>
                        </div>
                    </div>
                    </div>
                    <div class="col-sm-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                        <h6 class="d-flex align-items-center mb-3">Recommendations</h6>
                        <ul class="custom-list">
                            <li class="text-secondary">
                            Add more sets or exercises when working on chest - Its a large muscle and has more endurance
                            </li>
                            <li class="col-sm-9 text-secondary">Recommendation 2</li>
                            <li class="col-sm-9 text-secondary">Recommendation 3</li>
                            <li class="col-sm-9 text-secondary">Recommendation 4</li>
                        </ul>
                        </div>
                    </div>
                    </div>
                    <?php endif; ?>
                </div>
                </div>
            </div>

            </div>
        </div>
            <div id="editModal" class="modal">
            <div class="modal-content">
                <span id ="closeButton" class="close" onclick="closeEditModal()">&times;</span>
                <h2>Edit Profile</h2>
                <form action="update_profile.php" method="post">
                    <div class="form-group">
                        <label for="name">Full Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $full_name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>