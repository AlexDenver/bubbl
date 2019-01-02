<?php
    include_once "/opt/lampp/htdocs/bubbl/includes/probe.php";
    include_once "/opt/lampp/htdocs/bubbl/includes/functions.php";
    // require_once(__DIR__."/../includes/probe.php");
    // require_once(__DIR__."/../includes/function.php");
?>

                <div class="message-feed">
                    <div class="message-wrap">
                        <div class="new-message">
                            <button class="btn red">Start New Message</button>
                        </div>                        
                        <div class="feed">
                            <?php
                            
                                foreach(get_all_threads() as $thread){
                                    $usr = $thread['mfrom']==$_SESSION['user']? $thread['mto']: $thread['mfrom'];
                            ?>
                            <div class="header message" onclick="startChat('<? echo $usr; ?>')">
                                <div class="user-icon">
                                    <img src="<? echo get_user_img($usr); ?>" alt="">
                                </div>
                                
                                <div class="user-name">
                                    <? echo $usr ?>
                                </div>
                                <div class="time" data-time="<? echo $thread['time'] ?>">                                
                                </div>
                            </div>
                            <? } ?>
                        </div>
                        
                    </div>

                </div>


                <script>
                    $('.new-message').click(()=>{
                        $.get('./elements/sidebar-sub-chat-start.php')
                        .then((res)=>{
                            $(".feed").html(res)
                        })
                    })

                    // setInterval(()=>{

                    // })

                    // 2018-12-30 11:49:44
                    $('[data-time]').each((i, el)=>{
                        timeStr = moment($(el).data('time'), "YYYY-MM-DD LTS").fromNow();
                        $(el).html(timeStr);
                    })
                </script>