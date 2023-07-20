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
    <script src="assets/script.js"></script>
    <title>FIXIT</title>
</head>
<body>
    <header>
        <a href="#" id="logo"></a>
        <nav>
        <ul>
            <?php if ($is_admin): ?>
                <li class="menu"><a href="profile.php"><img src="<?php echo $profile_image_path; ?>" class="profile_img" alt="Profile">Profile</a></li>
                <li class="selected menu"><a href="#"><img src="images/plans_selected.png" alt="Plans">Plans</a></li>
                <li class="menu"><a href="start.php"><img src="images/start.png" alt="Start">Exercises</a></li>
            <?php else: ?>
                <li class="menu"><a href="profile.php"><img src="<?php echo $profile_image_path; ?>" class="profile_img" alt="Profile">Profile</a></li>
                <li class="menu"><a href="history.php"><img src="images/history.png" alt="History">History</a></li>
                <li class="menu"><a href="start.php"><img src="images/start.png" alt="Start">Start</a></li>
                <li class="selected menu"><a href="#"><img src="images/plans_selected.png" alt="Plans">Plans</a></li>
                <li class="menu"><a href="highlights.php"><img src="images/highlights.png" alt="Highlights">Highlights</a></li>
            <?php endif; ?>
        </ul>
        </nav>
    </header>
    <main>
    <div class="plans_wrapper">
        <div class="h1_holder">
            <?php if ($is_admin): ?>
                <h1>Database Plans:</h1>
        </div>
        <button class="submit_button create-button" onclick="openCreateModal()">Create New Plan</button>
                <div class="plans_holder">
                    <?php
                    // Retrieve plans associated with the current user
                    $query = "SELECT * FROM tbl_223_plans";
                    $result = mysqli_query($connection, $query);

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="plan">
                            <div class="crop">
                                <img src="<?php echo $row['image']; ?>">
                            </div>
                            <div class="plan_bottom">
                                <div class="plan_title">
                                    <h2><?php echo $row['name']; ?></h2>
                                </div>
                                <div class="plan_details" id="plan_details_<?php echo $row['id']; ?>">
                                    <div class="plan_text_holder">
                                        <div class="plan_text_div">
                                            <p>Duration: <?php echo $row['length']. ' minutes'; ?></p>
                                            <div class="text_decorator"></div>
                                        </div>
                                        <div class="plan_text_div">
                                            <p>Difficulty: <?php echo $row['difficulty']; ?></p>
                                            <div class="text_decorator"></div>
                                        </div>
                                        <div class="plan_text_div">
                                            <p>Division: <?php echo $row['division']; ?></p>
                                            <div class="text_decorator"></div>
                                        </div>
                                    </div>
                                    <div class="exercises_list_div">
                                        <?php  
                                        $exercise_query = "SELECT e.*
                                            FROM tbl_223_exercises AS e
                                            JOIN tbl_223_plan_exercises AS pe ON e.id = pe.exercise_id
                                            WHERE pe.plan_id = " . $row['id'];
                                            $exercise_result = mysqli_query($connection, $exercise_query);
                                            echo "<h2>Exercises in Plan</h2><ul>";
                                            while ($row_e = mysqli_fetch_assoc($exercise_result)){
                                                echo "<li>" . $row_e['name'] . "</li>";
                                            }
                                            echo "</ul>";
                                        ?>
                                    </div>
                                    <div class="buttons">
                                    <button class="submit_button edit-button" type="button" onclick="openEditModal(
                                                                                            <?php echo $row['id']; ?>,
                                                                                            '<?php echo addslashes($row['name']); ?>',
                                                                                            '<?php echo addslashes($row['length']); ?>',
                                                                                            '<?php echo addslashes($row['difficulty']); ?>',
                                                                                            '<?php echo addslashes($row['division']); ?>'
                                                                                        )">Edit</button>
                                    <button class="submit_button delete-button" data-plan-id="<?php echo $row['id']; ?>">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="editModal" class="modal">
                        <div class="modal-content">
                            <span id ="closeButton" class="close" onclick="closeEditModal()">&times;</span>
                            <h2>Edit Profile</h2>
                            <form action="update_plan.php" method="post">
                                <input type="hidden" id="plan_id" name="plan_id" value="">
                                <div class="form-group">
                                    <label for="name">Plan name:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>
                                <div class="form-group">
                                    <label for="length">Length:</label>
                                    <input type="" class="form-control" id="length" name="length" value="">
                                </div>
                                <div class="form-group">
                                    <label for="difficulty">Difficulty:</label>
                                    <input type="text" class="form-control" id="difficulty" name="difficulty" value="">
                                </div>
                                <div class="form-group">
                                    <label for="division">Division:</label>
                                    <input type="text" class="form-control" id="division" name="division" value="">
                                </div>
                                <button type="submit" class="submit_button margin_top">Save Changes</button>
                            </form>
                        </div>
                    </div>

                    <div id="createModal" class="modal">
                        <div class="modal-content">
                            <span id="closeCreateButton" class="close" onclick="closeCreateModal()">&times;</span>
                            <h2>Create New Plan</h2>
                            <form action="create_plan.php" method="post">
                                <div class="form-group">
                                    <label for="create_name">Plan name:</label>
                                    <input type="text" class="form-control" id="create_name" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label for="create_length">Length:</label>
                                    <input type="text" class="form-control" id="create_length" name="length" required>
                                </div>
                                <div class="form-group">
                                    <label for="create_difficulty">Difficulty:</label>
                                    <input type="text" class="form-control" id="create_difficulty" name="difficulty" required>
                                </div>
                                <div class="form-group">
                                    <label for="create_division">Division:</label>
                                    <input type="text" class="form-control" id="create_division" name="division" required>
                                </div>
                                <div class="form-group">
                                    <label for="create_level">Level:</label>
                                    <input type="text" class="form-control" id="create_level" name="level" required>
                                </div>
                                <div class="form-group">
                                    <label for="create_image">Image path:</label>
                                    <input type="text" class="form-control" id="create_image" name="image" required>
                                </div>
                                <button type="submit" class="submit_button margin_top">Create Plan</button>
                            </form>
                        </div>
                    </div>










        <?php else: ?>
            <h1>Suggested Plans:</h1>
        </div>
        <div class="plans_holder">
            <?php
            // Retrieve plans associated with the current user
            $query = "SELECT p.*, 
                        FLOOR(CASE 
                                WHEN p.level >= u.level THEN (u.level / p.level) * 100
                                ELSE (p.level / u.level) * 100
                            END) AS match_percentage
                        FROM tbl_223_plans AS p
                        JOIN tbl_223_user_plans AS up ON p.id = up.plan_id AND up.user_id = $user_id
                        LEFT JOIN tbl_223_users AS u ON u.id = $user_id
                        ORDER BY match_percentage DESC";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="plan">
                    <div class="crop">
                        <img src="<?php echo $row['image']; ?>">
                    </div>
                    <div class="plan_bottom">
                        <div class="plan_title">
                            <h2><?php echo $row['name']; ?></h2>
                            <div class="bar_blue">
                                <p><?php echo $row['match_percentage']; ?>% match</p>
                                <div class="bar_white" style="width: <?php echo (100-$row['match_percentage']); ?>%"></div>
                            </div>
                        </div>
                        <div class="plan_details" id="plan_details_<?php echo $row['id']; ?>">
                            <div class="plan_text_holder">
                                <div class="plan_text_div">
                                    <p>Duration: <?php echo $row['length']. ' minutes'; ?></p>
                                    <div class="text_decorator"></div>
                                </div>
                                <div class="plan_text_div">
                                    <p>Difficulty: <?php echo $row['difficulty']; ?></p>
                                    <div class="text_decorator"></div>
                                </div>
                                <div class="plan_text_div">
                                    <p>Division: <?php echo $row['division']; ?></p>
                                    <div class="text_decorator"></div>
                                </div>
                            </div>
                            <div class="exercises_list_div">
                                <?php  
                                $exercise_query = "SELECT e.*
                                    FROM tbl_223_exercises AS e
                                    JOIN tbl_223_plan_exercises AS pe ON e.id = pe.exercise_id
                                    WHERE pe.plan_id = " . $row['id'];
                                    $exercise_result = mysqli_query($connection, $exercise_query);
                                    echo "<h2>Exercises in Plan</h2><ul>";
                                    while ($row_e = mysqli_fetch_assoc($exercise_result)){
                                        echo "<li>" . $row_e['name'] . "</li>";
                                    }
                                    echo "</ul>";
                                ?>
                            </div>
                            <form action="begin_workout.php" method="post">
                                <input type="hidden" name="selectedPlan" value="<?php echo $row['id']; ?>">
                                <div class="button_div">
                                    <button type="submit" class="submit_button">Begin Workout!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
    </div>

    <div class="h1_holder">
    <h1>More Plans For You:</h1>
        </div>
        <div class="plans_holder">
            <?php
            // Retrieve plans not associated with the current user
            $query = "SELECT p.*, 
                        FLOOR(CASE 
                            WHEN u.level >= p.level THEN (p.level / u.level) * 100
                            ELSE (u.level / p.level) * 100
                        END) AS match_percentage
                        FROM tbl_223_plans AS p
                        LEFT JOIN tbl_223_user_plans AS up ON p.id = up.plan_id AND up.user_id = $user_id
                        LEFT JOIN tbl_223_users AS u ON u.id = $user_id
                        WHERE up.plan_id IS NULL
                        ORDER BY match_percentage DESC";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="plan">
                    <div class="crop">
                        <img src="<?php echo $row['image']; ?>">
                    </div>
                    <div class="plan_bottom">
                        <div class="plan_title">
                            <h2><?php echo $row['name']; ?></h2>
                            <div class="bar_blue">
                                <p><?php echo $row['match_percentage']; ?>% match</p>
                                <div class="bar_white" style="width: <?php echo (100-$row['match_percentage']); ?>%"></div>
                            </div>
                        </div>
                        <div class="plan_details" id="plan_details_<?php echo $row['id']; ?>">
                            <div class="plan_text_holder">
                                <div class="plan_text_div">
                                    <p>Duration: <?php echo $row['length']. ' minutes'; ?></p>
                                    <div class="text_decorator"></div>
                                </div>
                                <div class="plan_text_div">
                                    <p>Difficulty: <?php echo $row['difficulty']; ?></p>
                                    <div class="text_decorator"></div>
                                </div>
                                <div class="plan_text_div">
                                    <p>Division: <?php echo $row['division']; ?></p>
                                    <div class="text_decorator"></div>
                                </div>
                            </div>
                            <div class="exercises_list_div">
                                <?php  
                                $exercise_query = "SELECT e.*
                                    FROM tbl_223_exercises AS e
                                    JOIN tbl_223_plan_exercises AS pe ON e.id = pe.exercise_id
                                    WHERE pe.plan_id = " . $row['id'];
                                    $exercise_result = mysqli_query($connection, $exercise_query);
                                    echo "<h2>Exercises in Plan</h2><ul>";
                                    while ($row_e = mysqli_fetch_assoc($exercise_result)){
                                        echo "<li>" . $row_e['name'] . "</li>";
                                    }
                                    echo "</ul>";
                                ?>
                            </div>
                            <form action="begin_workout.php" method="post">
                                <input type="hidden" name="selectedPlan" value="<?php echo $row['id']; ?>">
                                <div class="button_div">
                                    <button type="submit" class="submit_button">Begin Workout!</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php endif; ?>
    </main>
    <footer>

    </footer>
</body>
</html>