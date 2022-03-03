<?PHP
include "./dbConnect.php";
$msg = "";
$error = "";
if (isset($_POST['submit'])) {

    if ($_POST['email'] != "" && $_POST['password']) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $registerUser = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
        if (mysqli_num_rows($registerUser) == 1) {
            $row = mysqli_fetch_array($registerUser);
            session_start();
            $_SESSION['user'] = $row['sno'];
            if (isset($_SESSION['user'])) {
                header('location:./myContacts.php');
            }
        } else {
            $error = "Invalid User!";
        }
    } else {
        $error = "Please fill in all required fields";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Sign in | Contact App</title>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

            <h1 class="h3 mb-3 fw-normal   text-warning">Sign in</h1>
            </br>
            <p>Do you have account? <a href="./signUp.php" class="text-decoration-none   text-warning">Sign Up</a></p>

            <div class="form-floating">
                <input type="email" class="form-control  text-warning" name="email" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            </br>
            <div class="form-floating">
                <input type="password" class="form-control  text-warning" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <p class="text-end"><a href="#" class="text-decoration-none text-warning">Forgot password?</a></p>
                </label>
            </div>
            <?PHP echo $retVal = ($msg == "") ? "" : "<p class='text-success'>*$msg</p>";
            echo $error = ($error == "") ? "" : "<p class='text-warning'>*$error</p>"; ?>
            <input class="w-100 btn btn-lg btn-warning" type="submit" value="Sign In" name="submit" />
        </form>
    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>