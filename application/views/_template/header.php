
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title><?php echo $header['title']?></title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="<?php echo $header['keywords']?>" />
    <meta name="description" content="<?php echo $header['description']?>" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link rel="stylesheet" href="/assets/home/css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="/assets/home/css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <link href="/assets/home/css/font-awesome.min.css" rel="stylesheet">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    <!-- <link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
     rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
     rel="stylesheet"> -->
    <!-- //Web-Fonts -->
</head>

<body>
    <div class="main-w3pvt" id="home">
        <!-- header -->
        <header>
            <div class="container-fluid">
                <!-- nav -->
                <nav class="py-lg-4 py-3 px-xl-3 px-lg-3 px-2">
                    <div id="logo">
                        <h1><a class="" href="/">Subnet</a></h1>
                    </div>
                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mt-2">
                        <li class="active"><a href="/">Home</a></li>
                        <li class="mx-lg-5 mx-md-4 my-md-0 my-2"><a href="#about">About Us</a></li>
                        <li class="mx-lg-5 mx-md-4 my-md-0 my-2"><a href="#services">Services</a></li>
                        <li><a href="#contact">Contact Us</a></li>
                        <li class="ml-lg-5 ml-md-4 mt-md-0 mt-2"><a href="/login" class="reqe-button">Login</a></li>
                    </ul>
                </nav>
                <!-- //nav -->
            </div>
        </header>
        <!-- //header -->