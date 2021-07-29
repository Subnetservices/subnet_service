
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/userarea/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/userarea/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Register
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

  <!-- CSS Files -->
  <link href="/assets/userarea/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/userarea/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->

</head>

<body class="">
  <div class="wrapper ">
      <div class="content">



            <div class="card col-md-4">
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-8 ml-auto mr-auto text-center">
                      <h4 class="card-title">
                       Register
                      </h4>
                      <span>create your account</span>
                      <span>Enjoy cheap data and flexible transactions</span>
                    </div>
                  </div>
                  <div>
                      <form action="" method="post">
                           <input type="hidden" name="ref" value="<?php echo $ref?>">
                           
                            <div class="form-group"><label>Full Name</label>
                               <input type="text" class="form-control" id="full_name" name="full_name" required="" placeholder="John Doe" value="<?php echo $full_name?>">
                            </div>
                            <div class="form-group"><label>Email Address <span style="color: red"><?php echo $email_error?></span></label>
                               <input type="email" class="form-control" id="email" name="email" oninput="email_check(this.value)" placeholder="Email" required="" value="<?php echo $email?>">
                             </div>
                            <div class="form-group" id="phone_error"><label>Phone Number <span style="color: red"><?php echo $phone_error?></span></label>
                               <input type="tel" class="form-control" id="phone" name="phone_number" oninput="phone_check(this.value)" placeholder="23481344555" required="" value="<?php echo $phone?>">
                            </div>
                            
                            <div class="form-group"><label>Password</label>
                               <input type="text" class="form-control" name="password" id="password" placeholder="Password" required="">
                            </div>
                           <!--  <div class="form-group"><label id="pass_status">Re-type Password</label>
                               <input type="password" class="form-control" name="password" oninput="pwd_check()" id="password2" placeholder="Confirm Password" required="">
                            </div> -->

                            
                            <div class="form-group" id="button_">
                               <input type="submit" class=" btn btn-primary btn-long" name="register" style="color: greed" value="Create Account" >
                            </div>
                            <div>
                              <a href="/login">login</a>
                            </div>
                            <div class="clearfix"></div>
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


</body>

</html>

                                                        

<script type="text/javascript">
    //password, email and username checker


    function pwd_check() {
        var password = document.getElementById('password').value;
        var password2 = document.getElementById('password2').value;
        if (password===password2) {
           // console.log('match');
         document.getElementById('pass_status').inneHTML = "<p>Password Match</p>";
         
        }else{
           // console.log('not match');
         document.getElementById('pass_status').inneHTML = "<p>Password Do not Match</p>";
        }
    }
    function email_check(email) {
        // body...
       // var email = document.getElementById('email').value;
        var param = {
          "email": email
        }
       $.get("auth/checkmail/",param,function(data,status) {
           console.log(status);
           console.log(data);
           if (data=='exists') {
             document.getElementById('email_error').inneHTML = "<span  style='color:red'>Phone Number already Exists</span>";
             return true
           }else{
             document.getElementById('email_error').inneHTML = "<span  style='color:green'>Phone Available</span>";
           }
       });
    }

    function phone_check(phone) {
        // body...
    //    var phone = document.getElementById('phone').value;
    if (phone.length>=10) {
         var param = {
          "phone": phone
        }
       $.get("auth/checkphone/",param,function(status,data) {
        console.log(data);
        console.log(status);
           if (data=='exists') {

             document.getElementById('phone_error').inneHTML = "<span  style='color:red'>Phone Number already Exists</span>";
           }else{
             document.getElementById('phone_error').inneHTML = "<span  style='color:green'>Phone Available</span>";
           }

       });
    }
       
    }

    function checkbank(account_number) {
      document.getElementById('full_name').value = "ezekiel arin";
     // document.getElementById('account_name').value = "";
     // document.getElementById('acct_name').value = "";

     var acct_no = document.getElementById('acct_no').value;
     var bank_code = document.getElementById('bank_code').value;
   //  var bank_code = document.getElementById('bank_code').value;
      if (account_number.length>=9) {
        var param = {"account_number":account_number, "account_bank":bank_code}

        $.ajax({
          type: 'GET',
          url: 'https://api.flutterwave.com/v3/accounts/resolve/',
          data: param,
          crossDomain: true,
          beforeSend: function(xhr) {
            xhr.setRequestHeader('Authorization', 'Basic FLWSECK-08acb2971305ccb0506ad2c266b2287a-X')
          }
        });

       //  $.getJSON("https://api.flutterwave.com/v3/accounts/resolve/",param,function(status,data) {
       //    console.log(data);
       //    console.log(status);
       //    if (data) {
       //      document.getElementById('account_name').value = data.account_name;
       //      document.getElementById('acct_name').value = data.account_name;
       //    }else{
             
       //    }
 
       // });
      }
    }
</script>

   