<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Geo Fighters | Log in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel='icon' href='<?php echo base_url() ?>images/geo_phone.png' type='image/x-icon'/ >
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- pace-progress -->
	<link rel="stylesheet" href="<?php echo base_url() ?>plugins/pace-progress/themes/black/pace-theme-minimal.css">
    <script src="<?php echo base_url() ?>plugins/pace-progress/pace.min.js"></script>


    <style media="screen">

    .bg-login {
        background-image: url("<?php echo base_url() ?>images/geo_background.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }

    .vertical-center {
        margin: 0;
        position: absolute;
        top: 43%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .horizontal-center {
        margin: 0;
        position: absolute;
        left: 40%;
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }

	.box-shadow{
		/* box-shadow: 0px 0px 10px rgba(0,0,0,1); */
      -moz-box-shadow: 0px 1px 20px rgba(0, 0, 0, 0.5);
      -webkit-box-shadow: 0px 1px 20px rgba(0, 0, 0, .5);
      box-shadow: 0px 1px 20px rgba(0, 0, 0, 0.5);
	}
    .r-25 {
        border-radius: 25px;
    }
    .card-primary.card-outline {
        border-top: 3px solid #DB2955;
    }
    </style>

</head>
<body class="hold-transition login-page bg-login pace-primary">

            <div class="login-box vertical-center">
                <div class="login-logo">
                    <a href="<?php echo base_url() ?>">
                        <img src="<?php echo base_url() ?>images/geo_phone.png" style="width: 100%; height: 50%;">
                    </a>
                </div>
                <!-- /.login-logo -->
                <div class="card box-shadow card-outline card-primary r-25">
                    <div class="card-body login-card-body r-25" style="background:#ecf9ff">
                        <p class="login-box-msg">Enter your GeoPhone <br> email and password</p>

                        <form id="frm_login" action="" method="post">
                            <div class="input-group mb-3">
                                <input id="txt_email" type="email" class="form-control" placeholder="username@geophone.com" required style="background:#ecf9ff">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-envelope"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <input id="txt_password" type="password" class="form-control" placeholder="******" required style="background:#ecf9ff">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                            <label id="red_text" style="color: red"></label>
                            <div class="row justify-content-center">
                                <div class="col-8">
                                    <button id="btn_singin" type="submit" class="btn btn-success btn-block">
                                        <span id="loader" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display:none"></span>
                                        <b id="btn_singin_text">Sign In</b>
                                    </button>
                                </div>
                            </div>
                        </form>
                    <!--  style="background:#9AC800; -->
                    </div>
                    <!-- /.login-card-body -->
                </div>
            </div>
            <!-- /.login-box -->
    <!-- jQuery -->
    <script src="<?php echo base_url() ?>plugins/jquery/jquery.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url() ?>dist/js/adminlte.min.js"></script>
    <script type="text/javascript">


        $('#frm_login').on('submit', function(e) {
            e.preventDefault();

            var email = $("#txt_email").val();
            var password = $("#txt_password").val();
            //console.log(email);
            //return;
            $('#btn_singin_text').html('Singing in...');
            $('#loader').show()
            $('#btn_singin').attr('disabled', true);
            $.ajax({
                url: "<?php echo base_url() ?>authentication/validateuser",
                type: "POST",
                data: {
                    email: email,
                    password : password
                },
                success: function(data){
                    console.log(data);
                    data = JSON.parse(data);
                    console.log(data);
                    if(data['result']==1){
                        $("#red_text").css("color", "green");
                        $('#red_text').html('<i class="fas fa-check-circle"></i> Login Successful. Please Wait...');
                        document.location = data['referer'];
                    } else {
                        $('#btn_singin_text').html('Sing in');
                        $('#loader').hide()
                        $('#btn_singin').attr('disabled', false);
                        $('#red_text').html('<i class="fas fa-exclamation-triangle"></i> Incorrect Credentials.');
                    }
                },
                error: function(xhr, status, error) {
                  var err = eval("(" + xhr.responseText + ")");
                  console.log(err);
                    $('#btn_singin_text').html('Sing in');
                    $('#loader').hide()
                    $('#btn_singin').attr('disabled', false);
    				$('#red_text').text('Server Error. Report Developer.');
                }
            });
        });
        </script>
    </body>
</html>
