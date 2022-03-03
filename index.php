<?PHP
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!--Favicon-->
    <link rel="icon" href="./assets/images/logo.png" type="image/gif" sizes="16x16">
    <!-- Page title -->
    <title>Home | Contact App</title>
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Main CSS -->
    <link href="./assets/css/main.css" rel="stylesheet" />
</head>


<body>
    <!-- Header -->
    <header class="navbar navbar-dark bg-dark">
        <div class="container-fluid ">
            <div class="container d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center"> <i class="far fa-calendar-alt  text-white">&nbsp</i><span id="dateYear" class="text-white"></span> </div>
                <div class="d-flex align-items-center"> <i class="far fa-clock text-white">&nbsp</i> <span id="datetime" class="text-white"></span> </div>
            </div>
        </div>
    </header>
    <!-- End Header -->
    <!-- Navbar -->
    <nav>
        <div class="logo mx-auto"> <img src="./assets/images/logo.png" height="100px" width="100px"> </div>
        <input type="checkbox" id="click">
        <label for="click" class="menu-btn" id="sidebarCollapse"> <i class="fas fa-bars"></i> </label>
        <ul class="mx-auto">
            <?PHP
            if (isset($user)) { ?>
                <li><a href="#" class="text-decoration-none" onclick="ajaxAddContactsPageCall()"> <label for="click">Home</label></a></li>
                <li><a href="./logout.php" class="text-decoration-none"> Logout</a></li>
            <? } else { ?>
                <li><a href="#" class="text-decoration-none Home" onclick="ajaxHomePageCall()"> <label for="click">SignIn/SignUp</label></a></li>
            <? }
            ?>
        </ul>
    </nav>
    <!-- End Navbar -->

    <!-- Main -->
    <main class="ajax-main-content">


    </main>
    <!-- End Main -->

    <!-- Footer -->
    <div class="container-fluid pb-0 mb-0 justify-content-center text-white bg-dark ">
        <footer>
            <div class="row my-5 justify-content-center py-5">
                <div class="col-11">
                    <div class="row ">
                        <!-- Grid column -->
                        <div class="col-md-8 mt-md-0 mt-3">
                            <!-- Content -->
                            <h3 class="text-uppercase text-left">My Contacts.</h3>
                            <p>What a lot we lost when we stopped writing letters. You can't reread a phone call.</p>
                        </div>
                        <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                            <h6 class="mb-3 mb-lg-4 bold-text "><b>MENU</b></h6>
                            <ul class="list-unstyled">
                                <?PHP
                                if (isset($user)) { ?>
                                    <li><a href="#" class="text-decoration-none text-decoration-none text-white" onclick="ajaxAddContactsPageCall()"><i class="fas fa-angle-right"></i> <label for="click">Home</label></a></li>
                                    <li><a href="./logout.php" class="text-decoration-none text-white"><i class="fas fa-angle-right"></i> Logout</a></li>
                                <? } else { ?>
                                    <li><a href="#" class="text-decoration-none  text-white Home" onclick="ajaxHomePageCall()"> <label for="click"><i class="fas fa-angle-right"></i> SignIn/SignUp</label></a></li>
                                <? }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <!-- Copyright -->
            <div class="footer-copyright text-center py-3">©
                <script>
                    document.write(new Date().getFullYear())
                </script> Copyright: <a href="https://jayachandragoteti.github.io/" class="text-white">Jayachandra Goteti</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <!-- Footer -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="./assets/js/script.js"></script>
    <script src="./backScript.js"></script>
</body>

</html>