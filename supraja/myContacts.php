<?PHP
session_start();
if (!isset($_SESSION['user'])) {
    header('location:./index.php');
}
include "./dbConnect.php";
$user = $_SESSION['user'];
$msg = "";
$error = "";
if (isset($_POST['submit'])) {
    if ($_POST['email'] != "" && $_POST['name'] != "" && $_POST['ContactNumber'] != "") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $contactNo = $_POST['ContactNumber'];
        $registerUser = mysqli_query($connect, "INSERT INTO `userContacts`(`userId`,`name`, `email`, `contactNo`) VALUES ('$user','$name','$email','$email')");
        if ($registerUser) {
            $msg = "Successfully Added";
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

    <title>My Contacts | Contact App</title>
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

            <h1 class="h3 mb-3 fw-normal text-warning">Add Contact</h1>
            </br>
            <div class="form-floating">
                <input type="text" class="form-control  text-warning" name="name" id="ContactName" placeholder="name@example.com">
                <label for="ContactName"> Name</label>
            </div>
            <div class="form-floating">
                <input type="tel" class="form-control  text-warning" name="ContactNumber" placeholder="Contact Number">
                <label for="ContactNumber">Contact Number</label>
            </div>
            <div class="form-floating">
                <input type="email" class="form-control  text-warning" name="email" id="email" placeholder="email">
                <label for="email">Email</label>
            </div>
            </br>
            <?PHP echo $retVal = ($msg == "") ? "" : "<p class='text-success'>*$msg</p>";
            echo $error = ($error == "") ? "" : "<p class='text-warning'>*$error</p>"; ?>
            <input class="w-100 btn btn-lg btn-warning" type="submit" value="Add Contact" name="submit" />
        </form>
        <br>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact No</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
                            $SelectContacts = mysqli_query($connect, "SELECT * FROM `userContacts` WHERE `userId` = '$user'");
                            if (mysqli_num_rows($SelectContacts) != 0) {
                                $i = 1;
                                while ($row = mysqli_fetch_array($SelectContacts)) { ?>
                                    <tr>
                                        <th scope="row"><?PHP echo $i; ?></th>
                                        <td><?PHP echo $row['name']; ?></td>
                                        <td><?PHP echo $row['email']; ?></td>
                                        <td><?PHP echo $row['contactNo']; ?></td>
                                    </tr>
                                <? }
                            } else { ?>
                                <tr>
                                    <th scope="row" colspan="4">No Date Found</th>
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>