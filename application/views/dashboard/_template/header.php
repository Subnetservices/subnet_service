<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="/assets/userarea/img/apple-icon.png">
  <link rel="icon" type="image/png" href="/assets/userarea/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    <?php echo $header['title']?>
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet"> -->
  <!-- CSS Files -->
  <link href="/assets/userarea/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/assets/userarea/css/paper-dashboard.css?v=2.0.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="/assets/userarea/demo/demo.css" rel="stylesheet" />
</head>



<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
      <!--   <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="/assets/userarea/img/logo-small.png">
          </div>
        </a> -->
        <a href="/" class="simple-text logo-normal">
          Subnet
          <!-- <div class="logo-image-big">
            <img src="/assets/userarea/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="/dashboard">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          
          <li>
            <a href="/dashboard/buydata">
              <i class="nc-icon nc-mobile"></i>
              <p>Buy Data</p>
            </a>
          </li>

           <li>
            <a href="/dashboard/buyairtime">
              <i class="nc-icon nc-mobile"></i>
              <p>Buy Airtime</p>
            </a>
          </li>

          <li>
            <a href="/dashboard/wallet">
              <i class="nc-icon nc-money-coins"></i>
              <p>Wallet</p>
            </a>
          </li>

          <li>
            <a href="/dashboard/giveaway">
              <i class="nc-icon nc-money-coins"></i>
              <p>Give Away</p>
            </a>
          </li>
          

          <li>
            <a href="/dashboard/transactions">
              <i class="nc-icon nc-chart-bar-32"></i>
              <p>Transactions</p>
            </a>
          </li>
          <li>
          
          <li>
            <a href="/dashboard/profile">
              <i class="nc-icon nc-single-02"></i>
              <p>Profile</p>
            </a>
          </li>
          
          <!-- <li>
            <a href="/dashboard/support">
              <i class="nc-icon nc-chat-33"></i>
              <p>Support Ticket</p>
            </a>
          </li> -->
          <li class="active-pro">
            <a href="/logout">
              <i class="nc-icon nc-spaceship"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    
