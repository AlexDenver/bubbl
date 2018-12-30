<?php
    include_once "includes/probe.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bubbl</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/home.css">
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <div class="wrap">
        <div class="main">
            <section class='hero bg'>
                <header>
                    <div class="wrapper">

                        <div class="logo">
                            <span class="fa fa-circle"></span>
                            <span class="logo-text">Bubbl</span>
                        </div>
                        <div class="nav">
                            <?php if($_SESSION['user'] == '') { ?>
                            <ul>
                                <li class="login-trigger">
                                    <a href="#">Login</a>
                                </li>
                                <li class='register-trigger'>
                                    <a href="#" class="get-started">Get Started</a>
                                </li>
                            </ul>
                            <?php }?>
                        </div>
                    </div>
                    </header>
                    <div class="boosters">
                        <div class="wrap">
                            <h1>Have Your Best Chat</h1>
                            <div class="buttons">
                            <?php if($_SESSION['user'] == '') { ?>
                                <div class="sign-up">Sign Up</div>
                            <?php }else{ ?>
                                <a href="./"><div class="sign-up">Go to Profile</div></a>
                            <?php } ?>
                                <div class="learn">Learn More</div>
                            </div>
                        </div>
                    </div>
        </section>
        <section class="why-bubbl">
            <div class="bg-white">
                <div class="reason wrap">
                    <div class="left">
                        <div class="title">Stay connected and clued in</div>
                        <div class="text">With the everyone on Bubbl, you can share valuable customer feedback and insights with the right people, and vice versa. Support teams that are up to date on the latest details will be better equipped to provide fast, great service.</div>
                    </div>
                    <div class="right">
                        <img src="./res/laptop-chat.png" alt="">
                    </div>
                </div>
            </div>
        
            <div class="bg-red">
                <div class="reason wrap">                
                    <div class="left">
                        <img src="./res/home_illo.png" alt="">
                    </div>
                    <div class="right">
                        <div class="title">The Best is Here</div>
                        <div class="text">With the everyone on Bubbl, you can share valuable customer feedback and insights with the right people, and vice versa. Support teams that are up to date on the latest details will be better equipped to provide fast, great service.</div>
                    </div>
                </div>
            </div>
                

        </section>
        <footer>
            <div class="copyrights">&copy; 2018 - Bubbl</div>
        </footer>
        </div>
    </div>
    <!-- <script src="./js/"></script> -->
    <script src="./js/script.js"></script>

</body>
</html>