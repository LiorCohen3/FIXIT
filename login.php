<?php
    include 'db.php';
    include 'config.php';
    
    session_start();
    if(isset($_SESSION["user_id"])){
        header('Location: ' . URL . 'index.php');
    }

    if(!empty($_POST["loginMail"])) { // true if form was submitted
        $query  = "SELECT * FROM tbl_223_users WHERE email='" 
        . $_POST["loginMail"] 
        . "' and password = '"
        . $_POST["loginPass"]
        ."'";
        
        $result = mysqli_query($connection , $query);
        $row    = mysqli_fetch_array($result);

        if(is_array($row)) {
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["user_type"] = $row['type'];
            header('Location: ' . URL . 'index.php');////////////////////////////////////////////////////////
        } else {
            $message = "Invalid Username or Password!";
            // echo $message;
        }
        echo $message; // can't start echo if header comes after it
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

    <div class="container text-center col-6">
        <h1>Login</h1>
        <form action="#" method="post" id="frm">
            <div class="form-group">
                <label for="loginMail">Email: </label>
                <input type="email" class="form-control" name="loginMail" id="loginMail" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="loginPass">Password: </label>
                <input type="password" class="form-control" name="loginPass" id="loginPass" placeholder="Enter Password">
            </div>
            <br><br>
            <button type="submit" class="btn btn-primary">Log In</button>
            <div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>   
        </form>
    </div>
</body>
</html>
<?php
    mysqli_close($connection);
?>