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
    <script src="./js/moment.js"></script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/common.css">
</head>
<body>
    <div class="wrap">
        <div class="main">
            <?php include "elements/nav.php" ?>
            <div class="it-area">
                    <?php include "elements/chat-messages.php"; ?>
                <div class="chatbox">
                    <div class="attachments">                            
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="input">
                        <form id="chatin">
                            <input type="text" name="message" id="msg-box"> 
                            <button type="submit" class="hidden" id="send"></button>
                        </form>
                    </div>
                    <div class="send">
                        <label for="send">
                            <i class="fas fa-chevron-circle-right"></i>
                        </label>
                    </div>
                </div>
            </div>
            <div class="info-area">
                <?php include "elements/sidebar-feed.php" ?>
            </div>
        </div>
    </div>
    <script src="./js/script.js"></script>
    <script>
        $ME = "<? echo $_SESSION['user']; ?>";
    </script>

</body>
</html>