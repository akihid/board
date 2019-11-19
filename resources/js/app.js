require('./bootstrap');
require('./partials/marked');

$(document).on('click', '#test-user-login-btn', function() {
  var login_email = 'test@co.jp';
  var login_password = 'password';

  var login_email_form = document.querySelector('#email');
  var login_password_form = document.querySelector('#password');

  login_email_form.value = login_email;
  login_password_form.value = login_password;

  document.querySelector('#login-btn').click();
  
});