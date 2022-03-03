<section>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="container ">
                                <div class="col-lg-12">
                                    <h3 class="text-center mb-5 text-warning ">Forgot Password</h3>
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
                                                <label for="loginPassword" class="form-label">New Password</label>
                                                <input type="password" class="form-control border-warning  shadow-none" name="loginPassword" id="loginPassword" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="secret" class="form-label">Secret</label>
                                                <input type="text" class="form-control border-warning  shadow-none" name="secret" id="secret" required />
                                            </div>
                                        </div>
                                        <p class="text-end"><a href="index.php" class="text-decoration-none text-warning">Login</a></p>
                                        <p class="fw-bold text-warning"><span class="Forgot-Password-Alerts"></span></p>
                                        <div class=" mb-3 text-center">
                                            <input type="button" onclick="forgotPassword()" name="loginSubmit" class="btn btn-sm btn-warning  text-white rounded-pill" style="font-size:20px;" value="Update" />
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