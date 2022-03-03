<?php
session_start();
if (!isset($_SESSION['user'])) { ?>
    <section>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-5">
                    <div class="container">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="container ">
                                    <div class="col-lg-12">
                                        <h3 class="text-center mb-5 text-warning ">Login</h3>
                                        <p class="text-center">Do you have account? <a href="#" onclick="ajaxsignUpPageCall()" class="text-decoration-none text-warning">Sign Up</a></p>
                                    </div>
                                    <div class="row">
                                        <form id="">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="loginEmail" class="form-label">Email</label>
                                                    <input type="email" class="form-control border-warning  shadow-none" name="loginEmail" id="loginEmail" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="loginPassword" class="form-label">Password</label>
                                                    <input type="password" class="form-control border-warning  shadow-none" name="loginPassword" id="loginPassword" required />
                                                </div>
                                            </div>
                                            <p class="text-end"><a href="#" onclick="ajaxForgotPasswordPageCall()" class="text-decoration-none text-warning">Forgot password?</a></p>
                                            <p class="fw-bold text-warning"><span class="User-Login-Alerts"></span></p>
                                            <div class=" mb-3 text-center">
                                                <input type="button" onclick="userLogin()" name="loginSubmit" class="btn btn-sm btn-warning  text-white rounded-pill" style="font-size:20px;" value="Login" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-5">
                    <div class="container">
                        <div class="card mt-5">
                            <div class="card-body">
                                <div class="container ">
                                    <div class="col-lg-12">
                                        <h3 class="text-center mb-5 text-warning ">Add Contacts</h3>
                                    </div>
                                    <div class="row">
                                        <form id="">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="name" class="form-label">Name</label>
                                                    <input type="text" class="form-control border-warning  shadow-none" name="name" id="name" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="loginEmail" class="form-label">Email</label>
                                                    <input type="email" class="form-control border-warning  shadow-none" name="loginEmail" id="loginEmail" required />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="contactNo" class="form-label">Contact No</label>
                                                    <input type="tel" class="form-control border-warning  shadow-none" name="contactNo" id="contactNo" required />
                                                </div>
                                            </div>
                                            <p class="fw-bold text-warning"><span class="add-Contacts-Alerts"></span></p>
                                            <div class=" mb-3 text-center">
                                                <input type="button" onclick="addContact()" name="loginSubmit" class="btn btn-sm btn-warning  text-white rounded-pill" style="font-size:20px;" value="Add" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-md-center mt-lg-4">
            </div>
            <div class="row justify-content-md-center mt-lg-4">
                <div class="col-md-12 mt-lg-4">

                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Contact No</th>
                            </tr>
                        </thead>
                        <tbody id="myContactResponse">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<script>
    function myContacts() {
        let formData = {
            myContacts: 'MyContactsList',
        };
        $.ajax({
            type: 'POST',
            url: './backScript.php',
            data: formData,
            success: function(response) {
                $('#myContactResponse').html(response);
            },
        });
    }
</script>