
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/userarea/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/userarea/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Login
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="/assets/userarea/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/userarea/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/assets/userarea/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
      <div class="content">



            <div class="card col-md-4">
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6 ml-auto mr-auto text-center">
                      <h4 class="card-title">
                       Welcome Back, Login to continue
                      </h4>
                    </div>
                  </div>
                  <div>
                    <div>
                      <?php echo $message; ?>
                    </div>
                      <form action="" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" placeholder="E-mail" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required="">
                        </div>
                        <p><a href="/auth/forgot_password">Forgotten Password?</a></p>
                        <div class="form-group">
                            <input type="submit"  class="btn btn-success" value="Signin" name="login" >
                            <a href="/register" class="btn btn-primary" name="login" >Register</a>
                        </div>
                       </form>
                  </div>

         

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <style type="text/css">
          .card{
           
            margin: 0 auto;
            float: none;
            margin-bottom: 10px;
            margin-top: 50px;
          }
      </style>





  <!--   Core JS Files   -->
  <script src="/assets/userarea/js/core/jquery.min.js"></script>
  <script src="/assets/userarea/js/core/popper.min.js"></script>
  <script src="/assets/userarea/js/core/bootstrap.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="/assets/userarea/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->

  <script src="/assets/userarea/demo/demo.js"></script>
</body>

</html>
