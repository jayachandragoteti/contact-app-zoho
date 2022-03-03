/*******************************************************************************/
/*******************************************************************************/
ajaxLoginPageCall();
// ========== Ajax Page Calls ==========
// Home Page Call
function ajaxLoginPageCall() {
  $('.ajax-main-content').html(
    '<img src="./assets/images/loging.gif" style="width:100%;"/>'
  );
  $.ajax({
    url: './pages/login.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
      $('.Home').addClass('active');
      myContacts();
    },
  });
}
// Sign Up Page Call
function ajaxsignUpPageCall() {
  $('.ajax-main-content').html(
    '<img src="./assets/images/loging.gif" style="width:100%;"/>'
  );
  $.ajax({
    url: './pages/register.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
    },
  });
}
// Sign Up Page Call
function ajaxForgotPasswordPageCall() {
  $('.ajax-main-content').html(
    '<img src="./assets/images/loging.gif" style="width:100%;"/>'
  );
  $.ajax({
    url: './pages/forgotPassword.php',
    success: function (response) {
      $('.ajax-main-content').html(response);
    },
  });
}

function signUpForContacts() {
  $('.signUpRespones').html(
    '<p class="text-danger"><i class="fas fa-spinner"></i> Loading...</p>'
  );
  let formData = {
    signUp: 'signUp',
    name: $('#name').val(),
    ContactNo: $('#ContactNo').val(),
    loginEmail: $('#loginEmail').val(),
    loginPassword: $('#loginPassword').val(),
    secret: $('#secret').val(),
  };
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: formData,
    success: function (response) {
      $('.signUpRespones').html(response);
    },
  });
}
function userLogin() {
  $('.User-Login-Alerts').html(
    '<p class="text-danger"><i class="fas fa-spinner"></i> Loading...</p>'
  );
  let formData = {
    SignIn: 'SignIn',
    loginEmail: $('#loginEmail').val(),
    loginPassword: $('#loginPassword').val(),
  };
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: formData,
    success: function (response) {
      if (response == 'loggedSuccessfully.') {
        window.location.assign('index.php');
        //ajaxAddContactsPageCall();
      }
      $('.User-Login-Alerts').html(response);
    },
  });
}

function addContact() {
  $('.add-Contacts-Alerts').html(
    '<p class="text-danger"><i class="fas fa-spinner"></i> Loading...</p>'
  );
  let formData = {
    addContact: 'addContact',
    name: $('#name').val(),
    loginEmail: $('#loginEmail').val(),
    contactNo: $('#contactNo').val(),
  };
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: formData,
    success: function (response) {
      myContacts();
      $('.add-Contacts-Alerts').html(response);
    },
  });
}

function forgotPassword() {
  $('.Forgot-Password-Alerts').html(
    '<p class="text-danger"><i class="fas fa-spinner"></i> Loading...</p>'
  );
  let formData = {
    forgotPassword: 'forgotPassword',
    loginEmail: $('#loginEmail').val(),
    loginPassword: $('#loginPassword').val(),
    secret: $('#secret').val(),
  };
  $.ajax({
    type: 'POST',
    url: './backScript.php',
    data: formData,
    success: function (response) {
      myContacts();
      $('.Forgot-Password-Alerts').html(response);
    },
  });
}
