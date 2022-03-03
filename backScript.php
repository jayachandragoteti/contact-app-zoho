<?php
include_once "./connect.php";
date_default_timezone_set('Asia/Kolkata');
// mobile number validations Functions
function validate_mobile($mobile)
{
    return preg_match('/^[6-9]\d{9}$/', $mobile);
}
session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
}
if (isset($_POST['signUp']) && isset($_POST['name']) && isset($_POST['ContactNo']) && isset($_POST['loginEmail']) && isset($_POST['loginPassword']) && isset($_POST['secret'])) {
    if ($_POST['name'] != "" && $_POST['ContactNo'] != "" && $_POST['loginEmail'] != "" && $_POST['loginPassword'] != "" && $_POST['secret'] != "") {
        $name = $connect->real_escape_string($_POST['name']);
        $ContactNo = $connect->real_escape_string($_POST['ContactNo']);
        $loginEmail = $connect->real_escape_string($_POST['loginEmail']);
        $loginPassword = strtoupper($connect->real_escape_string($_POST['loginPassword']));
        $secret = $connect->real_escape_string($_POST['secret']);
        $userCheck = mysqli_query($connect, "SELECT * FROM `users` WHERE `users`.`email` = '$loginEmail'");
        if (mysqli_num_rows($userCheck) != 0) {
            echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> User already exists, Please login.</p>';
        } elseif (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
            echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Invalid email format!</p>';
        } elseif (!validate_mobile($ContactNo)) {
            echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Invalid Contact Number format!</p>';
        } elseif (strlen($loginPassword) < 8) {
            echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Password should contain at least eight characters!</p>';
        } else {
            $hashed_password = password_hash($loginPassword, PASSWORD_DEFAULT);
            $hashed_secret = password_hash($secret, PASSWORD_DEFAULT);
            $registerUser = mysqli_query($connect, "INSERT INTO `users`(`name`, `email`, `contactNo`, `password`, `Secret`) VALUES ('$name','$loginEmail','$ContactNo ','$hashed_password','$hashed_secret')");
            if ($registerUser) {
                echo '<p class="text-success"><i class="fas fa-check-circle"></i>Successfully registered.</p>';
            } else {
                echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Failed, Try Again! </p>';
            }
        }
    } else {
        echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> All fields must be filled!</p>';
    }
}

if (isset($_POST['SignIn']) && isset($_POST['loginEmail']) && isset($_POST['loginPassword'])) {
    if ($_POST['SignIn'] != "" && $_POST['loginEmail'] != "" && $_POST['loginPassword'] != "") {
        $loginEmail = $connect->real_escape_string($_POST['loginEmail']);
        $loginPassword = $connect->real_escape_string($_POST['loginPassword']);
        $searchUser = mysqli_query($connect, "SELECT * FROM `users` WHERE `users`.`email` = '$loginEmail'");
        if (mysqli_num_rows($searchUser) == 1) {
            $searchUserRow = mysqli_fetch_array($searchUser);
            // If the password inputs matched the hashed password in the database
            if (password_verify(strtoupper($loginPassword), $searchUserRow['password'])) {
                $_SESSION['user'] = $searchUserRow['sno'];
                if (isset($_SESSION['user'])) {
                    echo "loggedSuccessfully.";
                }
            } else {
                echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Invalid Password!</p>';
            }
        } else {
            echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Invalid login!</p>';
        }
    } else {
        echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> All fields must be filled!</p>';
    }
}

if (isset($_POST['addContact']) && isset($_POST['name']) && isset($_POST['loginEmail']) && isset($_POST['contactNo'])) {
    if ($_POST['addContact'] != "" && $_POST['name'] != "" && $_POST['loginEmail'] != "" && $_POST['contactNo'] != "") {
        $name = $connect->real_escape_string($_POST['name']);
        $email = $connect->real_escape_string($_POST['loginEmail']);
        $contactNo = $connect->real_escape_string($_POST['contactNo']);
        $user = $_SESSION['user'];
        $registerUser = mysqli_query($connect, "INSERT INTO `userContacts`(`userId`,`name`, `email`, `contactNo`) VALUES ('$user','$name','$email','$contactNo')");
        if ($registerUser) {
            echo '<p class="text-success"><i class="fas fa-check-circle"></i>Successfully Added.</p>';
        } else {
            echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Failed, Try Again! </p>';
        }
    } else {
        echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> All fields must be filled!</p>';
    }
}

if (isset($_POST['myContacts'])) {
    $SelectContacts = mysqli_query($connect, "SELECT * FROM `userContacts` WHERE `userId` = '$user' ORDER BY `sno` DESC");
    if (mysqli_num_rows($SelectContacts) != 0) {
        $i = 1;
        while ($row = mysqli_fetch_array($SelectContacts)) { ?>
            <tr>
                <th scope="row"><?PHP echo $i; ?></th>
                <td><?PHP echo $row['name']; ?></td>
                <td><?PHP echo $row['email']; ?></td>
                <td><?PHP echo $row['contactNo']; ?></td>
            </tr>
        <? $i++;
        }
    } else { ?>
        <tr>
            <th scope="row" colspan="4" class="text-center">No Date Found</th>
        </tr>
<? }
}

if (isset($_POST['forgotPassword']) && isset($_POST['loginEmail']) && isset($_POST['loginPassword']) && isset($_POST['secret'])) {
    if ($_POST['forgotPassword'] != "" && $_POST['loginEmail'] != "" && $_POST['loginPassword'] != "" && $_POST['secret'] != "") {
        $loginEmail = $connect->real_escape_string($_POST['loginEmail']);
        $loginPassword = strtoupper($connect->real_escape_string($_POST['loginPassword']));
        $secret = $connect->real_escape_string($_POST['secret']);
        $userCheck = mysqli_query($connect, "SELECT * FROM `users` WHERE `users`.`email` = '$loginEmail'");
        if (mysqli_num_rows($userCheck) != 1) {
            echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> User Not exists</p>';
        } elseif (!filter_var($loginEmail, FILTER_VALIDATE_EMAIL)) {
            echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Invalid email format!</p>';
        } elseif (strlen($loginPassword) < 8) {
            echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Password should contain at least eight characters!</p>';
        } else {
            $user = mysqli_fetch_array($userCheck);
            if (!password_verify($secret, $user['Secret'])) {
                echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Invalid Secret Key!</p>';
            } else {
                $hashed_password = password_hash($loginPassword, PASSWORD_DEFAULT);
                $update = mysqli_query($connect, "UPDATE `users` SET `password` = '$hashed_password' WHERE `email`='$loginEmail'");
                if ($update) {
                    echo '<p class="text-success"><i class="fas fa-check-circle"></i>Password Updated Successfully.</p>';
                } else {
                    echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Failed, Try Again! </p>';
                }
            }
        }

        // $user = $_SESSION['user'];
        // $registerUser = mysqli_query($connect, "INSERT INTO `userContacts`(`userId`,`name`, `email`, `contactNo`) VALUES ('$user','$name','$email','$contactNo')");
        // if ($registerUser) {
        //     echo '<p class="text-success"><i class="fas fa-check-circle"></i>Successfully Added.</p>';
        // } else {
        //     echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> Failed, Try Again! </p>';
        // }
    } else {
        echo '<p class="text-danger"><i class="fas fa-exclamation-circle"></i> All fields must be filled!</p>';
    }
}
