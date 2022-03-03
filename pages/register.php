<section>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <div class="container">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="container ">
                                <div class="col-lg-12">
                                    <h3 class="text-center mb-5 text-warning ">Sign Up</h3>
                                    <p class="text-center">Already have account? <a href="#" onclick="ajaxLoginPageCall()" class=" text-decoration-none text-warning">Sign In</a></p>
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
                                                <label for="ContactNo" class="form-label">Contact No</label>
                                                <input type="tel" class="form-control border-warning  shadow-none" name="ContactNo" id="ContactNo" required />
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
                                                <label for="loginPassword" class="form-label">Password</label>
                                                <input type="password" class="form-control border-warning  shadow-none" name="loginPassword" id="loginPassword" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="secret" class="form-label">secret</label>
                                                <input type="password" class="form-control border-warning  shadow-none" name="secret" id="secret" required />
                                            </div>
                                        </div>
                                        <p class="fw-bold text-warning"><span class="signUpRespones"></span></p>
                                        <div class=" mb-3 text-center">
                                            <input type="button" onclick="signUpForContacts()" name="signUp" class="btn btn-sm btn-warning  text-white rounded-pill" style="font-size:20px;" value="Sign Up" />
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