<?PHP
include "./dbConnect.php";
$msg = "";
$error = "";
if (isset($_POST['submit'])) {

    if ($_POST['email'] != "" && $_POST['name'] != "" && $_POST['contactNo'] != "" && $_POST['Secret'] && $_POST['password']) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contactNo = $_POST['contactNo'];
        $Secret = $_POST['Secret'];
        $password = $_POST['password'];
        $registerUser = mysqli_query($connect, "INSERT INTO `users`(`name`, `email`, `contactNo`, `password`, `Secret`) VALUES ('$name','$email','$contactNo','$password','$Secret')");
        if ($registerUser) {
            $msg = "Successfully registered.";
        } else {
            $error = "failed try again!";
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

    <title>Sign Up | Contact App</title>
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

            <h1 class="h3 mb-3 fw-normal text-warning">Sign Up</h1>
            </br>
            <p>Already have account? <a href="./index.php" class="text-decoration-none text-warning">Sign In</a></p>

            <div class="form-floating">
                <input type="text" class="form-control  text-warning" id="name" name="name" placeholder="Name">
                <label for="name">Name</label>
            </div>
            </br>
            <div class="form-floating">
                <input type="email" class="form-control  text-warning" id="email" name="email" placeholder="Email">
                <label for="email">Email</label>
            </div>
            </br>
            <div class="form-floating">
                <input type="tel" class="form-control  text-warning" id="contactNo" name="contactNo" placeholder="Contact Number">
                <label for="contactNo">Contact Number</label>
            </div>
            </br>
            <div class="form-floating">
                <input type="text" class="form-control  text-warning" id="Password" name="password" placeholder="Password">
                <label for="contactNo">Password</label>
            </div>
            </br>
            </br>
            <div class="form-floating">
                <input type="text" class="form-control  text-warning" id="Secret" name="Secret" placeholder="Secret">
                <label for="contactNo">Secret</label>
            </div>
            </br>
            <?PHP echo $retVal = ($msg == "") ? "" : "<p class='text-success'>*$msg</p>";
            echo $error = ($error == "") ? "" : "<p class='text-warning'>*$error</p>"; ?>
            <input class="w-100 btn btn-lg btn-warning" type="submit" value="Sign Up" name="submit" />
            <div class="checkbox mb-3">
                <label>
                    <p class="text-small text-warning"> By clicking "Sign Up" you can create account, you have to accept terms and conditions.</p>
                </label>
            </div>
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