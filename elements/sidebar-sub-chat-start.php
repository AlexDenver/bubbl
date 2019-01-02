<?php
    include_once "/opt/lampp/htdocs/bubbl/includes/probe.php";
    include_once "/opt/lampp/htdocs/bubbl/includes/functions.php";
    // require_once(__DIR__."/../includes/probe.php");
    // require_once(__DIR__."/../includes/function.php");
?>
                    <div class="friend-feed">
                        <?php
                            if($friends = get_all_friends($_SESSION['user'])){
                                foreach ($friends as $friend){
                                    ?>
                                    <div class="header user" >
                                        <div class="user-icon">
                                            <img src="<? echo get_user_img($friend); ?>" alt="">
                                        </div>
                                        
                                        <div class="user-name">
                                            <?php  echo $friend?>
                                        </div>
                                        <div class="time">
                                            <button class="btn" onclick="startChat('<?php echo $friend; ?>')">Chat</button>
                                        </div>
                                    </div>                                
                                    <?
                                }
                            }
                        ?>
                    </div>
