<?php
/*if(sizeof($_POST) > 0){
        echo"<pre>";
        print_r($_POST);
        $x = 21;
        echo"Your age is: $x\n";
        echo $_POST['email']."\n";
        echo"</pre>";

        $_POST['password'] = md5($_POST['password']);
        unset($_POST['password_confirmation']);

        file_put_contents('user.txt',json_encode($_POST)."\n",FILE_APPEND);
}*/
include_once 'dbconnect.php';
$msg = "";
if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = $conn->query("SELECT password FROM users WHERE email='{$email}'");
        $row=$query->fetch_array();

        if(password_verify($password, $row['password'])) {
                header("Location: home.php");
        }
        else {
                $msg = "email or password does not exists ";

        }
}
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
        <meta charset=utf-8 />
        <title>Basic Web Page</title>
         <link rel="stylesheet" type="text/css" media="screen" href="css/master.css" />
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"
      rel="stylesheet">
    <script   src="https://code.jquery.com/jquery-3.1.0.js"   integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk="   crossorigin="anonymous"></sc$
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"></script>
    <script   src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/js/bootstrap.js"></script>

        <!--[if IE]>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <style>
                /* Credit to bootsnipp.com for the css for the color graph */
                .colorgraph {
                  height: 5px;
                  border-top: 0;
                  background: #c4e17f;
                  border-radius: 5px;
                  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37$
                  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%$
                  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, $
                     background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%,$
                }
        </style>
</head>
<body>
<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
                <span style = "color:red";> <?php if($msg != NULL) { echo $msg; }?></span>
                <form role="form" action ="login.php" method ="POST">
                        <fieldset>
                                <h2>Please Sign In</h2>
                                <hr class="colorgraph">
                                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address">
                                </div>
                                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
                                </div>
 <span class="button-checkbox">
                                        <button type="button" class="btn" data-color="info">Remember Me</button>
                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
                                        <a href="" class="btn btn-link pull-right">Forgot Password?</a>
                                </span>
                                <hr class="colorgraph">
                                <div class="row">
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" name ="submit" value="Sign In">
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                                <a href="register.php" class="btn btn-lg btn-primary btn-block">Register</a>
                                        </div>
                                </div>
                        </fieldset>
                </form>
        </div>
</div>

</div>
<script>
$(function(){
    $('.button-checkbox').each(function(){
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                    on: {
                        icon: 'glyphicon glyphicon-check'
                    },
                    off: {
                        icon: 'glyphicon glyphicon-unchecked'
                    }
            };

        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
 });

        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');
            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else
            {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }
        function init() {
            updateDisplay();
            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>
</body>
</html>



