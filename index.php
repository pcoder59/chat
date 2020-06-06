<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Chat | Home</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="chat" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!-- Custom-Files -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <!-- Style-CSS -->
    <!-- font-awesome-icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <!-- /Fonts -->
    <link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=M+PLUS+Rounded+1c:100,300,400,500,700,800" rel="stylesheet">
    <link rel="manifest" href="manifest.webmanifest">
    <!-- //Fonts -->
</head>

<body>
    <!-- mian-content -->
    <div class="main-content" id="home">
        <div class="layer">
            <!-- header -->
            <header>
                <div class="container-fluid px-lg-5">
                    <!-- nav -->
                    <nav class="py-4 d-lg-flex">
                        <div id="logo">
                            <h1> <a href="index.php"> Nerd's Chat</a></h1>
                        </div>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu mt-2 ml-auto">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="#about" class="scroll">About</a></li>
                            <li><a href="login/" class="scroll">Login / Register</a></li>
                            <li><a href="#contact" class="scroll">Contact</a></li>
                        </ul>
                    </nav>
                    <!-- //nav -->
                </div>
            </header>
            <!-- //header -->
            <div class="container">
                <!-- /banner -->
                <div class="banner-info-w3layouts">
                    <h3>Nerd Tech Chat</h3>
                    <p class="my-3">Chat About Tech Topics in Various Tech Chat Rooms</p> <a href="login/" class="read-more mt-3 btn">Start Chatting Now! </a> </div>
            </div>
        </div>
        <!-- //banner -->
    </div>
    <?php
        if(!empty($_SESSION["mailed"]) && $_SESSION["mailed"] === "sent") {
            $_SESSION["mailed"] = "";
            echo "<div class='alert alert-success text-center'>";
            echo "<p>Your Message Has Been Sent.</p>";
            echo "</div>";
        }
    ?>
    <!--// mian-content -->
    <!-- banner-bottom-wthree -->
    <section class="banner-bottom-wthree py-5" id="about">
        <div class="container py-md-5 px-lg-5">
            <div class="content-left-bottom text-center">
                <h3 class="tittle mb-lg-5 mb-4">About Nerd Tech Chat</h3>
            </div>
            <div class="content-right-bottom mt-md-0 mt-3 text-center">
                <p class="mt-2">Nerd Tech Chat is a platform to chat about Technical Topics.<strong class="text-capitalize"> It is aimed at Software and Web Developers and Anyone passionate in the tech field.</strong> This chat is free to join for everyone. Feel free
                    to join the different rooms and chat on that topic with other tech nerds out there. Also invite your Nerdy Friends to The Chats.</p>
                <p class="mt-3"><strong class="text-capitalize">Please be respectful during the chat.</strong> Any complaints on abuse or bullying during chat will be manually dealt with and taken seriously. So enjoy talking with others and stay respectful of others.</p>
            </div>
            <div class="row banner-grids mt-lg-5">
                <div class="col-lg-4 banner-grid">
                    <div class="content-grid-info">
                        <div class="row">
                            <div class="col-2">
                                <span class="fa fa-trophy" aria-hidden="true"></span>
                            </div>
                            <div class="col-10">
                                <h4 class="mb-3">Support</h4>
                                <p>Support other nerds.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 banner-grid">
                    <div class="content-grid-info">
                        <div class="row">
                            <div class="col-2">
                                <span class="fa fa-thumbs-up" aria-hidden="true"></span>
                            </div>
                            <div class="col-10">
                                <h4 class="mb-3">Passion</h4>
                                <p>People passionate about technology is free to join in.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 banner-grid">
                    <div class="content-grid-info">
                        <div class="row">
                            <div class="col-2">
                                <span class="fa fa-tv" aria-hidden="true"></span>
                            </div>
                            <div class="col-10">
                                <h4 class="mb-3">Opinions</h4>
                                <p>Share your opinions on things with others freely. You are free to express your opinions as long as there is no tone policing.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- //banner-bottom-wthree -->

    <!-- contact -->
    <section class="contact py-5" id="contact">
        <div class="container pb-md-5">
            
            <div class="header py-lg-5 pb-3 text-center">
                <h3 class="tittle mb-lg-5 mb-3"> Contact Us</h3>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-form mx-auto text-left">
                        <form name="contactform" id="contactform1" method="post" action="send-contact.php">

                            <div class="con-gd">
                                <div class="form-group" data-aos="fade-up">
                                    <label>Name *</label>
                                    <input type="text" class="form-control" id="name" placeholder="" name="name" required="">
                                </div>
                            </div>
                            <div class="con-gd">
                                <div class="form-group" data-aos="fade-up">
                                    <label>Email *</label>
                                    <input type="email" class="form-control" id="email" placeholder="" name="email" required="">
                                </div>
                            </div>



                            <div class="form-group mb-5">
                                <label>How can we help?</label>
                                <textarea name="issues" class="form-control" id="iq" placeholder="" required=""></textarea>
                            </div>
                            <div class="contact-page">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="list-unstyled text-left mb-lg-5 mb-3">
                        <div class="adress-info mt-3 mb-3">
                            <div class="row">
                                <div class="col-3 text-lg-center adress-icon">
                                    <span class="fa fa-envelope-open-o"></span>
                                </div>
                                <div class="col-9 text-left">
                                    <h6>Email</h6>
                                    <a href="mailto:info@example.com">admin@premrajr.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- //contact -->

    <!-- footer -->
    <footer>
        <div>
            <div class="container-fluid">
                <p class="text-center">© 2019 Mechanized. All Rights Reserved | Design by
                    <a href="http://w3layouts.com/"> W3layouts </a>
                </p>
            </div>
            <!-- //footer bottom -->
        </div>
    </footer>
    <!-- //footer -->
    <script>
    if('serviceWorker' in navigator) {
	    navigator.serviceWorker
		     .register('sw.js')
		     .then(function(){
			     console.log("Service Worker Registered");
		     });
	}
    </script>

</body>

</html>
