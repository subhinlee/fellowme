<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    </title>
    <!-- all links for css-->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <!-- all scripts for js and jQuery-->
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/signup.js"></script>
</head>

<body style="background-color: #1c2f52;">
<!-- Header  -->
<h1>
    <a href="" class="typewrite" data-period="2000" data-type='[ "WELCOME TO FELLOWME", "GOALS", "PASSION", "CHALLENGE" ]'>
        <span class="wrap"></span>
    </a>
</h1>
<!-- Login Form-->
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-login">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="login.php" class="active" id="login-form-link">Login</a>
                        </div>
                        <div class="col-xs-6">
                            <a href="register.php" id="register-form-link">Register</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--Login Form-->
                            <form id="login-form" role="form" style="display: block;">
                                <div class="form-group">
                                    <input type="text" name="userName" id="userName" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group text-center">
                                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                    <label for="remember"> Remember Me</label>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="Log In">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="text-center">
                                                <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Registration Form -->
                            <form id="register-form"  role="form" style="display: none;">
                                <div class="form-group">
                                    <input type="text" name="userName" id="userName" tabindex="1" class="form-control" placeholder="Username" value="">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <button onclick="regiterClicked()" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register">
                                                Register Now
                                            </button>
                                            <div id="message">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<script>

  function loginClicked(){

  }

  function regiterClicked(){
    var username = $('#userName').val();
    var password = $('#password').val();


    $.ajax({
      type: 'GET',
      contentType: 'application/json',
      url: '../api/register.php?userName=' + username + '&password=' + password,
      dataType: "json",
      //data:  FormToJSON($('#form-banner_add')),
      success: function(data, textStatus){

        $('#message').html(data['message']);

      },
      error: function(textStatus){
        console.log(textStatus);
      }
    })
  }

</script>
