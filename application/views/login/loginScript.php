<script type="text/javascript" src="<?php echo base_url('js/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
<script charset="utf-8" type="text/javascript">
$("#login").submit(function(e) {
  e.preventDefault();
  $.post("<?php echo site_url('welcome/submitLogin'); ?>", $("#login").serialize(), function(data) {

    switch (data) {
    case 'invalidLogin':
      $("#errorMessage").load("<?php echo site_url('welcome/invalidLogin'); ?>");
      break;
    case 'validLogin':
      // Load the dashboard page
      window.location.href = "<?php echo site_url('welcome/loadPage') ?>";
    default:
      $("#errorMessage").load("<?php echo site_url('welcome/invalidLogin'); ?>");
    }
  });
});

$( ".registerField" ).keypress(function( event ) {
  if ( event.which == 13 ) {
    $("#registerUserForm").submit();
  }
});

$("#registerUserButton").on("click", function() {
  $("#registerUserForm").submit();
});

$("#registerUserForm").submit(function(e) {
  e.preventDefault();

  if (!checkRegisterForm()) {
    $("#registerError").load("index.php/welcome/registerEmpty");
  } else {
    $.post("index.php/welcome/createUser", $("#registerUserForm").serialize(), function(data) {
      if (data == "existing") {
        $("#registerError").load("index.php/welcome/existing");
      } else if (data == "usernameLength") {
        $("#registerError").load('index.php/welcome/usernameLength');
      } else if (data == "passwordStrength") {
        $("#registerError").load('index.php/welcome/passwordStrength');
      } else if (data == 1) {
        $("#registerModal").modal('hide');
        $("#registerError").html("");
        $("#registerUserSuccess").load("index.php/welcome/registerSuccess");
      }
    });
  }
});

function checkRegisterForm() {
  if (!checkRegistrationFormForEmptyFields()) {
    return false;
  } else {
    return true;
  }
}

function checkRegistrationFormForEmptyFields() {
  if ($("#registerUsername").val() == "" || $("#registerPassword").val() == "") {
    return false;
  } else {
    return true;
  }
}
</script>
